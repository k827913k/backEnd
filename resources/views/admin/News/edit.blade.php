@extends("layouts/app")

@section("content")


<div class="container">
    <h1>編輯資料</h1>
    <h5>現有圖片</h5>
    <img src="{{asset('/storage/'.$news->url)}}" alt="" width="120">
    <hr>

    <form method="POST" enctype="multipart/form-data" action="/home/news/update/{{$news->id}}">
        @csrf
        <div class="form-group">
            <label for="IMG">IMG</label>
            <input type="file" class="form-control" id="IMG" name="url" value="{{$news->url}}">
        </div>
        <div class="form-group">
            <label for="Title">Title</label>
            <input type="text" class="form-control" id="Title" name="title" value="{{$news->title}}">
        </div>
        <div class="form-group">
            <label for="Content">Content</label>
            <input type="text" class="form-control" id="Content" name="content" value="{{$news->content}}">
        </div>
        <div class="form-group">
            <label for="sort">sort</label>
            <input type="number" class="form-control" id="sort" name="sort" value="{{$news->sort}}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>


    </form>


</div>
@endsection
