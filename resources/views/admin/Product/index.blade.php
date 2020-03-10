@extends("layouts/app")

@section('css')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

@endsection

@section('content')
<div class="container">
    <a href="/home/Product/create">
        <button type="button" class="btn btn-success">新增產品</button>
    </a>

    <hr>

    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr class="text-center">
                <th>img</th>
                <th>title</th>
                <th>content</th>
                <th>sort</th>
                <th width="80">修改/刪除</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products_data as $product)
            <tr>
                <td class="text-center"><img src="{{asset('/storage/'.$product->url)}}" alt="" width="100"></td>
                <td>{{$product->title}}</td>
                <td>{{$product->content}}</td>
                <td>{{$product->sort}}</td>
                <td>
                    <a href="/home/Product/edit/{{$product->id}}">
                        <button type="button" class="btn btn-success">修改</button>
                    </a>

                    <button type="button" class="btn btn-danger" onclick="show_confirm({{$product->id}})">刪除</button>

                    <form id="delete-form-{{$product->id}}" action="/home/product/delete/{{$product->id}}" method="POST"
                        style="display: none;">
                        @csrf
                    </form>

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
        $('#example').DataTable( {
    "order": [[ 3, 'desc' ]]
} );
} );


function show_confirm(id){

    // console.log(id);
            var r = confirm("確定要刪除?");
            if (r==true)

            {
                //使用者確認刪除
                document.getElementById(`delete-form-${id}`).submit();
            }
        }


</script>


@endsection
