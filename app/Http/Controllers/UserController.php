<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    function __construct()
    {

    $this->middleware('permission:قائمة المستخدمين', ['only' => ['index']]);
    $this->middleware('permission:إضافة مستخدم', ['only' => ['create','store']]);
    $this->middleware('permission:تعديل مستخدم', ['only' => ['edit','update']]);
    $this->middleware('permission:حذف مستخدم', ['only' => ['destroy']]);

    }
    public function index()
    {
        $users = User::get();
        $roles = Role::get();
        return view('users.users' , compact('users' , 'roles'));
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
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
                'role_name' => 'required'
            ],[
                'name.required' => 'يجب إضافة إسم المستخدم',
                'email.required' => 'يجب إضافة البريد الإلكتروني ',
                'email.email' => 'يجب ان يكون البريد الإلكتروني إيميل',
                'email.unique' => 'البريد الإلكتروني مضاف مسبقا',
                'password.required' => 'يجب كتابة كلمة السر',
                'role_name.required' => 'يجب تحديد الصلاحيه',
            ]);
            
            $input = $request->all();
            
            
            $input['password'] = Hash::make($input['password']);
            
            $user = User::create($input);
            $user->assignRole($request->input('role_name'));
            toast('تم إضافة المستخدم بنجاح','success');
            return redirect()->route('users.index');
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function show(string $id)
    {
        //
    }
    public function edit(string $id)
    {
        try{
            $user = User::findOrFail($id);
            $roles = Role::all();
            $userRole = $user->roles->pluck('name','name')->all();
            return view('users.edit' ,compact('user','roles','userRole'));
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function update(Request $request, string $id)
    {
        try{
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'.$id,
                'password' => 'required',
                'role_name' => 'required'
            ],[
                'name.required' => 'يجب إضافة إسم المستخدم',
                'email.required' => 'يجب إضافة البريد الإلكتروني ',
                'email.email' => 'يجب ان يكون البريد الإلكتروني إيميل',
                'email.unique' => 'البريد الإلكتروني مضاف مسبقا',
                'password.required' => 'يجب كتابة كلمة السر',
                'role_name.required' => 'يجب تحديد الصلاحيه',
            ]);
            $users = User::findOrFail($id);
            $users->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'status'=>$request->status,
                'role_name'=>$request->role_name
            ]);
            DB::table('model_has_roles')->where('model_id',$id)->delete();
            $users->assignRole($request->input('role_name'));
            toast('تم تعديل المستخدم بنجاح','success');
            return redirect()->route('users.index');
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try{
            User::findOrFail($request->id)->delete();
            toast('تم حذف المستخدم بنجاح','success');
            return redirect()->route('users.index');
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
