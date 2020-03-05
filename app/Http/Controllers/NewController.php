<?php

namespace App\Http\Controllers;

use App\News;
use DB;
use Illuminate\Http\Request;

class NewController extends Controller
{

    public function index()
    {
        $all_data = DB::table('news')->get();
        return view('admin/News/index', compact('all_data'));
    }

    // public function index()
    // {
    //    $all_data = news::all();
    //     return view('admin/News/index');
    // }

    public function create()
    {

        return view('admin/News/create');
    }

    public function store(Request $request)
    {
        $news_data = $request->all();
        $file_name = $request->file('url')->store('', 'public');
        $news_data['url'] = $file_name;

        //上傳檔案
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
        $news = News::find($id);
        $news->url = $request->url;
        $news->title = $request->title;
        $news->content = $request->content;
        $news->sort = $request->sort;
        $news->save();

        //    News::find($id)->update($request->all());
        return redirect('/home/news');
        // }

    }

    public function delete(Request $request, $id)
    {
        News::find($id)->delete();
        return redirect('/home/news');
    }

}
