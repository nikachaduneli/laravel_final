<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\Quiz;

class QuizController extends Controller
{

    public function quiz_list()
    {
        return view('quize.list', ['quizes' => Quiz::all()]);
    }
    
    public function show($id)
    {
        return view('quize.show', ['quize' => Quiz::findOrFail($id)]);
    }

    public function quiz_create(Request $request)
    {
        if ($request->input("name")) {
            $quize = new Quiz;
            $quize->name = $request->input('name');
            $quize->description = $request->input('description');
            
            $image_name = $request->file('image_path')->getClientOriginalName();
            $request->file('image_path')->storeAs('public/images/', $image_name);
            $quize->image_path = $image_name;

            $quize->save();
            return redirect()->route('quize.list');
        }
        return view('quize.add_quiz');

    }

    public function quiz_edit($id, Request $request){
        return view('quize.edit_quize',['quize' => Quiz::findOrFail($id)]);
    }
    public function delete_quize($id){
        $quize = Quiz::findOrFail($id);
        $quize->delete();
        return redirect()->route('quize.list');
    }

    public function quize_take($quiz_id, $question_id, Request $request){
        $quize = Quiz::findOrFail($quiz_id);
        if (count($quize->questions) == 0) {
            return view('quize.message', ['message' => 'No Questions For This Quiz']);
        }

        if ($question_id == 0) {
            $question = $quize->questions[0];
        }
        else{
            $question = Question::findOrFail($question_id);
        }

        if($request->input('submit')){
            $answered = -1;
            // aq vcdilob swori pasuxi mepova da mere shemenaxa ragacnairad
            // foreach($question->answers as $answer){
            //     if ($request->input('ansered_' . $answer->id)) {
            //         $answered = $answer->id;
            //     }
            // }
            // if ($answered == $question->right_answer) {
            // }

            $next_question_id = $this->get_next_question($quize, $question);
                return view('quize.take_quize',['quize'=> $quize, 'question'=> $question, 'next_question_id'=> $next_question_id]);
        }
        return view('quize.take_quize',['quize'=> $quize, 'question'=> $quize->questions[0], 'next_question_id'=> $quize->questions[1]->id]);
    }

    public function show_message($message)
    {
        return view('quize.message', ['message' => $message]);
    }

    function get_next_question($quize, $current_question){
        foreach ($quize->questions as $question) {
            if($current_question->id < $question->id){
                return $question->id;
            }
        }
    }
}
