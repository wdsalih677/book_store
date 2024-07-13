<?php

namespace App\Http\Controllers\warehouses;

use App\Http\Controllers\Controller;
use App\Models\warehouses\Warehouse;
use Illuminate\Http\Request;

class WareController extends Controller
{
    public function index()
    {
        $warehouses = Warehouse::get();
        return view('warehouses.warehouse', compact('warehouses'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try{
            $this->validate($request,[
                'name' => 'required|unique:warehouses',
                'location' => 'required|unique:warehouses',
            ],[
                'name.required' => 'يجب إدخال اسم المستودع',
                'name.unique' => 'إسم المستودع مكرر',

                'location.required' => 'يجب إدخال الموقع',
                'location.unique' => 'الموقع مكرر',
            ]);

            $warehouses = new Warehouse();
            $warehouses->name = $request->name;
            $warehouses->location = $request->location;
            $warehouses->save();
            toast('تم إضافة إضافة المستودع بنجاح','success');
            return redirect()->route('warehouses.index');
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
            $this->validate($request,[
                'name' => 'required|unique:warehouses,name,'.$id,
                'location' => 'required|unique:warehouses,location,'.$id,
            ],[
                'name.required' => 'يجب إدخال اسم المستودع',
                'name.unique' => 'إسم المستودع مكرر',
    
                'location.required' => 'يجب إدخال الموقع',
                'location.unique' => 'الموقع مكرر',
            ]);
    
            $warehouses = Warehouse::findOrFail($id);
            $warehouses->update([
                'name' => $request->name,
                'location' => $request->location,
            ]);
            toast('تم تعديل المستودع بنجاح','success');
            return redirect()->route('warehouses.index');
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(string $id)
    {
        Warehouse::findOrFail($id)->delete();
        toast('تم حذف المستودع بنجاح','success');
        return redirect()->route('warehouses.index');
    }
}
