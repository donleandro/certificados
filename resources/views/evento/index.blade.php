@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Index')
@section('content')

<div class = 'container'>
    <h1>
        evento Index
    </h1>
    <div class="row">
        <form class = 'col s3' method = 'get' action = '{!!url("evento")!!}/create'>
            <button class = 'btn red' type = 'submit'>Create New evento</button>
        </form>
    </div>
    <table>
        <thead>
            <th>Nombre</th>
            <th>descripcion</th>
            <th>fecha</th>
            <th>hora</th>
            <th>imagenPromo</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($eventos as $evento) 
            <tr>
                <td>{!!$evento->Nombre!!}</td>
                <td>{!!$evento->descripcion!!}</td>
                <td>{!!$evento->fecha!!}</td>
                <td>{!!$evento->hora!!}</td>
                <td>{!!$evento->imagenPromo!!}</td>
                <td>
                    <div class = 'row'>
                        <a href = '#modal1' class = 'delete btn-floating modal-trigger red' data-link = "/evento/{!!$evento->id!!}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                        <a href = '#' class = 'viewEdit btn-floating blue' data-link = '/evento/{!!$evento->id!!}/edit'><i class = 'material-icons'>edit</i></a>
                        <a href = '#' class = 'viewShow btn-floating orange' data-link = '/evento/{!!$evento->id!!}'><i class = 'material-icons'>info</i></a>
                    </div>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $eventos->render() !!}

</div>
@endsection