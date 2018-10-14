<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
    	$categories = Category::all();
    	$data['categories'] = $categories;
	    $products = Product::orderBy('id', 'DESC')->paginate(6);
	    $data['products'] = $products;
	    return view('home', $data);
    }

}
