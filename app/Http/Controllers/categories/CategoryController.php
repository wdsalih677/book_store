<?php

namespace App\Http\Controllers\categories;

use App\Http\Controllers\Controller;
use App\Models\categories\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    function __construct()
    {

        $this->middleware('permission:قائمة الكتب', ['only' => ['index']]);
        $this->middleware('permission:إضافة قسم', ['only' => ['create','store']]);
        $this->middleware('permission:تعديل قسم', ['only' => ['edit','update']]);
        $this->middleware('permission:حذف قسم', ['only' => ['destroy']]);

    }
    public function index()
    {
        $categories = Category::select('id','name','description')->get();
        return view('categories.category', compact('categories'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        try{
            $this->validate($request , [
                'name' => 'required|unique:categories|max:50',
                'description' => 'required',
            ],[
                'name.required' => 'يجب إضافة اسم القسم',
                'description.required' => 'يجب إضافة وصف القسم',
                'name.unique' => 'اسم القسم مكرر',
                'name.max' => 'يجب ان لا يتجاوز اسم القسم أكثر من 50 حرف',
            ]);

            $categories = new Category();
            $categories->name = $request->name;
            $categories->description = $request->description;
            $categories->save();
            toast('تمت إضافة القسم بنجاح','success');
            return redirect()->route('categories.index');
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        try{
            $this->validate($request , [
                'name' => 'required|unique:categories,name,' . $id . '|max:50',
                'description' => 'required',
            ],[
                'name.required' => 'يجب إضافة اسم القسم',
                'description.required' => 'يجب إضافة وصف القسم',
                'name.unique' => 'اسم القسم مكرر',
                'name.max' => 'يجب ان لا يتجاوز اسم القسم أكثر من 50 حرف',
            ]);
            $category = Category::findOrFail($request->id);
            $category->update([
                "name" => $request->name,
                "description" => $request->description
            ]);
            toast('تمت تعديل القسم بنجاح','success');
            return redirect()->route('categories.index');
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        Category::findOrFail($request->id)->delete();
        toast('تمت حذف القسم بنجاح','success');
        return redirect()->route('categories.index');
    }
}
