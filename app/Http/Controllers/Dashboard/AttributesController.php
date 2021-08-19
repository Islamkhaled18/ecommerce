<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Http\Requests\AttributeRequest;
use DB;

class AttributesController extends Controller
{
    public function index(){
        $attributes = Attribute::orderBy('id','DESC')->paginate(PAGINATION_COUNT);

        return view('dashboard.attributes.index',compact('attributes'));
    }//end of index


    public function create(){

        return view('dashboard.attributes.create');
    }//end of index

    public function store(AttributeRequest $request)
    {   
        $attribute = Attribute::create($request->all());

        $attribute->name = $request->name;
        $attribute->save();

        return redirect()->route('admin.attributes')->with(['success'=>__('dashboard.add_successfully')]);

    }


    public function edit($id){
        $attribute = Attribute::find($id);

        if (!$attribute)
            return redirect()->route('admin.attributes')->with(['error'=>__('dashboard.error')]);

        return view('dashboard.attributes.edit', compact('attribute'));
    }

    public function update($id, AttributeRequest $request)
    {
        try {
            //validation

            //update DB
            $attribute = Attribute::find($id);

            if (!$attribute)
                return redirect()->route('admin.attributes')->with(['error'=>__('dashboard.error')]);


            DB::beginTransaction();

            //save translations
            $attribute->name = $request->name;
            $attribute->save();

            DB::commit();
            return redirect()->route('admin.attributes')->with(['success'=>__('dashboard.add_successfully')]);

        } catch (\Exception $ex) {

            DB::rollback();
            return redirect()->route('admin.attributes')->with(['error'=>__('dashboard.error')]);
        }

    }

    public function destroy($id)
    {
        try {
            //get specific categories and its translations
            $brand = Brand::find($id);

            if (!$brand)
                return redirect()->route('admin.brands')->with(['error'=>__('dashboard.error')]);

            $brand->delete();

            return redirect()->route('admin.brands')->with(['success'=>__('dashboard.deleted_successfully')]);

        } catch (\Exception $ex) {
            return redirect()->route('admin.brands')->with(['error'=>__('dashboard.error')]);
        }
    }


}
