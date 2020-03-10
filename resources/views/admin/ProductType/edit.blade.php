@extends("layouts/app")

@section("css")

@endsection

@section("content")

<div class="container">
    <h3>編輯資料</h3>
    <hr>
    <h6>現有圖片</h6>
    <img src="{{asset('/storage/'.$product->url)}}" alt="" width="300">
    <hr>

    <form method="POST" enctype="multipart/form-data" action="/home/news/update/{{$news->id}}">
        @csrf
        <div class="form-group">
            <label for="IMG">重新上傳圖片</label>
            <input type="file" class="form-control" id="url" name="url">
        </div>
       
        <div class="form-group">
            <label for="Title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$news->title}}">
        </div>
        <div class="form-group">
            <label for="Content">Content</label>
            <textarea type="text" class="form-control" id="content" name="content">{!!$news->content!!}</textarea>
        <div class="form-group">
            <label for="sort">sort (預設值為0，數字越大，排序越前面)</label>
            <input type="number" class="form-control" id="sort" name="sort" value="{{$news->sort}}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>










@endsection




@section("js")

@endsection
