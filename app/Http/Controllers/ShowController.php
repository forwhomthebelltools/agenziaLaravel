<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use View;

use App\Product;

use Illuminate\Support\Facades\Auth;


//https://stackoverflow.com/questions/28573860/laravel-requestall-should-not-be-called-statically


class ShowController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showProduct ($id) {

    	if (Auth::check()) {

    		$currentUser = Auth::user();

    		$productRequested = Product::find($id);

    		if ($productRequested->user_id == $currentUser->id) {

	    		$categories = ["abbigliamento" => "Abbigliamento", "elettrodomestici" => "Elettrodomestici", 
					"giocattoli" => "Giocattoli"];

	    		$productCollection = Product::where('id', $id)->with('user')->get();

				return view ('show')->with('productCollection',$productCollection)->with('categories',$categories); 

			} else {

				return "seee u cazz ada avaje";

			}

		}  else {

			return "loggati prima trmoooun";

		}
	}


	

}
