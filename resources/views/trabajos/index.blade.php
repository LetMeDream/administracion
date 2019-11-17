@extends('layouts.app')

@section('content')

    <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Trabajos personales</div>

                        <div class="card-body">

                                <table class="table">
                                        <thead>
                                          <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Duración</th>
                                            <th scope="col">Precio</th>
                                            <th scope="col">Total</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($trabajos as $trabajo)
                                            <tr>
                                                <th scope="row">{{$trabajo->id}}</th>
                                                <th>{{$trabajo->name}}</th>
                                                <th>{{$trabajo->duration}}</th>
                                                <th>{{$trabajo->price}}</th>
                                                <th>{{$trabajo->total}}</th>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                      </table>

                        </div>


                    </div>
                    <a href='/trabajos/create' class='btn btn-secondary mt-3'>Registrar nuevo trabajo</a>
                </div>
            </div>
    </div>

@endsection