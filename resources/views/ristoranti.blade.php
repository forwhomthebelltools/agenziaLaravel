@extends ('layouts.app')

        @section('content')

        <div class="push"></div>
 
        <!-- JUMBOTRON WITH FORM -->
        <header class="jumbotron" id="home">
            <h1 class="display-3">Travel Tours Bari</h1>
            <hr>
            <p class="lead">La tua agenzia viaggi low cost a Bari. Vacanze, pacchetti personalizzati e voli low cost in ogni parte del mondo!
            </p>
            <p>Guarda qua i posti da visitare a Bari! Esplorali tutti!</p>
  			
			<br>

  			<hr class="my-4" style="border-width: 3px; width: 30%; border-color: #fff;" >
  			<p>Contattaci, ti risponderemo subito!</p>
  			

            <form method="POST" action="/dati">
            @csrf
              <div class="form-group row">
                <div class="col-sm-10 col-lg-6 offset-lg-3">
                  <input type="email" name="email" class="form-control" id="colFormLabelSm" placeholder="Your email">
                </div>
              </div>
              @if ($errors->has('email'))

                <div class="alert alert-danger col-sm-10 col-lg-6 offset-lg-3">{{$errors->first('email')}}</div>

              @endif
              <div class="form-group row">
                <div class="col-sm-10 col-lg-6 offset-lg-3">
                  <input type="text" name="name" class="form-control" id="colFormLabel" placeholder="Your name">
                </div>
              </div>
              @if ($errors->has('name'))

                <div class="alert alert-danger col-sm-10 col-lg-6 offset-lg-3">{{$errors->first('name')}}</div>

              @endif
              <div class="form-group row">
                <div class="col-sm-10 col-lg-6 offset-lg-3">
                    <textarea class="form-control" name="message" rows="5" placeholder="Your message" id="comment"></textarea>
                </div>
              </div>
              @if ($errors->has('message'))

                <div class="alert alert-danger col-sm-10 col-lg-6 offset-lg-3">{{$errors->first('message')}}</div>

              @endif 

              <button type="submit" class="btn btn-primary" style="background-color: gray;">Invia</button>
                
            </form>

		</header>

        
        <section class="row" style="padding-left: 40px; padding-right: 40px;">


            <div class="col-12 text-center">
                <h1>Dove mangiare a Bari</h1>
        	</div>

            @if($ristoranti != [])

                @foreach($ristoranti as $ristorante)

                    <div class="col-12 col-lg-4 col-md-4 col-sm-12 col-xs-12">

                        <div class="card">
                            <img class="card-img-top" src="{{$ristorante['immagine']}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{$ristorante['nome']}}</h5>
                                <p class="card-text">{{$ristorante['descrizione']}}</p>
                                <a href="/ristorante/{{$ristorante['nome']}}" class="btn btn-primary">Go to this restaurant</a>
                            </div>
                        </div>
                    </div>

                @endforeach

            @else

                <p>Ciao</p>

            @endif

        </section>

        <br>

        <section class="row" style="padding-left: 40px; padding-right: 40px;">

          <div class="col-12 text-center">
            <h1>Bar e pub a Bari</h1>
          </div>
          
            <div class="col-12 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="card">
                    <img class="card-img-top" src="https://indulgery-a0f0.netdna-ssl.com/listing_images/600x300/19493_270c0f0ffed63d310cda6a4775be85bf.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        

            <div class="col-12 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="card">
                    <img class="card-img-top" src="http://rwandapaparazzi.rw/wp-content/uploads/2017/04/mdh.1388364982-300x150.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            
            <div class="col-12 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="card">
                    <img class="card-img-top" src="http://www.lavoce.it/wp-content/uploads/2012/12/giovani-300x150.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

        </section>

        <br>

        <section class="row" style="padding-left: 40px; padding-right: 40px; padding-bottom: 15px;">

          <div class="col-12 text-center">
            <h1>Night e locali notturni a Bari</h1>
          </div>
          
            <div class="col-12 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="card">
                    <img class="card-img-top" src="http://www.papido.it/gallery/imageHD.php?src=/torino/upload/Progetto-senza-titolo-85793.jpg&w=300" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        

            <div class="col-12 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="card">
                    <img class="card-img-top" src="https://www.myrtlebeach.com/wp-content/uploads/2017/01/MyrtleBeachNightlife-Main-1-300x150.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            
            <div class="col-12 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="card">
                    <img class="card-img-top" src="http://music-club-test.s3-eu-west-1.amazonaws.com/venues/19070.jpeg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

        </section>

        @endsection


