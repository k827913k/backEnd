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

    public function create()
    {

        return view('admin/News/create');
    }

    public function store(Request $request)
    {
        $news_data = $request->all();

        //上傳檔案 方法一
        // $file_name = $request->file('url')->store('', 'public');
        // $news_data['url'] = $file_name;

        //上傳檔案 方法二:暴力直接move檔案到/public中
        if ($request->hasFile('url')) {
            $file = $request->file('url');
            $path = $this->fileUpload($file, 'new-imgs');
            $news_data['url'] = $path;
        }
        News::create($news_data);
        return redirect('home/news');
    }

    public function edit($id)
    {
        $news = News::find($id);
        return view('admin/News/edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        // $news = News::find($id);
        // $news->url = $request->url;
        // $news->title = $request->title;
        // $news->content = $request->content;
        // $news->sort = $request->sort;
        // $news->save();

        $request_data = $request->all();

        $items = News::find($id);

        //如果有上傳新圖片
        if ($request->hasFile('url')) {

            //刪除舊有圖片
            $old_image = $items->url;
            File::delete(public_path().$old_image);

            //上傳新的圖片
            $file = $request->file('url');
            $path = $this->fileUpload($file,'new-imgs');
            $requset_data['url'] = $path;
            $items->update($requset_data);
        }


        if ($request->hasFile('more_url')) {

            foreach($request->file('more_url') as $more_url){

            //上傳新的圖片
            $path = $this->fileUpload($more_url,'new_imgs');
            $requset_data['url'] = $path;
            $items->update($requset_data);

            $new_imgs = new News_IMG;
            $new_imgs->news_id =  $items->id;
            $new_imgs->url =  $path;
            $new_imgs->save();

        }

        }

        return redirect('/home/news');
    }


    public function delete(Request $request, $id)
    {
        $item= News::find($id);
        $item->delete();
        Storage::delete('upload/new-imgs/'.$item->img);

        return redirect('/home/news');
    }


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
        //回傳 資料庫儲存用的路徑格式
        return '/upload/' . $dir . '/' . $filename;
    }

}
