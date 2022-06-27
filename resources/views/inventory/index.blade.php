@extends('base') 
@section('main') 
<!-- Intialise array of categories and other variables --> 
@php
  $categories = array('Food & Drink', 'Health & Beauty', 'Clothing', 'Household');
  $totalAmount = 0;
  $totalValue = 0;
  $amount = 0;
  $value = 0;
@endphp
<div>
  <!-- Top navigation bar featuring option to return to main menu --> 
  <a href="/" class="btn btn-white">Main Menu</a>
  <a href="{{ route('inventory.create')}}" class="btn btn-white">Add a new product</a>
  <h1>Products By Category</h1> 
    <!-- Second navigation bar for user to select which category they want --> 
  <div> 
    @foreach($categories as $category)
    <a href="#{{ $category }}" class="btn btn-white">{{ $category }}</a>
    @endforeach
    <a href="#Overview" class="btn btn-white">Overview</a>
    <br><br>
  </div>  
  @if(session()->get('success')) 
    <div class="alert"> 
      {{ session()->get('success') }}   
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
            <td>Name</td> 
            <td>Type</td>  
            <td>Price</td> 
            <td>In Stock</td>
            <td>Total Value</td>
            <td colspan = 2>Modify Product</td> 
          </tr> 
      </thead> 
      <tbody> 
        @foreach($inventory as $product)
        @if($product->category==$category)
          <tr> 
            <td>{{$product->name}}</td> 
            <td>{{$product->type}}</td>  
            <td>£{{$product->price}}</td> 
            @if($product->amount>'0') 
            <td>{{$product->amount}}</td> 
            @else
            <td>Out of Stock!</td> 
            @endif
            <td>£{{$product->price * $product->amount}}</td> 
            <td> 
              <a href="{{ route('inventory.edit',$product->id)}}" class="btn btn-white">Edit Details</a> 
            </td>
            <td> 
              <form action="{{ route('inventory.destroy', $product->id)}}" method="post"> 
                @csrf 
                @method('DELETE') 
                <button class="btn btn-red" type="submit">Remove Product</button> 
              </form> 
            </td> 
            @php
            $totalAmount += $product->amount;
            $totalValue += $product->price * $product->amount;
            $amount += $product->amount;
            $value += $product->price * $product->amount;
            @endphp
          </tr> 
      @endif 
      @endforeach
      </tbody>
      <p>Total amount of {{ $category }} items in stock: {{ $amount }}</p>
      <p>Total value of {{ $category }} items in stock: £{{ $value }}</p>
      @php
        $amount = 0;
        $value = 0;
      @endphp
    </table>
  </div>
  <br>
  @endforeach
  <!-- Display an overview of the total stock and value -->
  <div id="Overview" class="border">
    <h2>Overview</h2>
    <p>Total amount of stock: {{$totalAmount}}</p>
    <p>Total value of stock: £{{$totalValue}}</p>
  </div>
  <br>
</div> 
@endsection 