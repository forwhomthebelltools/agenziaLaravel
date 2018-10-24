@extends('layouts.app')


@section('content')


@foreach ($product as $pro)


<div class="row">
	<div class="col-sm-10 col-lg-6 offset-lg-3">
		<form method="POST" action="/update/{{$pro->id}}">
		@csrf
		   <div class="form-group row">
		    <label for="inputName" class="col-sm-2 col-form-label">Name of product</label>
		    <div class="col-sm-10">
		      <input type="text" name="name" class="form-control" id="inputName" value="{{$pro->name}}" placeholder="Name">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="inputPrice" class="col-sm-2 col-form-label">Price</label>
		    <div class="col-sm-10">
		      <input type="text" name="price" class="form-control" id="inputPrice" value="{{$pro->price}}" placeholder="Price">
		    </div>
		  </div>
		   <div class="form-group">
		  	<label for="comment">Description (max 255 char)</label>
		  	<textarea class="form-control" rows="5" name="description" id="desc">{{$pro->description}}</textarea>
		  </div>
			<div class="form-group col-md-4">
	      		<label for="inputState">Categoria</label>
	      		<select id="inputState" name="category" class="form-control">
	        		@foreach($categories as $key => $value)
            			<option value="<?php echo $key; ?>" <?php if($key == $pro->category) echo 'selected'; ?>>{{$value}}</option>
        			@endforeach
	      		</select>
    	  </div>	  
		  <div class="form-group row">
		    <div class="col-sm-10">
		      <button type="submit" class="btn btn-primary">Update product</button>
		    </div>
		  </div>

		</form>
	</div>
</div>

@endforeach

@endsection