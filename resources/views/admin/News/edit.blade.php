
@extends("layouts/app")

@section("content")

<div class="container">
    <h1>編輯資料</h1>
<form  method="POST" action="/home/news/update/{{$news->id}}" >
    @csrf
    <div class="form-group">
      <label for="IMG">IMG</label>
      <input type="text" class="form-control" id="IMG"  name="url">
    </div>
    <div class="form-group">
      <label for="Title">Title</label>
      <input type="text" class="form-control" id="Title" name="title">
    </div>
    <div class="form-group">
        <label for="Content">Content</label>
        <input type="text" class="form-control" id="Content" name="content">
      </div>

    <button type="submit" class="btn btn-primary">Submit</button>


  </form>


</div>
  @endsection
