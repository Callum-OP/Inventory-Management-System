<?php 

namespace App\Http\Controllers; 

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;

use App\Inventory; 

class stockController extends Controller 
{ 
    /** 
     * Display a listing of the resource. 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function index() 
    { 
        $inventory = Inventory::all(); 

        return view('stock.viewStock', compact('inventory')); 
    } 

    /** 
     * Show the form for adding stock to a specified resource. 
     * 
     * @param  int  $id 
     * @return \Illuminate\Http\Response 
     */ 
    public function edit($id) 
    { 
        $inventory = Inventory::find($id); 
        return view('stock.addStock', compact('inventory'));         
    } 

/** 
     * Update the stock for the specified resource in storage. 
     * 
     * @param  \Illuminate\Http\Request  $request 
     * @param  int  $id 
     * @return \Illuminate\Http\Response 
     */ 
    public function update(Request $request, $id) 
    { 
        $request->validate([ 
            'amount'=>'required|between:0,9999|gt:0', 
        ]); 

        $inventory = Inventory::find($id);
        $inventory->amount = $inventory->amount + $request->get('amount');
        $inventory->save(); 

        return redirect('/stock')->with('success', 'Stock Ordered!'); 
    }
} 