<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //首頁
    public function index()
    {
        return view('admin/Product/index');
    }


    //新增
    public function create()
    {
        return view('admin/Product/create');
    }


    //儲存
    public function store(Request $request)
    {
        $products_data = $request->all();
        // php artisan storage:link
        // 單張照片上傳使用
        if ($request->hasFile('url')) {
            $file_name = $request->file('url')->store('Product_img', 'public');
            $products_data['url'] = $file_name;
            $Product =Product::create($products_data);
            $Product->save();
        }
        return redirect('home/Product');
    }

    //修改
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin/Product/edit', compact('product'));
    }

}
