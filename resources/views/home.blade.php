@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (auth()->user()->isAdmin == 1) Bienvenido a su cuenta de <b>Administrador</b>, {{ auth()->user()->name }} @endif
                    @if (auth()->user()->isAdmin != 1) Bienvenido a su cuenta de <b>usuario</b>, {{ auth()->user()->name }} @endif



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
