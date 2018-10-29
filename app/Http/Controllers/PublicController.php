<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use View;

use App;

use Session;

use File;

//https://stackoverflow.com/questions/28573860/laravel-requestall-should-not-be-called-statically

use App\Product;

class PublicController extends Controller

{

    function getRistorante($nome) {

	$ristoranti = [

		["nome"=> "Ristorante1", "descrizione"=>"descrizione ristorante1", "immagine" => "https://cms.eataly.net/itit/wp-content/uploads/sites/6/2015/10/logo-ristorantino-pizza-eataly.jpg", "web" => "https://www.gazzetta.it"],
		["nome"=> "Ristorante2", "descrizione"=>"descrizione ristorante2", "immagine" => "https://www.tgtourism.tv/wp-content/uploads/2015/07/tapas-300x150.jpg","web" => "https://www.gazzetta.it"],
		["nome"=> "Ristorante3", "descrizione"=>"descrizione risstorante3", "immagine" => "https://www.romatips.it/wp-content/uploads/2017/03/Trattorie-economiche-a-Roma-300x150.png","web" => "https://www.gazzetta.it"]
		
	];
	
		foreach ($ristoranti as $ristorante) {
			
			if ($ristorante['nome'] == $nome){
				
				return view('ristorante', ["ristorante" => $ristorante]);
			} 
		}

	return "errore";

	}

	function getThankYouPage() {

		return view ('/thankyou');

	}


	function getRistoranti() {

	$ristoranti = [

		["nome"=> "Ristorante1", "descrizione"=>"descrizione ristorante1", "immagine" => "https://cms.eataly.net/itit/wp-content/uploads/sites/6/2015/10/logo-ristorantino-pizza-eataly.jpg", "web" => "https://www.gazzetta.it"],
		["nome"=> "Ristorante2", "descrizione"=>"descrizione ristorante2", "immagine" => "https://www.tgtourism.tv/wp-content/uploads/2015/07/tapas-300x150.jpg","web" => "https://www.gazzetta.it"],
		["nome"=> "Ristorante3", "descrizione"=>"descrizione ristorante3", "immagine" => "https://www.romatips.it/wp-content/uploads/2017/03/Trattorie-economiche-a-Roma-300x150.png","web" => "https://www.gazzetta.it"]
		
	];

	//lo stesso nome della view
	return view("ristoranti", ["ristoranti" => $ristoranti]);

	}


	function dati (Request $request) {

		//$input = $request->all();

		$this->validate($request, [

			'email' => 'required|email',
			'name' => 'required|max:50',
			'message' => 'required|max:255'

		], [

			'email.required' => 'We need an email address',
			'name.required' => 'Please insert your name and surname',
			'message.required' => 'Please insert your message'

		]);

		$name = $request->input('name');

		return redirect()->route('thankyou', ['name'=>$name]);

	}

	public static function updatedTime($now,$updating) {
        
        //get Unix Epoch of now    
        $a=strtotime($now);
        //get d-m H-i-s of now
        $nowYear = date('Y', $a);
        $nowDay = date('d', $a);
        $nowMonth = date('m', $a); 
        $nowHour = date('H', $a); 
        $nowMinutes = date('i', $a);
        $nowSeconds = date('s', $a);
        
        //get Unix Epoch of updating time
        $b=strtotime($updating);
        //get d-m H-i-s of now
        $updatingYear = date('Y', $b);
        $updatingDay = date('d', $b);
        $updatingMonth = date('m', $b); 
        $updatingHour = date('H', $b);
        $updatingMinutes = date('i', $b);
        $updatingSeconds = date('s', $b);

        if ($nowYear - $updatingYear == 0) {
        	if ($nowMonth - $updatingMonth == 0) {
        		if ($nowDay - $updatingDay == 0) {
        			return $nowHour - $updatingHour;
        		}
        	}
        } 
    
    }

	public function showProducts() {
		$products = Product::all();
    	return view('showproducts')->with('products', $products);
 
    }

    public function deleteProduct($id){
    	$deletedProduct = Product::find($id)->first();
    	$urlDeletedProduct = $deletedProduct->img;
    	$deletedProduct->delete();
    	unlink(public_path($urlDeletedProduct));
    	//File::delete("storage/userfiles/aa.jpeg"); //no slash iniziale!!!
    	return redirect ('showproducts');
    }


}

