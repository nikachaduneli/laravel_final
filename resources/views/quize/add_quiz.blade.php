@extends("base")

@section("body")
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Name" required>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
    </div>
    <div class="mb-3">
        <input type="file" name="image_path" required/>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
