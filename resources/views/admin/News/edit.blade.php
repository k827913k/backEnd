@extends("layouts/app")

@section("content")


<div class="container">
    <h3>編輯資料</h3>
    <hr>
    <h6>現有圖片</h6>
    <img src="{{asset($news->url)}}" alt="" width="300">
    <hr>

    <form method="POST" enctype="multipart/form-data" action="/home/news/update/{{$news->id}}">
        @csrf
        <div class="form-group">
            <label for="IMG">重新上傳圖片</label>
            <input type="file" class="form-control" id="IMG" name="url" enctype="multipart/form-data">
        </div>
        <div class="form-group">
            <label for="IMG">重新上傳多張圖片</label>
            <input type="file" class="form-control" id="IMGs[]" name="more_url[]" multiple >
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
            <label for="sort">sort  (預設值為0，數字越大，排序越前面)</label>
            <input type="number" class="form-control" id="sort" name="sort" value="{{$news->sort}}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>


    </form>


</div>
@endsection
