<?php

namespace App\Http\Controllers\warehouses_stock;

use App\Http\Controllers\Controller;
use App\Models\books\Book;
use App\Models\categories\Category;
use App\Models\warehouses\Warehouse;
use App\Models\warehouses_stock\WareStock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    function __construct()
    {

        $this->middleware('permission:مخزون المستودعات', ['only' => ['index']]);
        $this->middleware('permission:إضافة مخزون', ['only' => ['create','store']]);
        $this->middleware('permission:تعديل مخزون', ['only' => ['edit','update']]);
        $this->middleware('permission:حذف مخزون', ['only' => ['destroy']]);

    }
    public function index()
    {
        $warehouses = Warehouse::get();
        $categories = Category::get();
        $ware_stocks = WareStock::get();
        $books = Book::get();
        return view('ware_stock.ware_stock' , compact('warehouses','categories','ware_stocks','books'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try{
            $this->validate($request , [
                'warehouses_id' => 'required|unique:ware_stocks,warehouses_id',
                'quantity' => 'required|numeric|min:1',
                'category_id' => 'required',
                'book_id' => 'required'
            ],[
                'warehouses_id.requierd' => 'يجب تحديد المستودع',
                'warehouses_id.unique' => 'المستودع مضاف مسبقا',
                'quantity.required' => 'يجب تحديد الكميه التي ستكون داخل المستودع',
                'quantity.numeric' => 'يجب ان تكون الكميه ارقام',
                'quantity.min' => 'يجب ان يكون أقل كميه 1 فقط',
    
                'category_id.required' => 'يجب تحديد القسم',
    
                'book_id.required' => 'يحب تحديد كتاب واحد على الأقل',
            ]);
            $ware_stock = new WareStock();
            $ware_stock->warehouses_id = $request->warehouses_id;
            $ware_stock->quantity = $request->quantity;
            $ware_stock->category_id = $request->category_id;
            $ware_stock->book_id = $request->book_id;
            $ware_stock->save();
            toast('تم إضافة المخزون بنجاح','success');
            return redirect()->route('ware_stock.index');
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
                'warehouses_id' => 'required',
                'quantity' => 'required|numeric|min:1',
                'category_id' => 'required',
                'book_id' => 'required'
            ],[
                'warehouses_id.requierd' => 'يجب تحديد المستودع',
    
                'quantity.required' => 'يجب تحديد الكميه التي ستكون داخل المستودع',
                'quantity.numeric' => 'يجب ان تكون الكميه ارقام',
                'quantity.min' => 'يجب ان يكون أقل كميه 1 فقط',
    
                'category_id.required' => 'يجب تحديد القسم',
    
                'book_id.required' => 'يحب تحديد كتاب واحد على الأقل',
            ]);
    
            $ware_stocks = WareStock::findOrFail($id);
            $ware_stocks->update([
                'warehouses_id' => $request->warehouses_id,
                'quantity' => $request->quantity,
                'category_id' => $request->category_id,
                'book_id' => $request->book_id
            ]);
            toast('تم تعديل المخزون بنجاح','success');
            return redirect()->route('ware_stock.index');
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(string $id)
    {
        try{
            WareStock::findOrFail($id)->delete();
            toast('تم حذف المخزون بنجاح','success');
            return redirect()->route('ware_stock.index');
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    
}
