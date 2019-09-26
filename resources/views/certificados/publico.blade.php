@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'login', 'title' => __('Material Dashboard')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row align-items-center">
    <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
      <form class="form" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="card card-login card-hidden mb-3">
          <div class="card-header card-header-primary text-center">
            <h4 class="card-title"><strong>{{ __('Validar certificado') }}</strong></h4>

          </div>
          <div class="card-body">
            <p class="card-description text-center">{{ __('Digite el código de referencia. ') }}</p>
            <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">email</i>
                  </span>
                </div>
                <input type="number" name="referencia" class="form-control" placeholder="{{ __('Referencia...') }}" value="{{ old('referencia') }}" required>
              </div>
              @if ($errors->has('referencia'))
                <div id="referencia-error" class="error text-danger pl-3" for="referencia" style="display: block;">
                  <strong>{{ $errors->first('referencia') }}</strong>
                </div>
              @endif
            </div>
          </div>
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-primary btn-link btn-lg">{{ __('Buscar') }}</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
