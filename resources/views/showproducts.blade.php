@extends('layouts.app')

@section('content')

 @if (Session::has('message')) 

  <div id="success-msg" class="alert alert-success" role="alert">
    <strong>Well done!</strong> {{ Session::get("message") }}
  </div>

@endif

<br>
<h1 class="text-center">OUR PRODUCTS</h1>
<hr class="my-4" style="border-width: 3px; width: 40%;" >
<br>

<div class="row">

@foreach($products as $product)

<div class="col-12 col-lg-3 col-md-4 col-sm-12 col-xs-12" style="margin-top:20px; margin-bottom: 20px;">

	<div class="card">
  		<div class="card-header text-center">
    		{{ $product->name }}
  		</div>
      <img class="card-img-top" src="{{$product->img}}" alt="Card image cap">
  		<ul class="list-group list-group-flush">
        <!--first prende ilprimo che trovi, va bene perchè è sempre uno l'utente 
        <li class="list-group-item">Autore: {{ $product->user()->first()->name }}</li> -->
        <li class="list-group-item">Autore: {{ $product->user->name }}</li>
        <li class="list-group-item"><a href="mailto: {{ $product->user->email }}">Contatta il venditore</a></li>
    		<li class="list-group-item">Categoria: {{ $product->category }}</li>
    		<li class="list-group-item">Prezzo: {{ $product->price }}</li>
        <p class="card-text text-center">
          <small class="text-muted">
          Last updated @php
                       $now=date("Y-m-d H:i:s");
                       $updating = $product->updated_at;
                       $b=strtotime($updating); 
                       echo App\Http\Controllers\PublicController::updatedTime($now,$updating) . " hours ago";
                       @endphp
          </small>
        </p>
  		</ul>
	</div> 
</div>   

@endforeach

</div>

@endsection