@extends("layouts/app")

@section("css")
<style>
    .btn-danger {
        position: absolute;
        right: 0;
        top: -20px;
        border-radius:50%;
    }
</style>
@endsection



@section("content")

<div class="container">
    <h3>編輯資料</h3>
    <hr>
    <h6>現有圖片</h6>
    <img src="{{asset('/storage/'.$news->url)}}" alt="" width="300">
    <hr>

    <h6>現有多張圖片組</h6>

    <div class="d-flex">
        @foreach ($news->News_IMG as $aaa)
        <div class=" card col-2">
            <img src="{{asset('/storage/'.$aaa->url)}}" alt="" width="100%" height="120">
            <input type="number" class="form-control" id="sort" name="sort" value="{{$aaa->sort}}">
            <button type="button" class="btn btn-danger">X</button>
        </div>
        @endforeach

    </div>


    {{-- <img src="{{asset('/storage/'.$news->News_IMG[url])}}" alt="" width="300"> --}}
    <hr>

    <form method="POST" enctype="multipart/form-data" action="/home/news/update/{{$news->id}}">
        @csrf
        <div class="form-group">
            <label for="IMG">重新上傳圖片</label>
            <input type="file" class="form-control" id="url" name="url">
        </div>
        <div class="form-group">
            <label for="IMG">重新上傳多張圖片</label>
            <input type="file" class="form-control" id="IMGs" name="IMGs[]" multiple>
        </div>
        <div class="form-group">
            <label for="Title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$news->title}}">
        </div>
        <div class="form-group">
            <label for="Content">Content</label>
            <input type="text" class="form-control" id="content" name="content" value="{{$news->content}}">
        </div>
        <div class="form-group">
            <label for="sort">sort (預設值為0，數字越大，排序越前面)</label>
            <input type="number" class="form-control" id="sort" name="sort" value="{{$news->sort}}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>


    </form>


</div>
@endsection
