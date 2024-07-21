<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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
                'password' => 'required|same:password_confirmation',
                'role_name' => 'required'
            ],[
                'name.required' => 'يجب إضافة إسم المستخدم',
                'email.required' => 'يجب إضافة البريد الإلكتروني ',
                'email.email' => 'يجب ان يكون البريد الإلكتروني إيميل',
                'email.unique' => 'البريد الإلكتروني مضاف مسبقا',
                'password.required' => 'يجب كتابة كلمة السر',
                'password.same' => 'يجب كتابة كلمة السر',
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
    public function user_profile()
    {
        return view('profiles.index');
    }
    public function update_user( Request $request,$id)
    {
        try{
            $request->validate([
                'name' => 'string|max:255',
                'email' => 'string|email|max:255|unique:users,email,'.$id,
                'password' => 'nullable|string|min:8',
                'phone_number' => 'nullable|numeric',
                'address' => 'nullable|string|max:255',
                'bio' => 'nullable|string|max:1000',
                'facebook_link' => 'nullable|url|max:150',
                'twitter_link' => 'nullable|url|max:150',
                'linkedin_link' => 'nullable|url|max:150',
                'web_link' => 'nullable|url|max:150',
            ],[
                'name.string' => 'يجب أن يكون الأسم حرفي',
                'name.max' => 'يجب أن لا يتجاوز عدد حروف الإسم 255 حرف',
                'email.string' => 'يجب أن يكون البريد الإلكتروني حرفي',
                'email.email' => 'يجب أن يكون بريد الإلكتروني',
                'email.max' => 'يجب أن لا يتجاوز عدد حروف البريد الإلكتروني 255 حرف',
                'email.unique' => 'البريد الإلكتروني مضاف مسبقا',
                'password.min' => 'يجب أن لا يقل عدد حروف كلمة السر عن 8 احرف',
                'phone_number.numeric' => 'يجب إدخال أرقام فقط',
                'address.max' => 'يجب أن لا يتجاوز عدد حروف العنوان 255 حرف',
                'bio.max' => 'يجب أن لا تتجاوز عدد حروف السيره الزاتيه 1000 حرف',
                'facebook_link.url' => 'يجب إضافة رابط فقط',
                'twitter_link.url' => 'يجب إضافة رابط فقط',
                'linkedin_link.url' => 'يجب إضافة رابط فقط',
                'web_link.url' => 'يجب إضافة رابط فقط',

                'facebook_link.max' => 'يجب أن لا يزيد حجم الرابط اكثر من 150 حرف',
                'twitter_link.max' => 'يجب أن لا يزيد حجم الرابط اكثر من 150 حرف',
                'linkedin_link.max' => 'يجب أن لا يزيد حجم الرابط اكثر من 150 حرف',
                'web_link.max' => 'يجب أن لا يزيد حجم الرابط اكثر من 150 حرف',
                
            ]);

            $user = User::findOrFail($id);
            $user->name = $request->name;
            $old_name = $user->name;
            $user->email = $request->email;
            $user->password  = $request->password ? Hash::make($request->password) : $user->password;
            $user->address = $request->address;
            $user->phone_number = $request->phone_number;
            $user->bio = $request->bio;
            $user->facebook_link = $request->facebook_link;
            $user->twitter_link  = $request->twitter_link;
            $user->linkedin_link = $request->linkedin_link;
            $user->web_link = $request->web_link;
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $name = $photo->getClientOriginalName();
                $photo->storeAs($request->name, $name, 'public');
                $user->photo = $name;
            }


            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $name = $photo->getClientOriginalName();
                $photo->storeAs($request->name, $name, 'public');
                $user->photo = $name;
            }elseif($old_name !== $request->name){
                    Storage::move("public/{$old_name}", "public/{$request->name}");
            }


            $user->save();
            toast( 'تم تعديل ملفك الشخصي بنجاح' , 'success' );
            return redirect()->route('user_profile', ['id' => $id]);
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
