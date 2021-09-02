<?php

namespace App\Http\Controllers\Site;

use App\Models\Slider;
use App\Models\Category;

use App\Http\Controllers\Controller;



class HomeController extends Controller
{
    public function home()
    {
        // $data = [];
        // $data['sliders'] = Slider::get(['photo']);

       $sliders = Slider::paginate(4);
       $categories = Category::parent()->select('id', 'slug')->with(['childrens' => function ($q) {
        $q->select('id', 'parent_id', 'slug');
        $q->with(['childrens' => function ($qq) {
            $qq->select('id', 'parent_id', 'slug');
        }]);
    }])->get();
        return view('front.home' ,compact('sliders' , 'categories') );
    }
}
