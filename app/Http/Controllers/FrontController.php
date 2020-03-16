<?php

namespace App\Http\Controllers;

use DB;
use App\News;
use App\Contact;
use App\Mail\SendToUser;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    //
    public function index()
    {
        return view('front/index');
    }

    //排序
    public function news()
    {
        $news_data = DB::table('news')->orderBy('sort', 'desc')->get();
        return view('front/card-01', compact('news_data'));
    }

    public function news_IMG()
    {
        $news_data = DB::table('news')->orderBy('sort', 'desc')->get();
        return view('front/card-01-detail', compact('news_data'));
    }

    public function card_detail($id)
    {
        $new = News::with('News_IMG')->find($id);
        return view('front/card_detail', compact('new'));
    }

    //產品管理
    public function product()
    {
        return view('front/product');
    }

    //產品類型管理
    public function productType()
    {
        return view('front/productType');
    }

    //Button
    public function product_innerpage()
    {
        return view('front/product_innerpage');
    }

    //Contact_us
    public function Contact_us()
    {
        return view('front/Contact_us');
    }

    public function contactUs_store(Request $request)
    {
        $contact_data = $request->all();
        $contact=Contact::create($contact_data);
        Mail::to('k827913k@gmail.com')->send(new OrderShipped($contact));
        //Mail::to($request->email)->send(new OrderShipped($contact));
        return redirect('/contact_us');
    }
}
