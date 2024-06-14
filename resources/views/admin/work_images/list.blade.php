@extends('layouts.admin')

@section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<div class="container-fluid px-4">
    <h1 class="mt-4">Listado de categorías</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Trabajos realizados</li>
    </ol>
    <a href="/admin/categories/create">
    <button class="btn btn-primary">Nueva Imágen</button>
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
                        <th>Imágen</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($work_images as $work)
                    <tr>
                        <td>{{$work->title}}</td>
                        <td>{{$work->image}}</td>
                        <td><a class="btn btn-secondary"  href="/admin/work_images/{{$work->id}}/edit"> Editar </a></td>
                        <td>
                            <form action="/admin/work_images/{{$work->id}}" method="DELETE"><input type="submit" value="Eliminar" class="btn btn-primary"></form>
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