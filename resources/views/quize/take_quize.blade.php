@extends("base")

@section("body")
<div>
    @if($next_question_id)
        <form method="POST" action="{{ route('quize.take_quize', ["quize_id"=>$quize->id, "question_id"=>$next_question_id]) }}">
    @else
        <form method="get" action="{{ route('message', ["message"=>"Quiz Finished!"]) }}">
    @endif
        @csrf
        <h3 class="h3">{{$question->question}}</h3>
        <ul>
            @foreach ($question->answers as $answer)
                <li class="border">{{$answer->text}}</li>
                <input type="checkbox" name='ansered_{{$question->id}}'>       
            @endforeach
        </ul>
        <input type="submit" name="submit">
    </form>
</div>
    
@endsection
