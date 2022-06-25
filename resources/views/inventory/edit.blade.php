@extends('base')  
@section('main') 
<div class="row"> 
    <div class="col-sm-8 offset-sm-2"> 
        <h1 class="display-3">Update a product</h1> 
@if ($errors->any()) 
        <div class="alert alert-danger"> 
            <ul> 
                @foreach ($errors->all() as $error) 
                <li>{{ $error }}</li> 
                @endforeach 
            </ul> 
        </div> 
        <br />  
        @endif 
        <form method="post" action="{{ route('inventory.update', $product->id) }}"> 
            @method('PATCH')  
            @csrf 
            <div class="form-group"> 
            <label for="name">Product Name:</label> 
                <input type="text" class="form-control" name="name" value={{ $product->name }} /> 
            </div> 
            <div class="form-group"> 
                <label for="type">Product Type:</label> 
                <input type="text" class="form-control" name="type" value={{ $product->type }} /> 
            </div> 
            <div class="form-group"> 
              <label for="category">Choose Category:</label> 
              <select class="form-control" name="category">
              <option value="Food & Drink">Food & Drink</option>
              <option value="Health & Beauty">Health & Beauty</option>
              <option value="Clothing">Clothing</option>
              <option value="Household">Household</option>
              <option value="Gardening">Gardening</option>
              <option value="Pet">Pet</option>
              </select>
            </div> 
            <div class="form-group"> 
                <label for="price">Product Price:</label> 
                <input type="text" class="form-control" name="price" value={{ $product->price }} /> 
            </div> 
            <div class="form-group"> 
              <label for="amount">Amount of Product:</label> 
              <input type="number" class="form-control" name="amount" value={{ $product->amount }}> 
          </div>
            <button type="submit" class="btn btn-white">Update</button> 
        </form> 
    </div> 
</div> 
@endsection 