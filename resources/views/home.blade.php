@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!
                    <br>
                    <br>
                    <b>Ecco i tuoi prodotti che hai inserito:</b>
                    <br>
                    <br>
                    <div class = "row">
                    @foreach ($userProducts as $userProduct)
                        <div class="card col-lg-6">
                            <div class="card-body">
                                <h5 class="card-title">{{$userProduct->name}}</h5>
                                <p class="card-text">{{$userProduct->description}}</p>
                                <p class="card-text">{{$userProduct->price}}</p>
                                <div class="row">
                                    
                                    <a href="/modifyproduct/{{$userProduct->id}}" class="btn btn-primary col-lg-4 col-xs-12">Edit product</a>

                                    <form method="post" class="col-lg-4 col-xs-12" action="/deleteproduct/{{$userProduct->id}}">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete product</button>
                                        
                                    </form>
                                <!--<a href="/delete/{{$userProduct->id}}" class="btn btn-danger">Delete product</a>-->
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
