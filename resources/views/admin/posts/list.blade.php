@extends('layouts.admin')

@section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<div class="container-fluid px-4">
    <h1 class="mt-4">Listado de Noticias</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Noticias</li>
    </ol>
    <a href="/admin/posts/create">
    <button class="btn btn-primary">Nueva Noticia</button>
    </a>
    <p></p>
    <div class="card mb-4">
        <div class="card-body">
            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif 


            <table id="table">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Slug</th>
                        <th>Imágen</th>
                        <th>Texto Corto</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{$post->title}}</td>
                        <td>{{$post->slug}}</td>
                        <td></td>
                        <td><a class="btn btn-secondary"  href="/admin/posts/{{$post->id}}/edit"> Editar </a></td>
                        <td>
                            <form action="/admin/posts/{{$post->id}}" method="DELETE"><input type="submit" value="Eliminar" class="btn btn-primary"></form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
@endsection