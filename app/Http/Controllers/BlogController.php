<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;

class BlogController extends Controller
{

    public function showHome() {
/*
        $articulos = DB::table('posts')->orderBy('created_at','DESC')->take(4)->get();
        return view('home',['articulos'=>$articulos]
    ); */
    $posts = Post::all();
    return view('home',['articulos'=>$posts]
    );
    }

    public function showPost($id)
    {
/*
        $post = DB::table('posts')
            ->where('id', $id)
            ->first();

        return view('post', ['post' => $post]);
*/
/*       $posts = Post::where('id',$id)->first(); */
        $posts = Post::find($id);
       return view('post',['post'=>$posts]
    );

    }
    

}
