@extends('layouts.app')

@section('content')

@if (Session::has('message')) 

  <div id="success-msg" class="alert alert-success" role="alert">
    <strong>Well done!</strong> {{ Session::get("message") }}
  </div>

@endif


@if (Session::has('mailSent')) 

  <div id="success-msg" class="alert alert-success" role="alert">
    <strong>Well done!</strong> {{ Session::get("mailSent") }}
  </div>

@endif


@if (Session::has('productInserted')) 

  <div id="success-msg" class="alert alert-success" role="alert">
    <strong>Well done!</strong> {{ Session::get("productInserted") }}
  </div>

@endif

<br>
<h1 class="text-center">I NOSTRI PRODOTTI</h1>
<hr class="my-4" style="border-width: 3px; width: 40%;" >
<br>

<div class="row">

@foreach($products as $product)

<div class="col-12 col-lg-3 col-md-4 col-sm-12 col-xs-12" style="margin-top:20px; margin-bottom: 20px;">

	<div class="card">
  		<div class="card-header text-center bg-info">
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
        <li class="list-group-item"><small class="text-muted">Ultimo aggiornamento: {{ $product->updated_at }}</small></li>
         <!-- $now=date("Y-m-d H:i:s");
         $updating = $product->updated_at;
         $b=strtotime($updating); 
         echo App\Http\Controllers\PublicController::updatedTime($now,$updating) . " hours ago"; -->

          <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: lightgray;">Commenti:
            <span class="badge badge-primary badge-pill">{{ App\Comment::where('product_id', $product->id)->get()->count() }}</span>
          </li>

          @foreach (App\Comment::where('product_id', $product->id)->get() as $comment) 
            
            <li class='list-group-item d-flex justify-content-between align-items-center'> {{ $comment->user->name }} says: {{ $comment['comment'] }}
            
            @if (Auth::check())

              @if ($comment['user_id'] == Auth::user()->id) 

                <form method='POST' action=''>
                @csrf
                @method('PUT')
                  <button type='submit' class='btn btn-primary btn-sm'>M</button>
                </form>
                
                <form method='POST' action='/deletecomment/{{ $comment->id }}'>
                @csrf
                @method('DELETE')
                  <button type='submit' class='btn btn-danger btn-sm' onclick="return confirm('Are you sure?')">E</button>
                </form>
              
            </li>

              @endif

            @endif

            </li>

          @endforeach

        <form method="POST" action="/insertcomment/{{$product->id}}" style="margin-top:15px;">
          @csrf
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <button class="btn btn-outline-secondary" type="submit" id="button-addon1"> + </button>
            </div>
            <input type="text" class="form-control" placeholder="..." aria-label="Example text with button addon" aria-describedby="button-addon1" name="comment">
          </div>

        </form>
  		</ul>
	</div> 
</div>   

@endforeach

</div>

@endsection