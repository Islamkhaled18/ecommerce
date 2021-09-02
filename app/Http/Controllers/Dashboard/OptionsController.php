<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;
use App\Models\Product;
use App\Models\Attribute;
use App\Http\Requests\OptionsRequest;


class OptionsController extends Controller
{
    public function index(){

        $options = Option::with([
            'product'=> function($prod)
            {
                $prod -> select('id');
            }
            ,'attribute'=> function($attr)
            {
                $attr -> select('id');
            }])
            ->select('id','product_id','attribute_id','price')->paginate(PAGINATION_COUNT);

        return view('dashboard.options.index',compact('options'));
    }

    public function create(){
        
        $products = Product::where('is_active',0)->select('id')->get();
        // dd($products);
        $attributes = Attribute::select('id')->get();

        return view('dashboard.options.create',compact('products','attributes'));
    }

    public function store(OptionsRequest $request)
    {

       return $request ;

        $option = Option::create([
            'price'=>$request->price,
            'product_id'=>$request->product_id,
            'attribute_id'=>$request->attribute_id,

        ]);

        $option->name = $request->name;
        $option->save();

        return redirect()->route('admin.options')->with(['success' => __('dashboard.created_successfully')]);

    }

    public function edit($optionId)
    {
        $data = [];
        $data['option']= Option::find($optionId);

        if(!$data['option'])
            return redirect()->route('admin.options')->with(['error'=>__('dashboard.error')]);

        $data['products'] = Product::active()->select('id')->get();
        $data['attributes'] = Attribute::select('id')->get();

        return view('dashboard.options.edit',$data);

    }


    public function update(OptionsRequest $request , $id)
    {
        
        $option = Option::find($id);

        if (!$option)
            return redirect()->route('admin.options')->with(['error'=>__('dashboard.error')]);

            $option->update($request->only(['price','product_id','attribute_id']));
            //save translations
            $option->name = $request->name;
            $option->save();

            return redirect()->route('admin.options')->with(['success' => __('dashboard.updated_successfully')]);


    }
}
