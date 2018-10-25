@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-sm-10 col-lg-6 offset-lg-3">
		<form method="POST" action="store" enctype="multipart/form-data">
		@csrf
		   <div class="form-group row">
		    <label for="inputEmail3" class="col-sm-2 col-form-label">Name of product</label>
		    <div class="col-sm-10">
		      <input type="text" name="name" class="form-control" id="inputName" placeholder="Name">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="inputPassword3" class="col-sm-2 col-form-label">Price</label>
		    <div class="col-sm-10">
		      <input type="text" name="price" class="form-control" id="inputPrice" placeholder="Price">
		    </div>
		  </div>
		   <div class="form-group">
		  	<label for="comment">Describe your product (max 255 char)</label>
		  	<textarea class="form-control" rows="5" name="description" id="desc"></textarea>
		  </div>
		  <span class="btn btn-default btn-file">
    		Browse <input type="file" name="immagine">
		  </span>
		  <div class="form-group col-md-4">
      		<label for="inputState">Categoria</label>
      		<select id="inputState" name="category" class="form-control">
        		<option value="abbigliamento" selected>Abbigliamento</option>
        		<option value="elettrodomestici">Elettrodomestici</option>
        		<option value="giocattoli">Giocattoli</option>
        		<option value="armi">Armi</option>
      		</select>
    	  </div>	  
		  <div class="form-group row">
		    <div class="col-sm-10">
		      <button type="submit" class="btn btn-primary">Insert product</button>
		    </div>
		  </div>

		</form>
	</div>
</div>


@endsection