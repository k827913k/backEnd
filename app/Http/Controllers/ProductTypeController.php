<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    //
      //首頁
      public function index()
      {
          return view('admin/ProductType/index');
      }

       //新增
    public function create()
    {
        return view('admin/ProductType/create');
    }
}
