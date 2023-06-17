<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VacantQuizController extends Controller
{
    public function new_quiz_reg(Request $req){
        $validated = $req->validate([
            'quiz' => 'required',
            'a_answer' => 'required',
            'b_answer' => 'required',
            'c_answer' => 'required',
            'd_answer' => 'required',
            'id' => 'required',
            'correct' => 'required',
        ]);

        if ($req->hasFile('photo')) {
            $file = $req->file('photo')->extension();
            $name = md5(microtime());
            $path = $req->file('photo')->move('quiz_images/',$name.".".$file);
            $quizID = DB::table('vacant_quizzes')
                ->insertGetId([
                    'quiz' => $req->quiz,
                    'subject_id' => $req->id,
                    'photo' => $name.".".$file,
                ]);
        } else {
            $quizID = DB::table('vacant_quizzes')
                ->insertGetId([
                    'quiz' => $req->quiz,
                    'subject_id' => $req->id,
                ]);
        }

        $a_correct = 0;
        $b_correct = 0;
        $c_correct = 0;
        $d_correct = 0;

        switch ($req->correct) {
            case "A":
                $a_correct = 1;
                break;
            case "B":
                $b_correct = 1;
                break;
            case "C":
                $c_correct = 1;
                break;
            case "D":
                $d_correct = 1;
                break;
        }
        DB::table('vacant_subjects')
            ->where('id', $req->id)
            ->update([
                'count_quiz' => DB::raw('count_quiz + 1')
            ]);
        $answers = [
            [
                'answer' => $req->a_answer,
                'quiz_id' => $quizID,
                'correct' => $a_correct
            ],
            [
                'answer' => $req->b_answer,
                'quiz_id' => $quizID,
                'correct' => $b_correct
            ],
            [
                'answer' => $req->c_answer,
                'quiz_id' => $quizID,
                'correct' => $c_correct
            ],
            [
                'answer' => $req->d_answer,
                'quiz_id' => $quizID,
                'correct' => $d_correct
            ]
        ];

        DB::table('vacant_answers')->insert($answers);

        return redirect("/vacant_subject/{$req->id}");
    }


    public function edit_quiz($id){
        $quiz = DB::table('vacant_quizzes')
            ->where('id', $id)
            ->first();
        $answers = DB::table('vacant_answers')
            ->where('quiz_id', $id)
            ->get(['*']);
        return view('admin.vc_quiz_detail',['quiz' => $quiz, 'answers' => $answers]);
    }


    public function quiz_update(Request $request){
        $quiz = DB::table('vacant_quizzes')
            ->where('id', $request->quiz_id)
            ->first();
        $quiz_photo = $quiz->photo;

        if ($request->hasFile('photo')){
            if ($quiz->photo != "no_photo"){
                unlink('quiz_images/'.$quiz->photo);
            }

            $request->validate([
                'photo' => 'required|image',
            ]);

            $photo = $request->file('photo');
            $name = md5(microtime());
            $file = $request->file('photo')->extension();
            $dir = "quiz_images/";
            $photo->move($dir, $name.".".$file);
            $quiz_photo = $name.".".$file;
        }

        DB::table('vacant_quizzes')
            ->where('id', $quiz->id)
            ->update([
                'quiz' => $request->input('quiz'),
                'photo' => $quiz_photo,
            ]);

        DB::table('vacant_answers')
            ->whereIn('id', [$request->answer_id1, $request->answer_id2, $request->answer_id3, $request->answer_id4])
            ->update([
                'answer' => DB::raw("CASE
                                    WHEN id = {$request->answer_id1} THEN '{$request->answer1}'
                                    WHEN id = {$request->answer_id2} THEN '{$request->answer2}'
                                    WHEN id = {$request->answer_id3} THEN '{$request->answer3}'
                                    WHEN id = {$request->answer_id4} THEN '{$request->answer4}'
                                END")
            ]);


        return redirect(route('vacant_subject',['id' => $quiz->subject_id]));
    }

    public function delete_quiz(Request $req)
    {
        $quiz = DB::table('vacant_quizzes')
            ->where('id', $req->quiz_id)
            ->first();
        if ($quiz->photo != "no_photo") {
            unlink('quiz_images/' . $quiz->photo);
        }
        DB::table('vacant_answers')
            ->where('quiz_id', $quiz->id)
            ->delete();
        DB::table('vacant_quizzes')
            ->where('id', $quiz->id)
            ->delete();
        DB::table('vacant_subjects')
            ->where('id', $req->subject_id)
            ->update([
                'count_quiz' => DB::raw('count_quiz - 1')
            ]);
        return back();
    }
}
