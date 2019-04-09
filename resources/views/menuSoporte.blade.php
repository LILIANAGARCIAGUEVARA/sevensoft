
@extends('footer')
@extends('header')

@section('header')
   @parent

<div class="header"></div>
  <input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
  <label for="openSidebarMenu" class="sidebarIconToggle">
    <div class="spinner diagonal part-1"></div>
    <div class="spinner horizontal"></div>
    <div class="spinner diagonal part-2"></div>
  </label>
  <div id="sidebarMenu">
    <ul class="sidebarMenuInner">
      <li>Liliana García Guevara <span>Soporte</span></li>
      <li><a href="/preguntastrabajador" >Preguntas</a></li>
      <li><a href="/ticketsoporte">Tickets</a></li>
    </ul>
  </div>
  <div id='center' class="main center">
    <div class="mainInner">
      <div>SEVENSOFT SOPORTE</div>
    </div>

    @section('footer')
        @parent

        @endsection
@endsection
