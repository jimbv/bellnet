@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
<h1 class="mt-4">Listado de Subscripciones</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Subscripciones</li>
    </ol>
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
            foreach($subscriptions as $subs){
                $wi_data[] = [ $subs->id,$subs->email,'<form class="d-inline" action="/admin/subscriptions/'.$subs->id.'" method="DELETE"><input type="submit" value="Eliminar" class="btn btn-primary"></form></div>'];
            }

            $heads = [
            'ID',
            'Email',
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