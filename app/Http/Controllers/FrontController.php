<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function index()
    {
        return view('front/index');
    }

    public function news()
    {
        $news_data = DB::table('news')->get();
        return view('front/card-01' , compact('news_data'));
    }

}



