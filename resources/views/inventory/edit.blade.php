@extends('base')  
@section('main')
<!-- Intialise array of categories --> 
@php
  $categories = array('Food & Drink', 'Health & Beauty', 'Clothing', 'Household', 'Electronics');
@endphp 
<div>
    <h1>Update a product</h1> 
    @if ($errors->any()) 
      <div class="alert"> 
      <p>Failed to update product!<p>
        <ul>  
            @foreach ($errors->all() as $error) 
              <li>{{ $error }}</li> 
            @endforeach 
        </ul> 
      </div><br/> 
    @endif 
    <!-- Form for updating product details --> 
    <div class="border">
    <form method="post" action="{{ route('inventory.update', $inventory->id) }}"> 
        @method('PATCH')  
        @csrf 
        <div class="form-group">     
              <label for="brand">Product brand:</label> 
              <input type="text" class="form-control" name="brand" placeholder="Enter brand of product" value="{{ $inventory->brand }}" autocomplete="off" required/> 
          </div> 
        <div class="form-group"> 
            <label for="name">Product name:</label> 
            <input type="text" class="form-control" name="name" placeholder="Enter name of product" value="{{ $inventory->name }}" autocomplete="off" required/> 
        </div> 
        <div class="form-group"> 
            <label for="type">Product type:</label> 
            <input type="text" class="form-control" name="type" placeholder="Enter the type of product" value="{{ $inventory->type }}" autocomplete="off" required/> 
        </div> 
        <div class="form-group"> 
            <label for="category">Choose category:</label> 
            <select class="form-control" name="category">
                <option value="{{ $inventory->category }}">{{ $inventory->category }}</option>
            @foreach($categories as $category)
                @if($category != $inventory->category)
                <option value="{{ $category }}">{{ $category }}</option>
                @endif
            @endforeach
            </select>
        </div> 
        <div class="form-group"> 
            <label for="price">Product price:</label> 
            <input type="text" class="form-control" name="price" placeholder="Enter price of product to be added" value="{{ $inventory->price }}" autocomplete="off" required/> 
        </div> 
        <div class="form-group"> 
            <label for="amount">Amount of product:</label> 
            <input type="number" class="form-control" name="amount" placeholder="Enter amount of product to be added" value="{{ $inventory->amount }}" autocomplete="off" required/> 
        </div>
        <button type="submit" class="btn btn-white">Update Product</button> 
        <a href="/inventory" class="btn btn-red">Cancel</a>
    </form> 
    </div>
</div> 
@endsection 