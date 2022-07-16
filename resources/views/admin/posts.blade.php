@extends('master')

@section('content')

    <div class="container">
        <hr>
        <hr>
    @if (Session('mensaje'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ Session('mensaje')}}
        </div>

    @endif

        <h1 class="mt-2 mb-3">Listado de Artículos</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Creado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th>{{ $post->id}}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->author }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td style="width: 200px;">
                            <a href="{{ url('/admin/articulos/' . $post->id . '/editar') }}" class="btn btn-sm btn-primary">Editar</a>
                            <a href="{{ url('/admin/articulos/' . $post->id . '/eliminar') }}" class="btn btn-sm btn-danger">Eliminar</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div><!-- /.container -->

@endsection
