<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ProductRequest;

use App\Product;

use App\Comment;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;

use View;

class InsertController extends Controller
{

    public function index() {
    	$currentUser = Auth::user();
        if ($currentUser) {
            return view ('formproduct');
        } else {
            return "Please log in or register before inserting your fucking product. <a href='/login'>Neh, awand</a>";
        }
    	
    }

    public function store(ProductRequest $req){
    	//Product::create($req->all());

    	$name = $req->input('name');
		$price = $req->input('price');
		$description = $req->input('description');
		$category = $req->input('category');
		//immagine is the name attribute of input type inside the form
		$img_url = $req->file('immagine')->store('public/userfiles'); //upload image
		$img_url = Storage::url($img_url); //get url of image

		$product = new Product();
    	
    	//		->name of column table 
    	$product->name = $name;
    	$product->description = $description;
    	$product->price = $price;
    	$product->category = $category;
    	$product->img = $img_url;
    	$product->user_id = Auth::user()->id;

    	$product->save();

    	return "Data saved in database. <a href= '/showproducts'>Go to products</a>";
    }

    public function insertComment(Request $req, $id) {

        $currentUser = Auth::user();
        
        if ($currentUser) {
        
            $commentInserted = $req->input('comment');
            $productCommented = Product::find($id);

            $comment = new Comment();

            $comment->comment=$commentInserted;
            $comment->product_id=$productCommented['id'];
            $comment->save();

            return "Comment saved. <a href='/showproducts'>Go to products</a>";
        
        } else {
        
            return "Please log in or register before inserting your fucking comment. <a href='/login'>Neh, awand</a>";
        
        }

        

    }

}
