@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Create')
@section('content')

<div class = 'container'>
    <h1>
        Create evento
    </h1>
    <form method = 'get' action = '{!!url("evento")!!}'>
        <button class = 'btn blue'>evento Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!!url("evento")!!}'>
        <input type = 'hidden' name = '_token' value = '{{ Session::token() }}'>
        <div class="input-field col s6">
            <input id="Nombre" name = "Nombre" type="text" class="validate">
            <label for="Nombre">Nombre</label>
        </div>
        <div class="input-field col s6">
            <input id="descripcion" name = "descripcion" type="text" class="validate">
            <label for="descripcion">descripcion</label>
        </div>
        <div class="input-field col s6">
            <input id="fecha" name = "fecha" type="text" class="validate">
            <label for="fecha">fecha</label>
        </div>
        <div class="input-field col s6">
            <input id="hora" name = "hora" type="text" class="validate">
            <label for="hora">hora</label>
        </div>
        <div class="input-field col s6">
            <input id="imagenPromo" name = "imagenPromo" type="text" class="validate">
            <label for="imagenPromo">imagenPromo</label>
        </div>
        <button class = 'btn red' type ='submit'>Create</button>
    </form>
</div>
@endsection