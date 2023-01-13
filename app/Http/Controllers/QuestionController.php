<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Answer;

class QuestionController extends Controller
{
    public function create($quize_id, Request $request)
    {
        $quize = Quiz::findOrFail($quize_id);

        if ($request->input('question')) {
            $question = new Question;
            
            $question_text = $request->input('question');
            $question->quiz_id = $quize_id;
            $question->question = $question_text;
            
            $right = -1;
            $question->right_answer = $right;
            
            $question->save();


            for ($i = 0; $i < 4; $i++) {
                $answer = new Answer;
                $answer->text = $request->input('answer_' . $i);
                $answer->question_id = $question->id;
                $answer->save();
                if ($request->input('right_'.$i)) {
                    $right = $answer->id;
                }

            }

            if ($right != -1) {
                $question->right_answer = $right;
                $question->save();
            }
        }

        return redirect()->route('quize.edit', ["id" => $quize_id]);
    }
}
