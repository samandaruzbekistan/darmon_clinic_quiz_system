<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
//    Yangi fan qo'shish
    public function new(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'count' => 'required',
            'time' => 'required'
        ]);

        DB::table('subjects')
            ->insert([
                'name' => $request->name,
                'count' => $request->count,
                'time' => $request->time
            ]);
        return redirect(route('admin_home'));
    }


//    Fan detallarini ko'rish
    public function subject_detail($id){
        $answers = [];
        $quizzes = DB::table('quizzes')
            ->where('subject_id', $id)
            ->get(['*']);
        foreach ($quizzes as $item){
            $answers[] = DB::table('answers')
                ->where('quiz_id', $item->id)
                ->get(['*']);
        }
        $subject = DB::table('subjects')
            ->where('id', $id)
            ->first();
        return view('admin.subject_details',['subject' => $subject, 'quizzes' => $quizzes, 'answers' => $answers]);
    }

//    Subject update
    public function subject_update(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'subject_id' => 'required',
            'count' => 'required',
            'time' => 'required'
        ]);
        DB::table('subjects')
            ->where('id', $request->subject_id)
            ->update([
                'name' => $request->name,
                'count' => $request->count,
                'time' => $request->time,
            ]);
        return back();
    }

//    Fanni o'chirish
    public function delete_subject(Request $request){
        $validated = $request->validate([
            'delete_id' => 'required|numeric',
        ]);

        DB::beginTransaction();

        try {
            // Delete the subject
            DB::table('subjects')
                ->where('id', $validated['delete_id'])
                ->delete();

            // Get the quizzes related to the subject
            $quizzes = DB::table('quizzes')
                ->where('subject_id', $validated['delete_id'])
                ->select('id', 'photo')
                ->get();

            // Delete the answers related to the quizzes
            DB::table('answers')
                ->whereIn('quiz_id', $quizzes->pluck('id')->toArray())
                ->delete();

            // Delete the quizzes
            DB::table('quizzes')
                ->where('subject_id', $validated['delete_id'])
                ->delete();

            // Delete the photos related to the quizzes
            foreach ($quizzes as $quiz) {
                if ($quiz->photo != "no_photo"){
                    unlink('quiz_images/'.$quiz->photo);
                }
            }

            DB::commit();

            return redirect(route('admin_home'))->with('delete', 'true');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect(route('admin_home'))->with('delete', 'false');
        }
    }

//    public function delete_subject(Request $request){
//        $validated = $request->validate([
//            'delete_id' => 'required|number',
//        ]);
//        DB::table('subjects')
//            ->where('id', $request->delete_id)
//            ->delete();
//        $quizzes = DB::table('quizzes')
//            ->where('subject_id', $request->delete_id)
//            ->select('id', 'photo')
//            ->get();
//        foreach ($quizzes as $quiz) {
//            if ($quiz->photo != "no_photo"){
//                unlink('quiz_images/'.$quiz->photo);
//            }
//            DB::table('answers')
//                ->where('quiz_id', $quiz->id)
//                ->delete();
//        }
//        DB::table('quizzes')
//            ->where('subject_id',$request->subject_id)
//            ->delete();
//    }
}
