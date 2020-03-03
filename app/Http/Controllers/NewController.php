<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use DB;

class NewController extends Controller
{
    //
    public function index()
    {
        $all_data = DB::table('news')->get();
        return view('admin/News/index', compact('all_data'));
    }

    public function creat()
    {
        return view('admin/News/creat');
    }


    public function store(Request $request){
        $news_data = $request -> all();

        News::create($news_data) -> save();
        return redirect('home/news');
    }

    public function edit($id){
        $news = News::find($id);
        return view('admin/news/edit', compact('news'));
    }

    public function update(Request $request,$id){
        return redirect('admin/home/news');
    }




}
