@extends('base') 
@section('main') 
  <!-- Top navigation bar featuring option to return to main menu --> 
  <a href="/" class="btn btn-white">Main Menu</a>
  <h1>View Inventory By Stock</h1> 
    <!-- Second navigation bar for selecting out of stock or in stock products  --> 
  <div> 
    <a href="#OutOfStock" class="btn btn-white">Out of Stock</a>
    <a href="#InStock" class="btn btn-white">In Stock</a>
    <br><br>
  </div>  
  <!-- Display any success alerts -->
  @if(session()->get('success')) 
    <div class="alert"> 
      {{ session()->get('success') }}   
    </div> 
  @endif  
  <br>
  <!-- Display all products that are out of stock -->
  <div id="OutOfStock" class="border">
    <h2>Out Of Stock</h2>
    <table>
      <thead> 
          <tr> 
            <td>Brand</td> 
            <td>Name</td> 
            <td>Type</td> 
            <td>Category</td> 
            <td>Price</td> 
            <td>In Stock</td>
            <td>Total Value</td>
            <td>Actions Available</td> 
          </tr> 
      </thead> 
      <tbody> 
        @foreach($inventory as $product)
        @if($product->amount == '0')
          <tr> 
            <td>{{$product->brand}}</td>
            <td>{{$product->name}}</td> 
            <td>{{$product->type}}</td>
            <td>{{$product->category}}</td>  
            <td>£{{$product->price}}</td> 
            <td>Out of Stock!</td> 
            <td>£0</td> 
            <td> 
              <a href="{{ route('stock.edit',$product->id)}}" class="btn btn-white">Order Stock</a> 
            </td>
          </tr> 
      @endif 
      @endforeach
      </tbody>
    </table>
  </div>
  <br>
    <!-- Display all products that are in stock -->
    <div id="InStock" class="border">
    <h2>In Stock</h2>
    <table>
      <thead> 
          <tr> 
            <td>Brand</td> 
            <td>Name</td> 
            <td>Type</td> 
            <td>Category</td> 
            <td>Price</td> 
            <td>In Stock</td>
            <td>Total Value</td>
            <td colspan = 1>Actions Available</td> 
          </tr> 
      </thead> 
      <tbody> 
        @foreach($inventory as $product)
        @if($product->amount > '0')
          <tr> 
            <td>{{$product->brand}}</td>
            <td>{{$product->name}}</td>  
            <td>{{$product->type}}</td>  
            <td>{{$product->category}}</td>
            <td>£{{$product->price}}</td> 
            <td>{{$product->amount}}</td>
            <td>£{{$product->price * $product->amount}}</td> 
            <td> 
              <a href="{{ route('stock.edit',$product->id)}}" class="btn btn-white">Order Stock</a>
            </td>
          </tr> 
      @endif 
      @endforeach
      </tbody>
    </table>
  </div>
  <br>
</div> 
@endsection 