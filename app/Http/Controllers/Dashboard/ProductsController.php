<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Tag;
use App\Models\Category;


class ProductsController extends Controller
{
    public function index(){

    }

    public function create(){
        $data =[];
        $data['brands']     = Brand::active()->select('id')->get();
        $data['tags']       = Tag::select('id')->get();
        $data['categories'] = Category::active()->select('id')->get();

        return view('dashboard.products.general.create',$data);



    }
}
