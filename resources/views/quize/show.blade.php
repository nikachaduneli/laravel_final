@extends("base")

@section("body")
<div>
    <div class="card">
        <img class="card-img-top" src="{{ asset('storage/images/'.$quize->image_path) }}" alt="image" style=" max-height:500px;max-width:100%;height:auto;width:auto;">
        <div class="card-body">
          <h5 class="card-title">{{$quize->name}}</h5>
          <p class="card-text">{{$quize->description}}</p>
          <a href="{{ route("quize.take_quize", ["quize_id" => $quize->id, "question_id"=>0]) }}" class="btn btn-primary">Take Quiz</a>
        </div>
      </div>
            
</div>
    
@endsection
