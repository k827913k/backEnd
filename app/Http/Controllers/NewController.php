<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use DB;

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


    public function store(Request $request){
        $news_data = $request -> all();
        News::create($news_data);
        return redirect('home/news');
    }

    public function edit($id){
        $news = News::find($id);
        return view('admin/News/edit', compact('news'));
    }

    public function update(Request $request,$id){
        $new = News::find($id);
        $news->url = $request->url;
        $news->title = $request->title;
        $news->content = $request->content;
        $news->save();


    //    News::find($id)->update($request->all());
    //     return redirect('admin/home/news');
    // }




}
