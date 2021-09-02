<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\MainCategoryRequest;
use DB;


class MainCategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::with('_parent')->orderBy('id','DESC') -> paginate(PAGINATION_COUNT);

        return view('dashboard.categories.index',compact('categories'));

    }//end of index

    public function create()
    {
        $categories = Category::select('id','parent_id')->get();
        return view('dashboard.categories.create' , compact('categories'));

    }//end of create

    public function store(MainCategoryRequest $request)
    {
  
            //validation

            if ($request -> type == 1){

                $request->except('parent_id');
                
            }

            $request_data = $request->except(['is_active']);
            $request_data['is_active'] = $request->has('is_active');
            
            $category = Category::create($request_data);
            $category->name = $request->name;
            $category->save();

            return redirect()->route('admin.maincategories')->with(['success' => __('dashboard.created_successfully')]);
        
    }


    public function edit($id)
    {

        $category = Category::orderBy('id', 'DESC')->find($id);

        if(!$category)
            return reddirect()->route('admin.maincategories')->with(['error'=>__('dashboard.notfound')]);

        return view('dashboard.categories.edit',compact('category'));

    }

    public function update($id, MainCategoryRequest $request)
    {

        try{

            //validation MainCategoryRequest
            

            $category = Category::find($id);
            if(!$category)
                return redirect()->route('admin.maincategories')->with(['error' =>__('dashboard.error')]);

            if(!$request->has('is_active'))
                $request->request->add(['is_active'=> 0]);
            else
                $request->request->add(['is_active'=> 1]);

            $category->update($request->all());

            $category->name = $request->name;
            $category->save();

            return redirect()->route('admin.maincategories')->with(['success' =>__('dashboard.updated_successfully')]);
        }
        catch(\Exception $ex)
        {
            return redirect()->route('admin.maincategories')->with(['error' =>__('dashboard.error')]);

        }

    }
    
    public function destroy($id)
    {
        try{

            //DB

            $category = Category::orderBy('id', 'DESC')->find($id);
            if(!$category)
                return redirect()->route('admin.maincategories')->with(['error' =>__('dashboard.error')]);

            $category->delete();

            return redirect()->route('admin.maincategories')->with(['success' =>__('dashboard.deleted_successfully')]);
        }
        catch(\Exception $ex)
        {
            return redirect()->route('admin.maincategories')->with(['error' =>__('dashboard.error')]);

        }

    }
}
