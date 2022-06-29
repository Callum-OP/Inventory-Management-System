@extends('base')  
@section('main')
<div>
    <h1>Sell Stock</h1> 
    <!-- Display any errors -->  
    @if ($errors->any()) 
      <div class="alert"> 
      <p>Failed to sell!<p>
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
    <p>Price: £{{ $inventory->price }}</p>
    <p>Amount in stock: {{ $inventory->amount }}</p>
    <br>
    <!-- Form for removing stock -->  
    <form method="post" action="{{ route('sales.update', $inventory->id) }}"> 
        @method('PATCH')  
        @csrf 
        <div class="form-group"> 
            <label for="amount">Amount of stock to be sold:</label> 
            <input type="number" class="form-control" name="amount" placeholder="Enter amount of stock to be sold" autocomplete="off" required/> 
        </div>
        <button type="submit" class="btn btn-white">Sell Stock</button> 
        <a href="/sales" class="btn btn-red">Cancel</a>
    </form> 
    </div>
</div> 
@endsection 