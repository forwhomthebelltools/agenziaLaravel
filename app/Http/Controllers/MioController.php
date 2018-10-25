<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use View;

use DB;

use App;

//https://stackoverflow.com/questions/28573860/laravel-requestall-should-not-be-called-statically

use App\Product;

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

	public function showProducts() {
		$products = Product::all();
    	return view('showproducts')->with('products', $products);
 
    }

    public function deleteProduct($id){
    	DB::table('products')->where('id', $id)->delete();
    	return redirect ('showproducts');

    }

	public function index() {
    	return view ('formproduct');
    }

    public function store(Request $req){
    	Product::create($req->all());
    	return "Data saved in database. <a href= '/showproducts'>Go to products</a>";

    }

    public function showProduct ($id) {
    	$categories = ["abbigliamento" => "Abbigliamento", "elettrodomestici" => "Elettrodomestici", 
				"giocattoli" => "Giocattoli", "armi" => "Armi"];
    	$product = App\Product::where('id', $id)->get();
		return view ('show')->with('product',$product)->with('categories',$categories);    
	}

	public function editProduct(Request $req, $id) {
		$product = App\Product::find($id);
		$product->name = $req->input('name');
		$product->price = $req->input('price');
		$product->description = $req->input('description');
		$product->category = $req->input('category');
		$product->save();
		return "Data updated in database. <a href= '/showproducts'>Go to products</a>";
	}
}

