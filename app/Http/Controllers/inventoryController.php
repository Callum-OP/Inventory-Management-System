<?php 

namespace App\Http\Controllers; 

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;

use App\Inventory; 

class inventoryController extends Controller 
{ 
    /** 
     * Display a listing of the resource. 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function index() 
    { 
        $inventory = Inventory::all(); 

        return view('inventory.index', compact('inventory')); 
    } 

/** 
     * Show the form for creating a new resource. 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function create() 
    { 
        return view('inventory.create');
    }

/** 
     * Store a newly created resource in storage. 
     * 
     * @param  \Illuminate\Http\Request  $request 
     * @return \Illuminate\Http\Response 
     */ 
    public function store(Request $request) 
    { 
        $request->validate([ 
            'brand'=>'required|max:25',
            'name'=>'required|max:25',
            'type'=>'required|max:25', 
            'category'=>'required',
            'price'=>'required|numeric|between:0,9999.99|gt:0', 
            'amount'=>'required|between:0,999999|gt:0'
        ]); 

        $inventory = new Inventory([ 
            'brand'=> $request->get('brand'), 
            'name' => $request->get('name'), 
            'type' => $request->get('type'), 
            'category' => $request->get('category'), 
            'price' => $request->get('price'), 
            'amount' => $request->get('amount'), 
        ]); 
        $inventory->save(); 
        return redirect('/inventory')->with('success', 'Product added!'); 
    } 

/** 
     * Show the form for editing the specified resource. 
     * 
     * @param  int  $id 
     * @return \Illuminate\Http\Response 
     */ 
    public function edit($id) 
    { 
        $inventory = Inventory::find($id); 
        return view('inventory.edit', compact('inventory'));         
    } 

/** 
     * Update the specified resource in storage. 
     * 
     * @param  \Illuminate\Http\Request  $request 
     * @param  int  $id 
     * @return \Illuminate\Http\Response 
     */ 
    public function update(Request $request, $id) 
    { 
        $request->validate([ 
            'brand'=>'required|max:25',
            'name'=>'required|max:25',
            'type'=>'required|max:25', 
            'category'=>'required',
            'price'=>'required|numeric|between:0,9999.99|gt:0', 
            'amount'=>'required|between:0,999999|gt:0'
        ]); 

        $inventory = Inventory::find($id);
        $inventory->brand = $request->get('brand'); 
        $inventory->name =  $request->get('name'); 
        $inventory->type = $request->get('type'); 
        $inventory->category = $request->get('category'); 
        $inventory->price = $request->get('price'); 
        $inventory->amount = $request->get('amount');
        $inventory->save(); 

        return redirect('/inventory')->with('success', 'Product updated!'); 
    }

/** 
     * Remove the specified resource from storage. 
     * 
     * @param  int  $id 
     * @return \Illuminate\Http\Response 
     */ 
    public function destroy($id) 
    { 
        $inventory = Inventory::find($id); 
        $inventory->delete(); 

        return redirect('/inventory')->with('success', 'Product deleted!');
    }  
} 