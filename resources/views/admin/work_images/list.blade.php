@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
<h1>Trabajos realizados</h1>
@stop

@section('content')
<a href="/admin/work_images/create">
    <button class="btn btn-primary">Nueva Imágen</button>
</a> <br> <br>


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
            foreach($work_images as $work){
            $wi_data[] = [ $work->id,$work->title, $work->image,'<div class="form-group d-flex"><a class="btn btn-secondary"  href="/admin/work_images/'.$work->id.'/edit"> Editar </a><form class="d-inline" action="/admin/work_images/'.$work->id.'" method="DELETE"><input type="submit" value="Eliminar" class="btn btn-primary"></form></div>'];
            }

            $heads = [
            'ID',
            'Título',
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