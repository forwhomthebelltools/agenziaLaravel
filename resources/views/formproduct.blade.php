@extends('layouts.app')

@section('content')
<br>
<h1 class="text-center">INSERT YOUR PRODUCT</h1>
<hr class="my-4" style="border-width: 3px; width: 40%;" >
<br>
<div class="row">
	<div class="col-sm-10 col-lg-6 offset-lg-3">
		<form method="POST" action="store" enctype="multipart/form-data">
		@csrf
		   <div class="form-group row">
		    <label for="inputEmail3" class="col-sm-2 col-form-label">Name of product</label>
		    <div class="col-sm-10">
		      <input type="text" name="name" class="form-control" id="inputName" placeholder="Name" value="{{ old('name')}}">
		    </div>
		    @if ($errors->has('name'))

                <div class="alert alert-danger col-sm-10 col-lg-12">{{$errors->first('name')}}</div>

            @endif
		  </div>
		  <div class="form-group row">
		    <label for="inputPassword3" class="col-sm-2 col-form-label">Price</label>
		    <div class="col-sm-10">
		      <input type="text" name="price" class="form-control" id="inputPrice" placeholder="Price" value="{{ old('price')}}">
		    </div>
		  </div>
		  @if ($errors->has('price'))

                <div class="alert alert-danger col-sm-10 col-lg-12">{{$errors->first('price')}}</div>

           @endif
		   <div class="form-group">
		  	<label for="comment">Describe your product (max 255 char)</label>
		  	<textarea class="form-control" rows="5" name="description" id="desc">{{ old('description')}}</textarea>
		  </div>
		  @if ($errors->has('description'))

                <div class="alert alert-danger col-sm-10 col-lg-12">{{$errors->first('description')}}</div>

          @endif
		  <span class="btn btn-default btn-file">
    		Upload image <input type="file" name="immagine">
		  </span>
		  @if ($errors->has('immagine'))

                <div class="alert alert-danger col-sm-10 col-lg-12">{{$errors->first('immagine')}}</div>

          @endif
		  <div class="form-group col-md-4">
      		<label for="inputState">Categoria</label>
      		<select id="inputState" name="category" class="form-control">
        		<option value="abbigliamento" selected>Abbigliamento</option>
        		<option value="elettrodomestici">Elettrodomestici</option>
        		<option value="giocattoli">Giocattoli</option>
        		<option value="armi">Armi</option>
      		</select>
    	  </div>
    	  <br>	  
		  <div class="form-group row">
		    <div class="col-sm-10 text-center">
		      <button type="submit" class="btn btn-primary">Insert product</button>
		    </div>
		  </div>

		</form>
	</div>
</div>


@endsection