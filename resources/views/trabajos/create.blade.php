@extends('layouts.app')

@section('content')


    <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Trabajos</div>

                        <div class="card-body">

                                <form method="POST" action='/trabajos'>
                                    @csrf
                                    {{-- User_id: {{ auth()->user()->id }} --}}
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del trabajo') }}</label>

                                        <div class="col-md-6">
                                            <input autocomplete="off" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                                <input autocomplete="off" id="duration" type="number" class="form-control @error('duration') is-invalid @enderror" name="duration" value="{{ old('duration') }}" required autocomplete="name" autofocus>

                                                @error('duration')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                    </div>

                                    <input hidden value='{{ auth()->user()->id }}' name='user_id'>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-secondary">
                                                {{ __('Registrar') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>

                        </div>


                    </div>

                </div>
            </div>
    </div>


@endsection