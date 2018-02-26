<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    //
    public function home(){
    	return view('products');
    }
    public function index(){
    	return Product::latest()->get();
    }
}
