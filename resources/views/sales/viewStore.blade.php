@extends('base') 
@section('main') 
<!-- Intialise array of categories --> 
@php
  $categories = array('Food & Drink', 'Health & Beauty', 'Clothing', 'Household', 'Electronics');
@endphp
<div>
  <!-- Top navigation bar featuring option to return to main menu --> 
  <a href="/" class="btn btn-white">Main Menu</a>
  <h1>Sell Stock By Category</h1> 
    <!-- Second navigation bar for user to select which category they want --> 
  <div> 
  @foreach($categories as $category)
    <a href="#{{ $category }}" class="btn btn-white">{{ $category }}</a>
  @endforeach
    <br></br>
  </div>  
  <!-- Display any success alerts -->
  @if(session()->get('success')) 
    <div class="alert"> 
      {{ session()->get('success') }}   
    </div> 
  @endif  
  <!-- Display any failed alerts -->
  @if(session()->get('failed')) 
    <div class="alert"> 
      <p>Sell Failed!</p>
      {{ session()->get('failed') }}   
    </div> 
  @endif   
  <br>
    <!-- Display all products from each category -->
  @foreach($categories as $category)
  <div id="{{ $category }}" class="border">
    <h2>{{ $category }}</h2>
    <table>
      <thead> 
          <tr> 
            <td>Item Name</td> 
            <td>Type</td>  
            <td>Price</td>
            <td>In Stock</td> 
            <td>Actions Available</td> 
          </tr> 
      </thead> 
      <tbody> 
        @foreach($inventory as $product)
        @if($product->category == $category)
          <tr> 
            <td>{{$product->brand}}, {{$product->name}}</td>
            <td>{{$product->type}}</td>  
            <td>£{{$product->price}}</td>     
            @if($product->amount > '0')
            <td>{{$product->amount}}</td> 
            <td> 
            <a href="{{ route('sales.edit',$product->id)}}" class="btn btn-white">Sell Stock</a> 
            </td>
            @else
            <td>Out of stock!</td>
            <td></td>
            @endif 
          </tr> 
      @endif 
      @endforeach
      </tbody>
    </table>
  </div>
  <br> 
  @endforeach
</div>
@endsection 