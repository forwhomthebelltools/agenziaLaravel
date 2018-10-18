@extends ('layouts.app')

@section('content')

	<!-- JUMBOTRON WITH FORM -->
        <header class="jumbotron" id="home" style="background-image: url('{{$ristorante["immagine"]}}')">
            <h1 class="display-3">{{$ristorante['nome']}}</h1>
            <hr>
            <p class="lead">{{$ristorante['descrizione']}}</p>
  			
			<br>
			<br>
			<br>
  			<hr class="my-4" style="border-width: 3px; width: 30%;border-color: #fff;" >
  			<p>Contattaci, ti risponderemo subito!</p>
  			<form class="form-inline justify-content-center">
    		  <label class="sr-only" for="yourEmail">Email</label>
    			<div class="input-group mb-2 mr-sm-2 mb-sm-0">
      			   <div class="input-group-addon"></div>
      			   <input type="text" class="form-control" id="yourEmail" placeholder="Your Email">
    			</div>
    			<button type="button" id="button-email" class="btn btn-primary my-2 my-sm-0">Sign Up</button>
  			</form>
		</header>

	<p></p>

@endsection