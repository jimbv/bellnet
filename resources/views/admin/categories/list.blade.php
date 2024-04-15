@extends('layouts.admin')

@section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<div class="container-fluid px-4">
    <h1 class="mt-4">Listado de categorías</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Categorías</li>
    </ol>
    <a href="/admin/categories/create">
    <button class="btn btn-primary">Nueva Categoría</button>
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
                        <th>Nombre</th>
                        <th>Slug</th>
                        <th>Imágen</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $cat)
                    <tr>
                        <td>{{$cat->name}}</td>
                        <td>{{$cat->slug}}</td>
                        <td>{{$cat->image}}</td>
                        <td><a class="btn btn-secondary"  href="/admin/categories/{{$cat->id}}/edit"> Editar </a></td>
                        <td>
                            <form action="/admin/categories/{{$cat->id}}" method="DELETE"><input type="submit" value="Eliminar" class="btn btn-primary"></form>
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