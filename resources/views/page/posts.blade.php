@extends('layouts.template')
@section('header')
@endsection
@section('scripts')
<script src="/js/animations.js"></script>
@endsection
@section('styles')
<link href="/css/animations.css?v=2" rel="stylesheet">
@endsection
@section('content')
<section>
    <div class="posts">
        &nbsp;
        <p></p>&nbsp;
        <p></p>&nbsp; 
        <p></p>&nbsp;  
        @livewire('posts')
        <br>
    </div>
</section>
@endsection