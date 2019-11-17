@extends('layouts.app')

@section('content')

    <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">Usuarios</div>

                        <div class="card-body">

                                <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Email</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                            <tr>
                                                <th scope="row">{{$user->id}}</th>
                                                <th>
                                                    <a href='usuarios/{{$user->id}}'>{{$user->name}}</a>
                                                </th>
                                                <th>{{$user->email}}</th>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                        </div>


                    </div>

                </div>
            </div>
    </div>


@endsection