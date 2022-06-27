@extends('base') 
@section('main')
<!-- Intialise array of categories --> 
@php
  $categories = array('Food & Drink', 'Health & Beauty', 'Clothing', 'Household', 'Electronics');
@endphp 
<div>
    <h1>Add a product</h1> 
  <div> 
    @if ($errors->any()) 
      <div class="alert"> 
      <p>Failed to add product!<p>
        <ul>  
            @foreach ($errors->all() as $error) 
              <li>{{ $error }}</li> 
            @endforeach 
        </ul> 
      </div><br/> 
    @endif 
    <div class="border"> 
      <form method="post" action="{{ route('inventory.store') }}"> 
          @csrf 
          <div class="form-group">     
              <label for="brand">Product Brand:</label> 
              <input type="text" class="form-control" name="brand" placeholder="Enter brand of product" autocomplete="off" required/> 
          </div> 
          <div class="form-group">     
              <label for="name">Product Name:</label> 
              <input type="text" class="form-control" name="name" placeholder="Enter name of product" autocomplete="off" required/> 
          </div> 
          <div class="form-group"> 
              <label for="type">Product Type:</label> 
              <input type="text" class="form-control" name="type" placeholder="Enter the type of product" autocomplete="off" required/> 
          </div> 
          <div class="form-group"> 
              <label for="category">Choose Category:</label> 
              <select class="form-control" name="category">
              @foreach($categories as $category)
              <option value={{$category}}>{{$category}}</option>
              @endforeach
              </select>
          </div> 
          <div class="form-group"> 
              <label for="price">Product Price:</label> 
              <input type="text" class="form-control" name="price" placeholder="Enter price of product to be added" autocomplete="off" required/> 
          </div> 
          <div class="form-group"> 
              <label for="amount">Amount of Product:</label> 
              <input type="number" class="form-control" name="amount" placeholder="Enter amount of product to be added" autocomplete="off" required/> 
          </div>
          <button type="submit" class="btn btn-white">Add product</button> 
          <a href="/inventory" class="btn btn-red">Cancel</a>
      </form> 
    </div> 
  </div> 
</div> 
@endsection 