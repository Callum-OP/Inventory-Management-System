<?php 

namespace App\Http\Controllers; 

use Illuminate\Http\Request; 

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
        $product = Inventory::all(); 

        return view('inventory.index', compact('product')); 

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
            'name'=>'required', 
            'type'=>'required', 
            'category'=>'required',
            'price'=>'required', 
            'amount'=>'required' 
        ]); 

        $product = new Inventory([ 
            'name' => $request->get('name'), 
            'type' => $request->get('type'), 
            'category' => $request->get('category'), 
            'price' => $request->get('price'), 
            'amount' => $request->get('amount'), 
        ]); 
        $product->save(); 
        return redirect('/inventory')->with('success', 'Product added!'); 
    } 

/** 
     * Display the specified resource. 
     * 
     * @param  int  $id 
     * @return \Illuminate\Http\Response 
     */ 
    public function show($id) 
    { 
        return view('inventory.show', compact('id'));         
    } 

/** 
     * Show the form for editing the specified resource. 
     * 
     * @param  int  $id 
     * @return \Illuminate\Http\Response 
     */ 
    public function edit($id) 
    { 
        $product = Inventory::find($id); 
        return view('inventory.edit', compact('product'));         
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
            'name'=>'required', 
            'type'=>'required', 
            'category'=>'required',
            'price'=>'required',
            'amount'=>'required' 
        ]); 

        $product = Inventory::find($id); 
        $product->name =  $request->get('name'); 
        $product->type = $request->get('type'); 
        $product->category = $request->get('category'); 
        $product->price = $request->get('price'); 
        $product->price = $request->get('amount'); 
        $product->save(); 

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
        $product = Inventory::find($id); 
        $product->delete(); 

        return redirect('/inventory')->with('success', 'Product deleted!');
    }  
} 