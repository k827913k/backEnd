<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //首頁
    public function index()
    {

        $product_data = Product::all();
        return view('admin/Product/index', compact('product_data'));
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
            $Product = Product::create($products_data);
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

    //更新
    public function update(Request $request, $id)
    {

        $request_data = $request->all();

        $items = Product::find($id);

        //                                       如果沒有:圖片不做動作
        // 從$request 中 檢查變更的資料是否有含圖片 如果有 : 將舊有的圖片刪除 上傳新圖片         最後:就把$request中的資料更新回資料庫

        //if有上傳新圖片
        if ($request->hasFile('url')) {

            //刪除舊有圖片
            $old_image = $items->url;
            Storage::disk('public')->delete($old_image);

            //上傳新的圖片
            //file_name = 新上傳圖片的檔案名稱(被儲存在public裡)
            // $file_name = Storage::put('', $request->file('url'));
            // dd($file_name);
            $file_name = $request->file('url')->store('', 'public');
            $request_data['url'] = $file_name;

        }
        $items->update($request_data);

        // 如果有內頁圖片上傳時，將存入檔案以及新增新的資料到NEWSIMG裡
        if ($request->hasFile('IMGs')) {
            foreach ($request_data['IMGs'] as $request_data) {
                //                 回傳檔案路徑 ->store('資料夾名稱','根目錄路徑')
                $file_name = $request_data->store('', 'public');
                $user = new News_IMG;
                // $user-> 欄位 = value
                $user->news_id = $id;
                $user->url = $file_name;
                $user->save();
            }
        }
        return redirect('home/product');
    }

}
