@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
<h1 class="mt-4">Listado de categorías</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Categorías</li>
    </ol>
    <a href="/admin/categories/create">
    <button class="btn btn-primary">Nueva Categoría</button>
    </a>
    <p></p>
@stop

@section('content') 
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

        @php
            $wi_data = [];
            foreach($categories as $cat){
                $wi_data[] = [ $cat->id,$cat->name, $cat->slug,$cat->image,'<div class="form-group d-flex"><a class="btn btn-secondary"  href="/admin/categories/'.$cat->id.'/edit"> Editar </a><form class="d-inline" action="/admin/categories/'.$cat->id.'" method="DELETE"><input type="submit" value="Eliminar" class="btn btn-primary"></form></div>'];
            }

            $heads = [
            'ID',
            'Nombre',
            ['label' => 'Slug', 'width' => 20],
            ['label' => 'Imágen', 'width' => 40],
            ['label' => 'Acciones', 'no-export' => true, 'width' => 5],
            ];


            $config = [
            'data' => $wi_data,
            'order' => [[1, 'asc']],
            'columns' => [null, null, null, ['orderable' => false]],
            ];
        @endphp

        <x-adminlte-datatable id="table1" :heads="$heads">
            @foreach($config['data'] as $row)
            <tr>
                @foreach($row as $cell)
                <td>{!! $cell !!}</td>
                @endforeach
            </tr>
            @endforeach
        </x-adminlte-datatable>
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
@stop