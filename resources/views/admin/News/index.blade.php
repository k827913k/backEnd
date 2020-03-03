@extends("layouts/app")

@section('css')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

@endsection

@section('content')
<div class="container">
    <a href="/home/news/create">
<button type="button" class="btn btn-success">新增資料</button>
</a>

<hr>

<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
    <thead>
        <tr>
            <th>img</th>
            <th>title</th>
            <th>content</th>
            <th width="80">修改/刪除</th>

        </tr>
    </thead>
    <tbody>
       @foreach ($all_data as $item)
             <tr>
             <td>{{$item->url}}</td>
                <td>{{$item->title}}</td>
                <td>{{$item->content}}</td>
                <td>
                <a href="/home/news/edit/{{$item->id}}">
                <button type="button" class="btn btn-success">修改</button>
                </a>
                <a href="/">
                <button type="button" class="btn btn-danger">刪除</button>
                </a>
                </td>
            </tr>

       @endforeach

        </tbody>
    </table>

</div>
@endsection

@section('js')

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>


<script>

    $(document).ready(function() {
    $('#example').DataTable();
} );

</script>


@endsection
