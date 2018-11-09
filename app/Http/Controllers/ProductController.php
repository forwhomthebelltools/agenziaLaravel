<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ProductRequest;

use App\Product;

use App\Comment;

use Session;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;

use View;

use File;

use Folklore\Image\Facades\Image;

class ProductController extends Controller
{

    public function insertProductForm() {
    	$currentUser = Auth::user();
        if ($currentUser) {
            return view ('formproduct');
        } else {
            return "Please log in or register before inserting your fucking product. <a href='/login'>Neh, awand</a>";
        }
    	
    }

    public function storeProduct(ProductRequest $req){
    	//Product::create($req->all());

    	$name = $req->input('name');
		$price = $req->input('price');
		$description = $req->input('description');
		$category = $req->input('category');
		//immagine is the name attribute of input type inside the form
		$img_url = $req->file('immagine')->store('public/userfiles'); //upload image
		$img_url = Storage::url($img_url); //get url of image

        //RESIZING IMAGE
        //absolute path
        $path = public_path($img_url);

        $new_image = Image::make($path,
            [
                'width' => 300,
                'height' => 200,
                'crop' => true,

            ]);

        //save again the new resized image on the same path
        $new_image->save($path);

		$product = new Product();
    	
    	//		->name of column table 
    	$product->name = $name;
    	$product->description = $description;
    	$product->price = $price;
    	$product->category = $category;
    	$product->img = $img_url;
    	$product->user_id = Auth::user()->id;

    	$product->save();

    	Session::flash('productInserted', "Product inserted! Good luck! :)");
    	//return redirect()->back();
    	return redirect('showproducts');
    }


    public function deleteProduct($id){
    	//https://stackoverflow.com/questions/41366092/property-title-does-not-exist-on-this-collection-instance
    	$deletedProduct = Product::where('id', $id)->first();
    	//$deletedProduct = Product::find($id)->get();
    	$urlDeletedProduct = $deletedProduct->img;
    	$deletedProduct->delete();
    	unlink(public_path($urlDeletedProduct));
    	//File::delete("storage/userfiles/aa.jpeg"); //no slash iniziale!!!
    	return redirect ('showproducts');
    }


    	public function showProducts() {
		$products = Product::all();
		//https://stackoverflow.com/questions/26996218/call-to-undefined-method-illuminate-database-eloquent-collectionwherehas-in
        //$allComments = Comment::where('product_id', $product->id);
		//$commentsProduct = $allComments->get();
    	return view('showproducts')->with('products', $products);
 
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
