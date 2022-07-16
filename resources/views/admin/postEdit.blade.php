@extends('master')

@section('content')

@if (count($errors) > 0)    
<div class="alert alert-danger">
    <hr>
    <hr>        
    <ul>            
        @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>            
        @endforeach        
    </ul>    
</div> 
@endif

    <div id="admin-post" class="container">
        <h1 class="mt-2 mb-3">Editar Artículo</h1>

        <form action="{{ url('/admin/articulos/' . $post->id . '/editar') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Ingresar un título..." value="{{ $post->title }}">
            </div>
            <div class="form-group">
                <label for="author">Autor</label>
                <input type="text" class="form-control" id="author" name="author" placeholder="Ingresar autor..." value=" {{ $post->author }} ">
            </div>
            <div class="form-group">
                <label for="content">Contenido</label>
                <textarea class="form-control" id="content" name="content" rows="6"> {{$post->content}} </textarea>
            </div>
            <div class="custom-file mb-3"> 
                <input id="image" name="image" type="file" class="custom-file-input">
                <label class="custom-file-label" for="image">Seleccionar una imagen</label>
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>

    </div><!-- /.container -->

@endsection
