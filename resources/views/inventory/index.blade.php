@extends('base') 
@section('main') 
<div>
  <a href="/" class="btn btn-white">Main Menu</a>
  <a href="{{ route('inventory.create')}}" class="btn btn-white">Add a new product</a>
  <h1>Products By Category</h1> 
    <!-- Navigation bar for user to select which category they want --> 
  <div> 
    <a href="#Food & Drink" class="btn btn-white">Food & Drink</a>
    <a href="#Health & Beauty" class="btn btn-white">Health & Beauty</a>
    <a href="#Clothing" class="btn btn-white">Clothing</a>
    <a href="#Household" class="btn btn-white">Household</a>
    <br><br>
  </div>  
  @if(session()->get('success')) 
    <div class="alert"> 
      {{ session()->get('success') }}   
    </div> 
  @endif  
  <br>
  <!-- Display products in the food and drink category -->
  <div id="Food & Drink" class="border">
  <h2>Food & Drink</h2>
    <table>
      <thead> 
          <tr> 
            <td>Name</td> 
            <td>Type</td>  
            <td>Price</td> 
            <td>In Stock</td>
            <td colspan = 2>Modify Product</td> 
          </tr> 
      </thead> 
      <tbody> 
        @foreach($inventory as $product)
        @if($product->category=='Food & Drink')
          <tr> 
            <td>{{$product->name}}</td> 
            <td>{{$product->type}}</td>  
            <td>£{{$product->price}}</td> 
            @if($product->amount>'0') 
            <td>{{$product->amount}}</td> 
            @else
            <td>Out of Stock!</td> 
            @endif 
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
          </tr> 
      @endif 
      @endforeach
      </tbody>
    </table>
  </div>
  <br>
  <!-- Display products in the health and beauty category -->
  <div id="Health & Beauty" class="border">
  <h2>Health & Beauty</h2>
    <table>
      <thead> 
        <tr> 
          <td>Name</td> 
          <td>Type</td>  
          <td>Price</td> 
          <td>In Stock</td>
          <td colspan = 2>Actions</td> 
        </tr> 
      </thead>
      <tbody> 
      @foreach($inventory as $product)
      @if($product->category=='Health & Beauty')
        <tr> 
          <td>{{$product->name}}</td> 
          <td>{{$product->type}}</td>  
          <td>£{{$product->price}}</td>  
          @if($product->amount>'0') 
          <td>{{$product->amount}}</td> 
          @else
          <td>Out of Stock!</td> 
          @endif 
          <td> 
            <a href="{{ route('inventory.edit',$product->id)}}" class="btn btn-white">Edit Product Details</a> 
          </td> 
          <td> 
            <form action="{{ route('inventory.destroy', $product->id)}}" method="post"> 
              @csrf 
              @method('DELETE') 
              <button class="btn btn-red" type="submit">Remove Product</button> 
            </form> 
          </td> 
        </tr> 
      @endif 
      @endforeach
      </tbody> 
    </table> 
  </div>
  <br>
  <!-- Display products in the clothing category -->
  <div id="Clothing" class="border">
  <h2>Clothing</h2>
    <table>
      <thead> 
        <tr> 
          <td>Name</td> 
          <td>Type</td>  
          <td>Price</td> 
          <td>In Stock</td>
          <td colspan = 2>Actions</td> 
        </tr> 
      </thead>
      <tbody> 
      @foreach($inventory as $product)
      @if($product->category=='Clothing')
        <tr> 
          <td>{{$product->name}}</td> 
          <td>{{$product->type}}</td>  
          <td>£{{$product->price}}</td>  
          @if($product->amount>'0') 
          <td>{{$product->amount}}</td> 
          @else
          <td>Out of Stock!</td> 
          @endif 
          <td> 
            <a href="{{ route('inventory.edit',$product->id)}}" class="btn btn-white">Edit Product Details</a> 
          </td> 
          <td> 
            <form action="{{ route('inventory.destroy', $product->id)}}" method="post"> 
              @csrf 
              @method('DELETE') 
              <button class="btn btn-red" type="submit">Remove Product</button> 
            </form> 
          </td> 
        </tr> 
      @endif 
      @endforeach
      </tbody> 
    </table> 
  </div>
  <br>
  <!-- Display products in the household category -->
  <div id="Household" class="border">
  <h2>Household</h2>
    <table>
      <thead> 
        <tr> 
          <td>Name</td> 
          <td>Type</td>  
          <td>Price</td> 
          <td>In Stock</td>
          <td colspan = 2>Actions</td> 
        </tr> 
      </thead>
      <tbody> 
      @foreach($inventory as $product)
      @if($product->category=='Household')
        <tr> 
          <td>{{$product->name}}</td> 
          <td>{{$product->type}}</td>  
          <td>£{{$product->price}}</td>  
          @if($product->amount>'0') 
          <td>{{$product->amount}}</td> 
          @else
          <td>Out of Stock!</td> 
          @endif 
          <td> 
            <a href="{{ route('inventory.edit',$product->id)}}" class="btn btn-white">Edit Product Details</a> 
          </td> 
          <td> 
            <form action="{{ route('inventory.destroy', $product->id)}}" method="post"> 
              @csrf 
              @method('DELETE') 
              <button class="btn btn-red" type="submit">Remove Product</button> 
            </form> 
          </td> 
        </tr> 
      @endif 
      @endforeach
      </tbody> 
    </table> 
  </div>
</div> 
@endsection 