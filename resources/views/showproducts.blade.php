@extends('layouts.app')

@section('content')

<div class="row">

<div class="col-12 text-center">
    <h1>I nostri prodotti</h1>
</div>

@foreach($products as $product)

<div class="col-12 col-lg-3 col-md-4 col-sm-12 col-xs-12" style="margin-top:20px; margin-bottom: 20px;">

	<div class="card">
  		<div class="card-header text-center">
    		{{ $product->name }}
  		</div>
      <img class="card-img-top" src="{{$product->img}}" alt="Card image cap">
  		<ul class="list-group list-group-flush">
    		<li class="list-group-item">Categoria: {{ $product->category }}</li>
    		<li class="list-group-item">Prezzo: {{ $product->price }}</li>
    		<li class="list-group-item">{{ $product->description }}</li>
  		</ul>
  		<div class="card-body">
        <a href="/show/{{$product->id}}" class="card-link">Show/modify product</a>
  		</div>
      <form method="post" action="/delete/{{$product->id}}">
      @csrf
      @method('DELETE')
      <div class="col-md-6 offset-md-3 text-center"> 
        <button type="submit" value="delete product" class="btn btn-primary" onclick="return confirm('Are you sure?')">Delete product</button> 
      </div>
        
      </form>
	</div> 

</div>   

@endforeach

</div>

@endsection