<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VacantController extends Controller
{
    public function vacants(){
        $nurses = DB::table('vacants')
            ->get(['*']);
        return view('admin.vacants', ['vacants' => $nurses]);
    }

    public function new_vacant_reg(Request $request){
        $validated = $request->validate([
            'name' => 'required',
//            'phone' => 'required'
        ]);

        $nurse = DB::table('vacants')
            ->where('fullname', $request->name)
            ->first();
        if (!empty($nurse)){
            return back();
        }

        DB::table('vacants')
            ->insert([
                'fullname' => $request->name,
//                'phone' => $request->phone,
            ]);
        return redirect(route('vacants'));
    }

    public function get_vacants(){
        $nurses = DB::table('vacants')
            ->get(['*']);
        return view('nurse.select', ['nurses' => $nurses, 'vacant' => 1]);
    }

    public function select_vacant(Request $request){
        $validated = $request->validate([
            'nurse_id' => 'required',
        ]);
        $nurse = DB::table('vacants')
            ->where('id', $request->nurse_id)
            ->first();
        if (empty($nurse)){
            return back();
        }
        session()->put('vacant',1);
        session()->put('vacant_id', $nurse->id);
        session()->put('fullname', $nurse->fullname);
        return redirect(route('vacant_home'));
    }





    public function Home(){
        return view('vacant.home');
    }

    public function start_vacant($id){
        $result = DB::table('vacant_results')
            ->where('vacant_id', $id)
            ->first();
//        return $result;
        if (!empty($result)){
            return back();
        }
        $first_answer = [];
        $second_answer = [];
        $third_answer = [];
        $four_answer = [];
        $first = DB::table('vacant_quizzes')
            ->where('subject_id', 2)
            ->limit(10)
            ->get(['*'])->shuffle();
        $second = DB::table('vacant_quizzes')
            ->where('subject_id', 4)
            ->limit(10)
            ->get(['*'])->shuffle();
        $third = DB::table('vacant_quizzes')
            ->where('subject_id', 5)
            ->limit(10)
            ->get(['*'])->shuffle();
        $four = DB::table('vacant_quizzes')
            ->where('subject_id', 6)
            ->limit(10)
            ->get(['*'])->shuffle();
        foreach($first as $key) {
            $first_answer[] = DB::table('vacant_answers')
                ->where('quiz_id',$key->id)
                ->get(['*'])->shuffle();
        }
        foreach($second as $key) {
            $second_answer[] = DB::table('vacant_answers')
                ->where('quiz_id',$key->id)
                ->get(['*'])->shuffle();
        }
        foreach($third as $key) {
            $third_answer[] = DB::table('vacant_answers')
                ->where('quiz_id',$key->id)
                ->get(['*'])->shuffle();
        }
        foreach($four as $key) {
            $four_answer[] = DB::table('vacant_answers')
                ->where('quiz_id',$key->id)
                ->get(['*'])->shuffle();
        }
        $user = DB::table('vacants')
            ->where('id', $id)
            ->first();
        $subjects = DB::table('vacant_subjects')
            ->get(['*']);
        session()->flash('test', 1);
        return view('vacant.test', ['subjects' => $subjects,'first' => $first,'second' => $second,'third' => $third,'four' => $four,'first_answer' => $first_answer,'second_answer' => $second_answer,'third_answer' => $third_answer, 'four_answer' => $four_answer, 'vacant' => $user]);
    }


    public function vacant_test_check(Request $req){
        $ball1 = 0;
        $ball2 = 0;
        $ball3 = 0;
        $ball4 = 0;
        for ($i=1; $i < 11; $i++) {
            if (isset($req["answer{$i}"])){
                $f = !empty(DB::select(DB::raw("select * from vacant_answers where `id` = {$req["answer{$i}"]} and `correct` = 1 limit 1")));
                if ($f == True){
                    $ball1 += 1;
                }
            }
        }
        for ($i=11; $i < 21; $i++) {
            if (isset($req["answer{$i}"])){
                $f = !empty(DB::select(DB::raw("select * from vacant_answers where `id` = {$req["answer{$i}"]} and `correct` = 1 limit 1")));
                if ($f == True){
                    $ball2 += 1;
                }
            }
        }
        for ($i=21; $i < 31; $i++) {
            if (isset($req["answer{$i}"])){
                $f = !empty(DB::select(DB::raw("select * from vacant_answers where `id` = {$req["answer{$i}"]} and `correct` = 1 limit 1")));
                if ($f == True){
                    $ball3 += 1;
                }
            }
        }
        for ($i=31; $i < 41; $i++) {
            if (isset($req["answer{$i}"])){
                $f = !empty(DB::select(DB::raw("select * from vacant_answers where `id` = {$req["answer{$i}"]} and `correct` = 1 limit 1")));
                if ($f == True){
                    $ball4 += 1;
                }
            }
        }
        $total = $ball1+$ball2+$ball3+$ball4;
        $prosent = $total * 2.5;
        $subjects = DB::table('vacant_subjects')
            ->get(['*']);
        $success = 0;
        $final = DB::table('exam')
            ->first();
        if ($final->ball <= $prosent){
            $success = 1;
            DB::table('vacants')
                ->where('id', $req->vacant_id)
                ->update([
                    'results' => 1
                ]);
        }
        DB::table('vacant_results')
            ->insert([
                'fullname' => $req->vacant_fullname,
                'vacant_id' => $req->vacant_id,
                'prosent' => $prosent,
                'sb1' => $ball1,
                'sb2' => $ball2,
                'sb3' => $ball3,
                'sb4' => $ball4,
                'sb_name1' => $subjects[0]->name,
                'sb_name2' => $subjects[1]->name,
                'sb_name3' => $subjects[2]->name,
                'sb_name4' => $subjects[3]->name,
                'results' => $success,
            ]);


        return view('vacant.result', ['subjects' => $subjects,'total' => $total, 'success' => $success, 'prosent' => $prosent, 'sb1' => $ball1, 'sb2' => $ball2, 'sb3' => $ball3, 'sb4' => $ball4]);
    }
}
