<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Http\Requests\MainCategoryRequest;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use DB;

class BrandsController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        return view('dashboard.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('dashboard.brands.create');
    }



    public function store(BrandRequest $request)
    {

        //validation

        if (!$request->has('is_active'))
            $request->request->add(['is_active' => 0]);
        else
            $request->request->add(['is_active' => 1]);


        $fileName = "";
        if ($request->has('image')) {

            $fileName = uploadImage('brands', $request->image);
        }

        $brand = Brand::create($request->except('_token', 'image'));

        //save translations
        $brand->name = $request->name;
        $brand->image = $fileName;

        $brand->save();
        return redirect()->route('admin.brands')->with(['success' => __('dashboard.created_successfully')]);

    }

    public function edit($id){
        $brand = Brand::find($id);

        if(!$brand)
            return redirect()->route('admin.brands')->with(['error'=>__('dashboard.error')]);

        return view('dashboard.brands.edit',compact('brand'));
    }

    public function update($id , BrandRequest $request)
    {

        try {
            //validation

            //update DB


        $brand = Brand::find($id);

        if (!$brand)
                return redirect()->route('admin.brands')->with(['error'=>__('dashboard.error')]);

        DB::beginTransaction();

        if ($request->has('image')) {
            $fileName = uploadImage('brands', $request->image);
            Brand::where('id', $id)
                ->update([
                    'image' => $fileName,
                ]);
        }

        if (!$request->has('is_active'))
            $request->request->add(['is_active' => 0]);
        else
            $request->request->add(['is_active' => 1]);


            $brand->update($request->except('_token', 'id', 'image'));

           //save translations
           $brand->name = $request->name;
           $brand->save();

           DB::commit();
           return redirect()->route('admin.brands')->with(['success'=>__('dashboard.created_successfully')]);

        } catch (\Exception $ex) {

            DB::rollback();
            return redirect()->route('admin.brands')->with(['error'=>__('dashboard.error')]);
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
