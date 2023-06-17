<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ResultExport;

class AdminController extends Controller
{
    public function login(Request $request){
        $admin = DB::table('admins')
            ->where('login', $request->login)
            ->where('password', md5(md5($request->password)))
            ->first();
        if (!empty($admin)){
            session()->put('admin', 1);
            return redirect(route('admin_home'));
        }
        else{
            return back()->with('admin_error', 1);
        }
    }

//    Admin uchun bosh menu
    public function Home(){
        $subjects = DB::table('subjects')
            ->get(['*']);
        return view('admin.home', ['subjects' => $subjects]);
    }

//    Logout
    public function logout(){
        session()->flush();
        return redirect(route('admin_login'));
    }

//    Imtihon fanlarni ko'rish
    public function exams(){
        $exams = DB::table('exams')
            ->get(['*']);
        return view('admin.exams');
    }


//    Hamshiralarga filter. Imtihon kuni bo'yicha
    public function nurces_results_filter(Request $request){
        $nurces = DB::table('nurces_results')
            ->whereDate('created_at', '=', $request->day)
            ->get(['*']);
        return view('admin.nurces', ['nurces' => $nurces]);
    }

//    Hamshiralarga filter. Hamshira bo'yicha
    public function nurces_filter(Request $request){
        $exams = DB::table('nurces_results')
            ->where('nurce_id', $request->nurce_id)
            ->get(['*']);
        return view('admin.nurces');
    }

//    Imtixon natijalari
    public function vacant_results(){
        $results = DB::table('vacant_results')
            ->get(['*']);
        $subjects = DB::table('vacant_subjects')
            ->get(['*']);
        return view('admin.vacant_results', ['results' => $results, 'subjects' => $subjects]);
    }


//
    public function exam_results(){
        $subjects = DB::table('subjects')
            ->get(['*']);
        return view('admin.results', ['subjects' => $subjects]);
    }


    public function exam_result($id){
        $results = DB::table('exam_results')
            ->where('subject_id', $id)
            ->orderBy('prosent', 'desc')
            ->get();
        return view('admin.result', ['results' => $results, 'id' => $id]);
    }

    public function exportExcel($id){
        $sb = DB::table('subjects')
            ->where('id',$id)
            ->first();
        return Excel::download(new ResultExport($id),"{$sb->name}-.xlsx");
    }

    public function delete_data($id){
        DB::table('exam_results')
            ->where('subject_id', $id)
            ->delete();
        return redirect(route('exam_results'));
    }

    public function settings(){
        return view('admin.settings');
    }
}
