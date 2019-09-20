<table>
    <thead>
    <tr>
        <th>Nombre</th>
				<th>Correo</th>
        <th>Documento</th>
    </tr>
    </thead>
    <tbody>
    @foreach($asistentes as $asistente)
        <tr>
            <td>{{$asistente->usuarios->name}} {{$asistente->usuarios->apellido}}</td>
						<td>{{$asistente->usuarios->email}}</td>
            <td>{{$asistente->usuarios->documento}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
