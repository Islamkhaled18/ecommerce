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
        $categories = Category::parent()->orderBy('id','DESC') -> paginate(PAGINATION_COUNT);

        return view('dashboard.categories.index',compact('categories'));

    }//end of index

    public function create()
    {
        return view('dashboard.categories.create');

    }//end of create

    public function store(MainCategoryRequest $request)
    {

        try {

            DB::beginTransaction();

            //validation

            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            $category = Category::create($request->except('_token'));

            //save 
            $category->name = $request->name;
            $category->save();

            return redirect()->route('admin.maincategories')->with(['success' => __('dashboard.created_successfully')]);
            DB::commit();

        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('admin.maincategories')->with(['error' => __('dashboard.error')]);
        }

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
