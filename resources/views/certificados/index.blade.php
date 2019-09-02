@extends('layouts.app', ['activePage' => 'certificados', 'titlePage' => __('Certificados')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Certificados') }}</h4>
                <p class="card-category"> {{ __('Aquí puedes gestionar tus certificados') }}</p>
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
                
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                          {{ __('nombre') }}
                      </th>
                      <th>
                        {{ __('descripcion') }}
                      </th>
                      <th>
                        {{ __('fecha') }}
                      </th>
                      <th class="text-right">
                        {{ __('Acción') }}
                      </th>
                    </thead>
                    <tbody>
                      @foreach($datos as $dato)
                        <tr>
                          <td>
                            {{ $dato->nombre }}
                          </td>
                          <td>
                            {{ $dato->descripcion }}
                          </td>
                          <td>
                            {{ $dato->fecha }}
                          </td>
                          <td class="td-actions text-right">                          
                            <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('certificados', $dato) }}" data-original-title="" title="">
                              <i class="material-icons">find_in_page</i>
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