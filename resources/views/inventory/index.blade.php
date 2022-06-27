@extends('base') 
@section('main') 
    <!-- Calculate stock value details --> 
@php
      $totalAmount = 0;
      $totalValue = 0;
      $foodAmount = 0;
      $foodValue = 0;
      $healthAmount = 0;
      $healthValue = 0;
      $clothingAmount = 0;
      $clothingValue = 0;
      $householdAmount = 0;
      $householdValue = 0;

      foreach($inventory as $product) {
        $totalAmount += $product->amount;
        $totalValue += $product->amount * $product->price;

        if($product->category == 'Food & Drink') {
          $foodAmount += $product->amount;
          $foodValue += $product->amount * $product->price;
        }

        if($product->category == 'Health & Beauty') {
          $healthAmount += $product->amount;
          $healthValue += $product->amount * $product->price;
        }

        if($product->category == 'Clothing') {
          $clothingAmount += $product->amount;
          $clothingValue += $product->amount * $product->price;
        }

        if($product->category == 'Household') {
          $householdAmount += $product->amount;
          $householdValue += $product->amount * $product->price;
        }
      }
      @endphp
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
  <div id="Overview" class="border">
    <h2>Overview</h2>
    <p>Total amount of stock: {{$totalAmount}}</p>
    <p>Total value of stock: £{{$totalValue}}</p>
  </div>
  <br>

  <!-- Display products in the food and drink category -->
  <div id="Food & Drink" class="border">
    <h2>Food & Drink</h2>
    <p>Total amount of Food & Drink items in stock: {{$foodAmount}}</p>
    <p>Total value of Food & Drink items in stock: £{{$foodValue}}</p>
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
    <p>Total amount of Health & Beauty items in stock: {{$healthAmount}}</p>
    <p>Total value of Health & Beauty items in stock: £{{$healthValue}}</p>
    <table>
      <thead> 
        <tr> 
          <td>Name</td> 
          <td>Type</td>  
          <td>Price</td> 
          <td>In Stock</td>
          <td>Total Value</td>
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
    <p>Total amount of Clothing items in stock: {{$clothingAmount}}</p>
    <p>Total value of Clothing items in stock: £{{$clothingValue}}</p>
    <table>
      <thead> 
        <tr> 
          <td>Name</td> 
          <td>Type</td>  
          <td>Price</td> 
          <td>In Stock</td>
          <td>Total Value</td>
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
    <p>Total amount of Household items in stock: {{$householdAmount}}</p>
    <p>Total value of Household items in stock: £{{$householdValue}}</p>
    <table>
      <thead> 
        <tr> 
          <td>Name</td> 
          <td>Type</td>  
          <td>Price</td> 
          <td>In Stock</td>
          <td>Total Value</td>
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
        </tr> 
      @endif 
      @endforeach
      </tbody> 
    </table> 
  </div>
</div> 
@endsection 