<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MioController extends Controller

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


	function getRistoranti() {

	$ristoranti = [

		["nome"=> "Ristorante1", "descrizione"=>"descrizione ristorante1", "immagine" => "https://cms.eataly.net/itit/wp-content/uploads/sites/6/2015/10/logo-ristorantino-pizza-eataly.jpg", "web" => "https://www.gazzetta.it"],
		["nome"=> "Ristorante2", "descrizione"=>"descrizione ristorante2", "immagine" => "https://www.tgtourism.tv/wp-content/uploads/2015/07/tapas-300x150.jpg","web" => "https://www.gazzetta.it"],
		["nome"=> "Ristorante3", "descrizione"=>"descrizione ristorante3", "immagine" => "https://www.romatips.it/wp-content/uploads/2017/03/Trattorie-economiche-a-Roma-300x150.png","web" => "https://www.gazzetta.it"]
		
	];

	//lo stesso nome della view
	return view("ristoranti", ["ristoranti" => $ristoranti]);

	}

	function formRistorante() {

		return view ('vaiaform');

	}


	function dati (Request $request) {

		$input = $request->all();
		dd($input);

	}

}
