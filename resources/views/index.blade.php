@extends('layouts.template')
@section('content')

  <!-- Carrousel casos de exito -->
  <section>
    <div style='height:400px;padding:10px;'></div>

  <img src="/imgs/slider/infinito.png" alt="slider" style="position: absolute; top:0px;left:0xp; z-index:-1;width:100%;">
  </section>

  <!-- Mozaico productos destacados -->
  <section style="width: 100%;background-color:dark-gray;height:700px;">

  </section>

  <!-- Contact form -->
  <section>
    

  </section>
  

  @if (Route::has('login'))
  <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
    @auth
    <a href="{{ url('/admin/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
    @else
    <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

    @if (Route::has('register'))
    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
    @endif
    @endauth
  </div>
  @endif

@endsection