<?php

namespace App\Http\Controllers;

use DB;
use App\News;
use App\News_IMG;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class NewController extends Controller
{

    public function index()
    {
        $all_data = DB::table('news')->get();
        return view('admin/News/index', compact('all_data'));
    }

//新增
    public function create()
    {
        return view('admin/News/create');
    }

//儲存
    public function store(Request $request)
    {

        $news_data = $request->all();

        //上傳檔案 方法一
        // php artisan storage:link
        // 單張照片上傳使用
        if ($request->hasFile('url')) {
            $file_name = $request->file('url')->store('', 'public');
            $news_data['url'] = $file_name;
        }
        $News_id =News::create($news_data);

        // 多張照片上傳使用
        if ($request->hasFile('more_url')) {
            foreach($news_data['more_url'] as $news_data){

                $file_name = $news_data->store('', 'public');
                $user = new News_IMG;
                // $user-> 欄位 = value
                $user->news_id = $News_id['id'];
                $user->url = $file_name;
                $user->save();

            }

        }

        return redirect('home/news');

        //上傳檔案 方法二:暴力直接move檔案到/public中
        // if ($request->hasFile('url')) {
        //     $file = $request->file('url');
        //     $path = $this->fileUpload($file, 'new-imgs');
        //     $news_data['url'] = $path;
        // }
    }

//修改
    public function edit($id)
    {
        $news = News::find($id);
        return view('admin/News/edit', compact('news'));
    }

//更新
    public function update(Request $request, $id)
    {

        $request_data = $request->all();

        $items = News::find($id);

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
            foreach($request_data['IMGs'] as $request_data){
                //                 回傳檔案路徑 ->store('資料夾名稱','根目錄路徑')
                $file_name = $request_data->store('', 'public');
                $user = new News_IMG;
                // $user-> 欄位 = value
                $user->news_id = $id;
                $user->url = $file_name;
                $user->save();

            }

        }
        return redirect('home/news');
    }

//刪除
    public function delete($id)
    {
        $item = News::find($id);
        $old_image = $item->url;
        Storage::disk('public')->delete($old_image);
        DB::table('news_img')->delete($id);
        $item->delete();
        return redirect('/home/news');

    }

// --祖傳代碼--
    private function fileUpload($file, $dir)
    {
        //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
        if (!is_dir('upload/')) {
            mkdir('upload/');
        }
        //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
        if (!is_dir('upload/' . $dir)) {
            mkdir('upload/' . $dir);
        }
        //取得檔案的副檔名
        $extension = $file->getClientOriginalExtension();
        //檔案名稱會被重新命名
        $filename = strval(time() . md5(rand(100, 200))) . '.' . $extension;
        //移動到指定路徑
        move_uploaded_file($file, public_path() . '/upload/' . $dir . '/' . $filename);
        // move_uploaded_file($原本檔案的路徑 , $要搬去的路徑);
        //回傳 資料庫儲存用的路徑格式
        return '/upload/' . $dir . '/' . $filename;
    }
// --祖傳代碼--

}
