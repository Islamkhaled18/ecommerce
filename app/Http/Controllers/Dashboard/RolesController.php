<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use App\Http\Requests\RolesRequest;
use Illuminate\Http\Request;
use App\Models\Role;
use Carbon\Carbon;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::get(); 
        return view('dashboard.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('dashboard.roles.create');
    }

    public function store(RolesRequest $request)
    {

        $role = $this->process(new Role, $request);
        
        if ($role)
            return redirect()->route('admin.roles.index')->with(['success'=>__('dashboard.add_successfully')]);
        else
            return redirect()->route('admin.roles.index')->with(['error'=>__('dashboard.error')]);
      
    }

    public function edit($id)
    {
          $role = Role::findOrFail($id);
        return view('dashboard.roles.edit',compact('role'));
    }

    public function update($id,RolesRequest $request)
    {
        try {
            $role = Role::findOrFail($id);
            $role = $this->process($role, $request);
            if ($role)
                return redirect()->route('admin.roles.index')->with(['success'=>__('dashboard.add_successfully')]);
            else
                return redirect()->route('admin.roles.index')->with(['error'=>__('dashboard.error')]);
        } catch (\Exception $ex) {

            return redirect()->route('admin.roles.index')->with(['error'=>__('dashboard.error')]);
        }
    }

    protected function process(Role $role, Request $r)
    {
        $role->name = $r->name;
        $role->permissions = json_encode($r->permissions);
        $role->save();
        return $role;
    }


}