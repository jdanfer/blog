<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    public function addComment(Request $request) {
        $comment = new Comment;
        $comment->user_id= Auth::user()->id;
        $comment->post_id= $request->post_id;
        $comment->content= $request->content;
        $comment->save();
        return redirect('articulo/'. $request->post_id);

    }
}
