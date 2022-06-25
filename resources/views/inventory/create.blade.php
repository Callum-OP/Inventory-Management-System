

@extends('base') 

@section('main') 

<div class="row"> 
<div class="col-sm-8 offset-sm-2"> 
    <h1 class="display-3">Add a product</h1> 
  <div> 
    @if ($errors->any()) 
      <div class="alert alert-danger"> 
        <ul> 
            @foreach ($errors->all() as $error) 
              <li>{{ $error }}</li> 
            @endforeach 
        </ul> 
      </div><br /> 
    @endif 
      <form method="post" action="{{ route('inventory.store') }}"> 
          @csrf 
          <div class="form-group">     
              <label for="name">Product Name:</label> 
              <input type="text" class="form-control" name="name" autocomplete="off" required> 
          </div> 
          <div class="form-group"> 
              <label for="type">Product Type:</label> 
              <input type="text" class="form-control" name="type" autocomplete="off" required> 
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
              <input type="text" class="form-control" name="price" autocomplete="off" required> 
          </div> 
          <div class="form-group"> 
              <label for="amount">Amount of Product:</label> 
              <input type="number" class="form-control" name="amount" autocomplete="off" required> 
          </div>
          <button type="submit" class="btn btn-white">Add product</button> 
      </form> 
  </div> 
</div> 
</div> 
@endsection 