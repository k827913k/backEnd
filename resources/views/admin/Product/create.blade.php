@extends("layouts/app")

@section("css")
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">

@endsection


@section("content")

<div class="container">
    <h3>新增資料</h3>
    <hr>
    <form method="POST" enctype="multipart/form-data" action="/home/Product/store">
        @csrf
        <div class="form-group">
            <label for="IMG">上傳產品圖片</label>
            <input type="file" class="form-control" id="url" name="url" required>
        </div>

        <div class="form-group">
            <label for="IMG">上傳產品圖片組</label>
            <input type="file" class="form-control" id="more_url" name="more_url[]" required multiple>
        </div>

        <div class="form-group">
            <label for="Title">產品類別</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>

        <div class="form-group">
            <label for="Title">產品名稱</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="Content">Content</label>
            <textarea type="text" class="form-control" id="content" name="content"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">新增</button>

    </form>
</div>

@endsection


@section("js")
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>

<script>
    $(document).ready(function() {
  $('#content').summernote({
    height: 300,
  }
  );
});
</script>

@endsection
