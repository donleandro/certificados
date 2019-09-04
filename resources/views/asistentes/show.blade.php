@extends('layouts.app', ['activePage' => 'asistentes', 'titlePage' => __('asistentes')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{$evento->nombre}}</h4>
                <p class="card-category"> {{ __('Aquí puedes generar los certificados') }}</p>
              </div>
              <div class="card-body">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <div class="col-12 text-right">
                    <a href="{{ route('asistentes') }}" class="btn btn-sm btn-primary">{{ __('Volver a la lista') }}</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                          {{ __('nombre') }}
                      </th> 
                      <th class="text-right">
                        {{ __('Asistentes') }}
                      </th>
                    </thead>
                    <tbody>
                      @foreach($datos as $dato)
                        <tr>
                          <td>
                            {{ $dato->usuarios->name }}
                          </td>
                          <td class="td-actions text-right">                          
                              <a rel="tooltip" class="btn btn-danger btn-link" href="{{ route('asistentes.show', $dato) }}" data-original-title="" title="">
                                    <i class="material-icons">picture_as_pdf</i>
                                    <div class="ripple-container"></div>
                                  </a>                        
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection