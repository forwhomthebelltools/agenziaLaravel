<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;

use App\Product;

use Illuminate\Support\Facades\Auth;

class CommentController extends Controller

{

    public function insertComment(Request $req, $id) {

    $currentUser = Auth::user();
    
    if ($currentUser) {
    
        $commentInserted = $req->input('comment');
        $productCommented = Product::find($id);

        $comment = new Comment();

        $comment->comment=$commentInserted;
        $comment->product_id=$productCommented['id'];
        $comment->user_id=$currentUser->id;
        $comment->save();

        return redirect ('showproducts');
    
    } else {
    
        return "Please log in or register before inserting your fucking comment. <a href='/login'>Neh, awand</a>";
    
    }

    

}
	
    public function deleteComment($id) {

    	$deletedComment = Comment::find($id)->first();
    	$deletedComment->delete();
    	return redirect ('showproducts');

    }
}
