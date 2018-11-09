@extends('layouts.app')


@section('content')


@foreach ($productCollection as $product)

<!-- $product is a collection, I need for a foreach loop -->
<div class="row">
	<div class="col-sm-10 col-lg-6 offset-lg-3">
		<form method="POST" action="/editproduct/{{$product->id}}">
		@csrf
		@method('PUT')
		   <div class="form-group row">
		    <label for="inputName" class="col-sm-2 col-form-label">Nome del prodotto</label>
		    <div class="col-sm-10">
		      <input type="text" name="name" class="form-control" id="inputName" value="{{$product->name}}" placeholder="Name">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="inputPrice" class="col-sm-2 col-form-label">Prezzo</label>
		    <div class="col-sm-10">
		      <input type="text" name="price" class="form-control" id="inputPrice" value="{{$product->price}}" placeholder="Price">
		    </div>
		  </div>
		   <div class="form-group">
		  	<label for="comment">Descrizione (max 255 caratteri)</label>
		  	<textarea class="form-control" rows="5" name="description" id="desc">{{$product->description}}</textarea>
		  </div>
			<div class="form-group col-md-4">
	      		<label for="inputState">Categoria</label>
	      		<select id="inputState" name="category" class="form-control">
	        		@foreach($categories as $key => $value)
            			<option value="<?php echo $key; ?>" <?php if($key == $product->category) echo 'selected'; ?>>{{$value}}</option>
        			@endforeach
	      		</select>
    	  </div>	  
		  <div class="form-group row">
		    <div class="col-sm-10 text-center">
		      <button type="submit" class="btn btn-primary">Aggiorna prodotto</button>
		    </div>
		  </div>

		</form>
	</div>
</div>

@endforeach

@endsection