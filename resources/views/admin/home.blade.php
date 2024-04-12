@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Administración</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"></li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                Bienvenido al panel administrativo de su web.

                <p></p>
                <a href="/">
                    <button class="btn btn-primary">Ir al sitio web</button>
                </a>

            </div>
        </div>
    </div>
@endsection