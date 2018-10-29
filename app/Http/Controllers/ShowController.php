<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use View;

use App\Product;

use Session;

//https://stackoverflow.com/questions/28573860/laravel-requestall-should-not-be-called-statically



class ShowController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showProduct ($id) {
    	$categories = ["abbigliamento" => "Abbigliamento", "elettrodomestici" => "Elettrodomestici", 
				"giocattoli" => "Giocattoli", "armi" => "Armi"];
    	$product = Product::where('id', $id)->get();
		return view ('show')->with('product',$product)->with('categories',$categories);    
	}

	public function editProduct(Request $req, $id) {
		$product = Product::find($id);
		$product->name = $req->input('name');
		$product->price = $req->input('price');
		$product->description = $req->input('description');
		$product->category = $req->input('category');
		$product->save();
		$products = Product::all();
		Session::flash('message', "Product modified");
    	//return redirect()->back();
    	return redirect('showproducts')->with('products', $products);
    	//session flash persists for 2 requests
    	//fixed thanks to here -> https://stackoverflow.com/questions/14517809/laravels-flash-session-stores-data-twice
    	//and here -> https://stackoverflow.com/questions/24579580/laravel-session-flash-persists-for-2-requests
	}

}
