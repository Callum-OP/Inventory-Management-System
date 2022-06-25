@extends('base')  
@section('main') 
<div>
    <h1>Update a product</h1> 
@if ($errors->any()) 
    <div> 
        <ul> 
            @foreach ($errors->all() as $error) 
            <li>{{ $error }}</li> 
            @endforeach 
        </ul> 
    </div> 
    <br />  
    @endif 
    <div class="border">
    <form method="post" action="{{ route('inventory.update', $inventory->id) }}"> 
        @method('PATCH')  
        @csrf 
        <div class="form-group"> 
        <label for="name">Product Name:</label> 
            <input type="text" class="form-control" name="name" value="{{ $inventory->name }}" /> 
        </div> 
        <div class="form-group"> 
            <label for="type">Product Type:</label> 
            <input type="text" class="form-control" name="type" value="{{ $inventory->type }}" /> 
        </div> 
        <div class="form-group"> 
            <label for="category">Choose Category:</label> 
            <select class="form-control" name="category">
            <option value="Food & Drink">Food & Drink</option>
            <option value="Health & Beauty">Health & Beauty</option>
            <option value="Clothing">Clothing</option>
            <option value="Household">Household</option>
            </select>
        </div> 
        <div class="form-group"> 
            <label for="price">Product Price:</label> 
            <input type="text" class="form-control" name="price" value="{{ $inventory->price }}" /> 
        </div> 
        <div class="form-group"> 
            <label for="amount">Amount of Product:</label> 
            <input type="number" class="form-control" name="amount" value="{{ $inventory->amount }}" /> 
        </div>
        <button type="submit" class="btn btn-white">Update Product</button> 
        <a href="/inventory" class="btn btn-red">Cancel</a>
    </form> 
    </div>
</div> 
@endsection 