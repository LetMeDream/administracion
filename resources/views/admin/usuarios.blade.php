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
                                                <td scope="row">{{$user->id}}</td>
                                                <td>
                                                    <a href='usuarios/{{$user->id}}'>{{$user->name}}</a>
                                                </td>
                                                <td>{{$user->email}}

                                                    <div class="float-right">
                                                        <form action='{{ route("admin.delete", $user->id) }}' method='POST'>
                                                            @method('delete')
                                                            @csrf
                                                            <button onclick='confirm("¿Está seguro de eliminar el usuario?")' type='submit' class='btn btn-outline-danger'>Eliminar</button>
                                                        </form>

                                                    </div>

                                                </td>



                                            </tr>
                                            @endforeach
                                        </tbody>
                                </table>

                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ session('success') }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                @endif

                        </div>


                    </div>

                </div>
            </div>
    </div>


@endsection