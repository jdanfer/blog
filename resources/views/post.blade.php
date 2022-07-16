@extends('master')

@section('titulos')
    Blog de Hack Academy
@endsection

@section('content')

<div class="container">
    <hr>

    <div class="row">

        <div class="col-lg-8">

            <h1 class="mt-4">{{ $post->title }}</h1>

            <p class="lead">
                Autor: <a href="#">{{ $post->author }}</a>
            </p>

            <hr>

            <p>Publicado el {{ $post->created_at }}</p>

            <hr>
            <!-- Post Content -->
            <div class="post-content">
                {!! $post->content !!}
            </div>
            <hr>

            <img class="img-fluid rounded" src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}">

            <hr>
            @if (Auth::check())
            <!-- Comments Form -->
                <div class="card my-4">
                    <h5 class="card-header">Dejar un comentario:</h5>
                    <div class="card-body">
                        <form action="{{ url('/admin/comentarios/crear') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="post_id" name="post_id" value="{{ $post->id }}">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Comentar</button>
                        </form>
                    </div>
                </div>
            @endif    
                <!-- Single Comment -->
                @foreach ($post->comments as $comment)
                    <div class="media mb-4">
                        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                        <div class="media-body">
                            <h5 class="mt-0">{{ $comment->user->name}}</h5>
                            {{ $comment->content }}
                        </div>
                    </div>
                @endforeach
                <!-- Comment with nested comments -->
        </div>
        <!-- Sidebar Widgets Column -->
        <div class="col-lg-4">

            <!-- Search Widget -->
            <div class="card my-4">
                <h5 class="card-header">Buscar</h5>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar...">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button">Buscar</button>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Categories Widget -->
            <div class="card my-4">
                <h5 class="card-header">Categorías</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">PHP</a>
                                </li>
                                <li>
                                    <a href="#">HTML</a>
                                </li>
                                <li>
                                    <a href="#">Laravel</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">JavaScript</a>
                                </li>
                                <li>
                                    <a href="#">CSS</a>
                                </li>
                                <li>
                                    <a href="#">Tutoriales</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Side Widget</h5>
                <div class="card-body">
                    You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                </div>
            </div>

        </div>

    </div><!-- /.row -->

</div><!-- /.container -->

@endsection
