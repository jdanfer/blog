<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Mail\Bienvenida;
use App\Mail\PostCreated;
use App\Post;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    //
    public function showList() {
        $posts = Post::all();
        return view('/admin/posts',['posts'=>$posts]
        );
    }

    public function searchPosts(Request $request) {
        if ($request->exists('search')) {
            $postSearch =Post::where('content', 'like', '%' .$request->input('search') . '%')->get();
        } else {
            $postSearch = Post::all();    
        }
        return view('admin/posts', ['posts'=>$postSearch]);
    }

    public function showCreate() {
        return view('/admin/postCreate');
    }

    public function store(Request $request) {
/*
        $post = new Post;
        $post->title = $request->input('title');
        $post->author = $request->input('author');
        $post->content = $request->input('content');
        $post->save();
        return redirect('/admin/articulos')->with('mensaje','Se ha creado correctamente');

*/
        $rules = [
            'title' => 'required|max:140',
            'author' => 'required',
            'content' => 'required',

        ];
        $customMessages = [
            'title.required' => 'El campo titulo es obligatorio',
            'author.required' => 'El campo autor es obligatorio',
            'content.required' => 'El campo contenido es obligatorio',
            'max'           => 'El campo acepta hasta 140 caracteres',
        ];
        $request->validate($rules,$customMessages);

        $post = Post::create($request->all());

        $path = $request->file('image')->store('img/posts', 'S3');
        $post->image = $path;
        $post->save();

        Mail::to(Auth::user()->email)
            ->send(new postCreated($post));


        return redirect('/admin/articulos')->with('mensaje','Se ha creado correctamente el artículo ' . $request->title);

    }

    public function showEdit($id) {

        $post = Post::find($id);
        return view('/admin/postEdit', ['post' =>$post]);

    }

    public function update(Request $request, $id) {

        $rules = [
            'title' => 'required|max:140',
            'author' => 'required',
            'content' => 'required',

        ];
        $customMessages = [
            'title.required' => 'El campo titulo es obligatorio',
            'author.required' => 'El campo autor es obligatorio',
            'content.required' => 'El campo contenido es obligatorio',
            'max'           => 'El campo acepta hasta 140 caracteres',
        ];
        $request->validate($rules,$customMessages);

/*        
        $request->validate([
            'title' => 'required|max:140',
            'author' => 'required',
            'content' => 'required',
        ]);
*/

        $post = Post::find($id);
        $post->title = $request->title;
        $post->author = $request->author;
        $post->content = $request->content;

        $path = $request->file('image')->store('img/posts', 'public');
        $post->image = $path;
        $post->save();

        return redirect('/admin/articulos')->with('mensaje',"El articulo $post->title  Se ha modificado correctamente");

    }

    public function delete($id) {
        $post = Post::find($id);
        Storage::disk('public')->delete($post->image);
        $post = Post::find($id)->delete();
        return redirect('/admin/articulos')->with('mensaje',"El articulo $id  Se ha eliminado correctamente");

    }
        
}
