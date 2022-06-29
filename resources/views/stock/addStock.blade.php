@extends('base')  
@section('main')
<div>
    <h1>Order Stock</h1> 
    <!-- Display any errors -->
    @if ($errors->any()) 
      <div class="alert"> 
        <p>Failed to order stock!<p>
        <ul>  
            @foreach ($errors->all() as $error) 
              <li>{{ $error }}</li> 
            @endforeach 
        </ul> 
      </div><br/> 
    @endif   
    <!-- Display chosen product details -->  
    <div class="border">
    <h3>Product Details</h3>
    <p>Brand: {{ $inventory->brand }}</p>
    <p>Name: {{ $inventory->name }}</p>
    <p>Current amount in stock: {{ $inventory->amount }}</p>
    <br>
    <form method="post" action="{{ route('stock.update', $inventory->id) }}"> 
        @method('PATCH')  
        @csrf 
        <!-- Form for adding stock -->  
        <div class="form-group"> 
            <label for="amount">Amount of stock to be delivered:</label> 
            <input type="number" class="form-control" name="amount" placeholder="Enter amount of stock to be delivered" autocomplete="off" required/> 
        </div>
        <button type="submit" class="btn btn-white">Order Stock</button> 
        <a href="/stock" class="btn btn-red">Cancel</a>
    </form> 
    </div>
</div> 
@endsection 