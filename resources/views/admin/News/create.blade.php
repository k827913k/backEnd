@extends("layouts/app")

@section("content")


<div class="container">
    <h3>新增資料</h3>
    <hr>
    <form method="POST" enctype="multipart/form-data" action="/home/news/store">
        @csrf
        <div class="form-group">
            <label for="IMG">上傳圖片</label>
            <input type="file" class="form-control" id="IMG" name="url" required>
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
