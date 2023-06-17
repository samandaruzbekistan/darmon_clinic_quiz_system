<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VacantSubjectController extends Controller
{
    public function vacant_subjects(){
        $subjects = DB::table('vacant_subjects')
            ->get(['*']);
        return view('admin.vacant_subjects', ['subjects' => $subjects]);
    }

    public function vacant_sb_reg(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'count' => 'required',
            'time' => 'required'
        ]);

        DB::table('vacant_subjects')
            ->insert([
                'name' => $request->name,
                'count' => $request->count,
                'time' => $request->time
            ]);
        return redirect(route('vacant_subjects'));
    }

    public function subject_detail($id){
        $answers = [];
        $quizzes = DB::table('vacant_quizzes')
            ->where('subject_id', $id)
            ->get(['*']);
        foreach ($quizzes as $item){
            $answers[] = DB::table('vacant_answers')
                ->where('quiz_id', $item->id)
                ->get(['*']);
        }
        $subject = DB::table('vacant_subjects')
            ->where('id', $id)
            ->first();
        return view('admin.vacant_sb_details',['subject' => $subject, 'quizzes' => $quizzes, 'answers' => $answers]);
    }

    public function subject_update(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'subject_id' => 'required',
            'count' => 'required',
            'time' => 'required'
        ]);
        DB::table('vacant_subjects')
            ->where('id', $request->subject_id)
            ->update([
                'name' => $request->name,
                'count' => $request->count,
                'time' => $request->time,
            ]);
        return back();
    }


    public function delete_subject(Request $request){
        $validated = $request->validate([
            'delete_id' => 'required|numeric',
        ]);

        DB::beginTransaction();

        try {
            // Delete the subject
            DB::table('vacant_subjects')
                ->where('id', $validated['delete_id'])
                ->delete();

            // Get the quizzes related to the subject
            $quizzes = DB::table('vacant_quizzes')
                ->where('subject_id', $validated['delete_id'])
                ->select('id', 'photo')
                ->get();

            // Delete the answers related to the quizzes
            DB::table('vacant_answers')
                ->whereIn('quiz_id', $quizzes->pluck('id')->toArray())
                ->delete();

            // Delete the quizzes
            DB::table('vacant_quizzes')
                ->where('subject_id', $validated['delete_id'])
                ->delete();

            // Delete the photos related to the quizzes
            foreach ($quizzes as $quiz) {
                if ($quiz->photo != "no_photo"){
                    unlink('quiz_images/'.$quiz->photo);
                }
            }

            DB::commit();

            return redirect(route('vacant_subjects'))->with('delete', 'true');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect(route('vacant_subjects'))->with('delete', 'false');
        }
    }
}
