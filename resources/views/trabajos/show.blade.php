@extends('layouts.app')

@section('content')


        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            {{ $trabajo->name }} <b><a href='/trabajos/{{$trabajo->id}}/edit' style='float:right'>Editar</a></b>
                        </div>
                        <div class="card-body">
                            <label><b>Id: </b></label> {{$trabajo->id}}<br>
                            <label><b>Fecha de realización: </b></label> {{$trabajo->created_at}}<br>
                            <label><b>Nombre: </b></label> {{$trabajo->name}}<br>
                            <label><b>Duración: </b></label> {{$trabajo->duration}}<br>
                            <label><b>Precio:</b></label>
                                @if ($trabajo->price != null)
                                    {{$trabajo->price}}
                                @endif <br>
                            <label><b>Pago total: </b></label>
                                @if ($trabajo->total != null)
                                    {{$trabajo->total}}
                                @endif
                            <br>
                        </div>


                        @if(Session('edit'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ Session('edit') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    <form method='post' action='/trabajos/{{$trabajo->id}}'>
                        @csrf
                        @method('delete')
                        <button class='btn btn-danger mt-2' href='#'>
                            Eliminar
                        </button>
                    </form>

                </div>
            </div>
        </div>


@endsection
