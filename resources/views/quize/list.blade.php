@extends("base")

@section("body")
@auth
    <a href="{{ route("quize.create") }}"> <button class="btn-info btn mb-5">Add New Quize</button> </a>
@endauth
<table class="table">
    <thead>
      <tr>
        <th scope="col">name</th>
        <th scope="col">Questions</th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @forelse($quizes as $quize)
            <tr>
                <th scope="row">{{$quize->name}}</th>
                @if($quize->questions)
                <td>{{count($quize->questions)}}</td>
                @else
                <td>0</td>
                @endif
                <td>
                    <a class="btn btn-primary" href="{{ route("quize.show", ["id" => $quize->id]) }}">
                        Open
                    </a>
                </td>
                @auth
                    <td>
                        <a class="btn btn-success" href="{{ route("quize.edit", ["id" => $quize->id]) }}">
                            Edit
                        </a>
                    </td>            
                    <td>
                        <a class="btn btn-danger" href="{{ route("quize.delete", ["id" => $quize->id]) }}">
                            Delete
                        </a>
                    </td>            
                @endauth
            </tr>
        @empty
            <h1>No quizes found</h1>
        @endforelse
    </tbody>
  </table>
@endsection