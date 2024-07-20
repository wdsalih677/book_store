<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::get();
        $permissions = Permission::get();
        return view('roles.role', compact('roles','permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required|unique:roles,name',
            ],[
                'name.required' => "يجب إضافة صلاحيه",
                'name.unique' => "هذه الصلاحه مضافه مسبقا",
            ]);
            $roles = Role::create([ 'name'=>$request->name]);
            $roles->syncPermissions($request->get('permission'));
            toast('تم إضافة الصلاحيه بنجاح' , 'success');
            return redirect()->route('roles.index');
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try{
            $role = Role::findOrFail($id);
            $permissions = Permission::all();
            $rolePermissions = DB::table("role_has_permissions")
            ->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id')
            ->all();
            return view('roles.edit', compact('role', 'permissions', 'rolePermissions'));
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // return $request;
        try{
            $request->validate([
                'name' => 'required|unique:roles,name'.$id,
            ],[
                'name.required' => "يجب إضافة صلاحيه",
                'name.unique' => "هذه الصلاحه مضافه مسبقا",
            ]);
            $role = Role::find($id);
            $role->name = $request->input('name');
            $role->save();
            $role->syncPermissions($request->input('permission'));
            toast('تم تعديل الصلاحيه بنجاح' , 'success');
            return redirect()->route('roles.index');
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            DB::table("roles")->where('id',$id)->delete();
            toast('تم حذف الصلاحيه بنجاح' , 'success');
            return redirect()->route('roles.index');
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
