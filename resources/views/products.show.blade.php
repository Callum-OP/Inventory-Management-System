@extends('base') 

@section('main') 
<div class="row"> 
<div class="col-sm-12"> 
 

 

<h1>Product Details</h1> 

<div> 

  <a href="/products">Back</a> 

</div> 

 

  <strong> Product Name:</strong> 

  <p>{{ $product->name }}</p> 

  <strong>Product Type:</strong> 

  <p>{{ $product->type }}</p> 

  <strong>Category:</strong> 

  <p>{{ $product->category }}</p> 

  <strong>Price:</strong> 

  <p>{{ $product->price }}</p> 

 </div> 

</div> 