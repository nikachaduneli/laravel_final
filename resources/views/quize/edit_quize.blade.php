@extends("base")

@section("body")
<div>
    <div class="card">
        <img class="card-img-top" src="{{$quize->image_path}}" alt="image">
        <div class="card-body">
          <h5 class="card-title">{{$quize->name}}</h5>
          <p class="card-text">{{$quize->description}}</p>
        </div>
      </div>
    <h3 class="h3">Questions</h3>
    <ul>
    @forelse ($quize->questions as $question)
    <li>
        <h4 class="h4 m-3 p-4 border rounded" >{{ $question->question }}</h4> 
    </li>
    @empty
        <h4> No Questions</h4>
    @endforelse
    </ul>

    <form method="POST" action="{{ route("question.add", ["quize_id" => $quize->id]) }}" class="mb-3 mt-5 p-4 border rounded">
        @csrf
        <h3> Add new*</h3>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Question</label>
            <textarea name="question" class="form-control" id="exampleFormControlInput1" rows="3" required></textarea>
        </div>
        <div class="mb-3 mt-5">
            <h3>mark right answer</h3>
            @for ($i = 0; $i < 4; $i++)
            <div>
                <input type="text"class="form-control" name="answer_{{$i}}" required>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="right_{{$i}}" id="checkbox_{{$i}}" >
                <label class="form-check-label" for="checkbox_{{$i}}">
                  Right Answer
                </label>
              </div>
            @endfor
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
    
@endsection
