@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Show')
@section('content')

<div class = 'container'>
    <h1>
        Show evento
    </h1>
    <form method = 'get' action = '{!!url("evento")!!}'>
        <button class = 'btn blue'>evento Index</button>
    </form>
    <table class = 'highlight bordered'>
        <thead>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            <tr>
                <td>
                    <b><i>Nombre : </i></b>
                </td>
                <td>{!!$evento->Nombre!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>descripcion : </i></b>
                </td>
                <td>{!!$evento->descripcion!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>fecha : </i></b>
                </td>
                <td>{!!$evento->fecha!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>hora : </i></b>
                </td>
                <td>{!!$evento->hora!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>imagenPromo : </i></b>
                </td>
                <td>{!!$evento->imagenPromo!!}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection