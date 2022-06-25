<div>
  <h1 class="display-3">Products</h1>  
  <div> 
    <a href="/" class="btn btn-white">Main Menu</a>  
    <a href="{{ route('inventory.create')}}" class="btn btn-white">New product</a>
    <br></br>
  </div>    
  <table class="table table-striped"> 
    <thead> 
        <tr> 
          <td>ID</td> 
          <td>Name</td> 
          <td>Type</td> 
          <td>Category</td> 
          <td>Price</td> 
          <td>In Stock</td>
          <td colspan = 2>Actions</td> 
        </tr> 
    </thead> 
    <tbody> 
        @foreach($product as $product) 
        <tr> 
            <td>{{$product->id}}</td> 
            <td>{{$product->name}}</td> 
            <td>{{$product->type}}</td> 
            <td>{{$product->category}}</td>  
            <td>{{$product->price}}</td>  
            <td>{{$product->amount}}</td>
            <td> 
                <a href="{{ route('inventory.edit',$product->id)}}" class="btn btn-white">Edit</a> 
            </td> 
            <td> 
                <form action="{{ route('inventory.destroy', $product->id)}}" method="post"> 
                  @csrf 
                  @method('DELETE') 
                  <button class="btn btn-red" type="submit">Delete</button> 
                </form> 
            </td> 
        </tr> 
        @endforeach 
    </tbody> 
  </table> 
  @if(session()->get('success')) 
    <div class="alert alert-success"> 
      {{ session()->get('success') }}   
    </div> 
  @endif
</div> 
@endsection 