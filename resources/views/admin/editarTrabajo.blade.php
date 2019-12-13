@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Trabajo: {{ $trabajo->name }}</div>

                <div class="card-body">

                        <form method="POST" action=' {{ route("editado", [$usuario->id, $trabajo->id]) }} '
                        {{-- action='/usuarios/{{$usuario->id}}/trabajo/{{$trabajo->id}}' --}}>
                            @method('patch')
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del trabajo') }}</label>

                                <div class="col-md-6">
                                    <input autocomplete="off" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $trabajo->name ?? old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label for="duration" class="col-md-4 col-form-label text-md-right">{{ __('Horas de duración') }}</label>

                                    <div class="col-md-6">
                                        <input autocomplete="off" id="duration" type="number" class="form-control @error('duration') is-invalid @enderror" name="duration" value="{{ $trabajo->duration ?? old('duration') }}" required autocomplete="name" autofocus>

                                        @error('duration')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                            </div>
                            <div class="form-group row">
                                    <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Precio por hora') }}</label>

                                    <div class="col-md-6">
                                        <input autocomplete="off" id="price" type="number" class="form-control @error('duration') is-invalid @enderror" name="price" value="{{ $trabajo->price ?? old('duration') }}" required autocomplete="name" autofocus>

                                        @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                            </div>

                            {{-- <input hidden value='{{ $usuario->id }}' name='user_id'> --}}

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-secondary">
                                        {{ __('Actualizar') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                </div>


            </div>

        </div>
    </div>
@endsection