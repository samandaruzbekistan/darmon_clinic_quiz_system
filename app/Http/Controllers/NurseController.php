<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NurseController extends Controller
{
    //    Hamshiralar ro'yhati
    public function nurses(){
        $nurses = DB::table('nurses')
            ->get(['*']);
        return view('admin.nurses', ['nurses' => $nurses]);
    }


//    Yangi hamshira qo'shish
    public function new_nurse_reg(Request $request){
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $nurse = DB::table('nurses')
            ->where('fullname', $request->name)
            ->first();
        if (!empty($nurse)){
            return back();
        }

        DB::table('nurses')
            ->insert([
                'fullname' => $request->name,
            ]);
        return redirect(route('nurses'));
    }

//    Hamshirani o'chirish
    public function delete_nurse(Request $request){
        $validated = $request->validate([
            'nurse_id' => 'required',
        ]);

        DB::table('exam_results')
            ->where('nurse_id',$request->nurse_id)
            ->delete();
        DB::table('nurses')
            ->where('id',$request->nurse_id)
            ->delete();
        return redirect(route('nurses'));
    }

    public function get_nurses(){
        $nurses = DB::table('nurses')
            ->get(['*']);
        return view('nurse.select', ['nurses' => $nurses]);
    }


    public function select_nurse(Request $request){
//        dd($request);
        $validated = $request->validate([
            'nurse_id' => 'required',
        ]);
        $nurse = DB::table('nurses')
            ->where('id', $request->nurse_id)
            ->first();
        if (empty($nurse)){
            return back();
        }
        session()->put('nurse',1);
        session()->put('nurse_id', $nurse->id);
        session()->put('fullname', $nurse->fullname);
        return redirect(route('nurse_home'));
    }

    public function Home(){
        $subjects = DB::table('subjects')
            ->get(['*']);
        return view('nurse.home', ['subjects' => $subjects]);
    }

    public function start_test($id){
        $first_answer = [];
        $subject = DB::table('subjects')
            ->where('id', $id)
            ->first();
        $first = DB::table('quizzes')
            ->where('subject_id', $id)
            ->limit($subject->count)
            ->get(['*'])->shuffle();
        foreach($first as $key) {
            $first_answer[] = DB::table('answers')
                ->where('quiz_id',$key->id)
                ->get(['*'])->shuffle();
        }
        $user = DB::table('nurses')
            ->where('id', session('nurse_id'))
            ->first();
        session()->flash('test', 1);
        return view('nurse.test',['first' => $first,'first_answer' => $first_answer, 'subject' => $subject, 'nurse' => $user]);
    }

    public function test_check(Request $req){
        $ball1 = 0;
        $subject = DB::table('subjects')
            ->where('id', $req->sb_id)
            ->first();
        $prosent = 100 / $subject->count;
        for ($i=1; $i <= $subject->count; $i++) {
            if (isset($req["answer{$i}"])){
                $f = !empty(DB::select(DB::raw("select * from answers where `id` = {$req["answer{$i}"]} and `correct` = 1 limit 1")));
                if ($f == True){
                    $ball1 += 1;
                }
            }
        }
        DB::table('exam_results')
            ->insert([
                'nurse_id' => $req->nurse_id,
                'fullname' => $req->nurse_fullname,
                'subject_id' => $req->sb_id,
                'subject_name' => $req->sb_name,
                'prosent' => $ball1*$prosent,
            ]);
        return view('nurse.result', ['prosent' => $ball1*$prosent, 'subject_name' => $req->sb_name]);
//        return redirect(route('my_results', ['id' => $req->nurse_id]));
    }

    public function my_results($id){
        $results = DB::table('exam_results')
            ->where('nurse_id', $id)
            ->get(['*']);
        return view('nurse.my_results', ['results' => $results]);
    }
}
