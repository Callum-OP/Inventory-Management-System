<?php 

namespace App\Http\Controllers; 

use Illuminate\Http\Request; 

use App\Product; 

class productController extends Controller 
{ 
    /** 
     * Display a listing of the resource. 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function index() 
    { 
        $product = Product::all(); 

        return view('products.index', compact('product')); 

} 

/** 
     * Show the form for creating a new resource. 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function create() 
    { 
        return view('products.create'); 
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
            'price'=>'required' 
        ]); 

        $product = new Product([ 
            'name' => $request->get('name'), 
            'type' => $request->get('type'), 
            'category' => $request->get('category'), 
            'price' => $request->get('price'), 
        ]); 
        $product->save(); 
        return redirect('/products')->with('success', 'Product saved!'); 
    } 

/** 
     * Display the specified resource. 
     * 
     * @param  int  $id 
     * @return \Illuminate\Http\Response 
     */ 
    public function show($id) 
    { 
        return view('products.show', compact('id'));         
    } 

/** 
     * Show the form for editing the specified resource. 
     * 
     * @param  int  $id 
     * @return \Illuminate\Http\Response 
     */ 
    public function edit($id) 
    { 
        $product = Product::find($id); 
        return view('products.edit', compact('product'));         
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
            'price'=>'required' 
        ]); 

        $product = Product::find($id); 
        $product->name =  $request->get('name'); 
        $product->type = $request->get('type'); 
        $product->category = $request->get('category'); 
        $product->price = $request->get('price'); 
        $product->save(); 

        return redirect('/products')->with('success', 'Product updated!'); 
    }

/** 
     * Remove the specified resource from storage. 
     * 
     * @param  int  $id 
     * @return \Illuminate\Http\Response 
     */ 
    public function destroy($id) 
    { 
        $product = Product::find($id); 
        $product->delete(); 

        return redirect('/products')->with('success', 'Product deleted!');
    }  
} 