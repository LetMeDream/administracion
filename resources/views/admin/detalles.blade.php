<style>
    .pair{
        position:absolute;
        left:90px;
    }
    .myTh{
        width:18%;
    }
    #myTh1{
        width:10%;
    }
    .editar{
       position:absolute;
       bottom:-20px;
       left:40px;
       font-size:12px;s
    }
</style>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('js/submit.js') }}"></script>

@extends('layouts.app')

@section('content')

    <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">Usuario: {{ $usuario->name}}</div>

                        <div class="card-body">
                            <div class="row">
                                <h5 class='ml-2'>ID:</h5>  <p class='pair'>{{ $usuario->id}}</p>
                            </div>
                            <div class="row">
                                <h5 class='ml-2'>Nombre:</h5>  <p class='pair'>{{ $usuario->name}}</p>
                            </div>
                            <div class="row">
                                <h5 class='ml-2'>Correo:</h5>  <p class='pair'>{{ $usuario->email}}</p>
                            </div>




                        </div>
                        <div class="card-header">Trabajos:</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-2">
                                    <form
                                        action='/usuarios/{{$usuario->id}}/filtro' method='GET'>
                                            @csrf
                                            <label for='month'>Filtrar por</label>
                                            <select name='month' id='mySelect' class='form-control d-inline'>
                                                <option value=''> Elija un mes </option>
                                                @foreach ($meses as $mesKey => $mesValue)


                                                        <option value='{{$mesValue}}'>
                                                             {{$mesKey}}
                                                        </option>


                                                @endforeach
                                            </select>

                                    </form>
                                </div>
                            </div>
                            <table class='table'>
                                <thead>
                                    <tr>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Duración</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Fijar precio</th>
                                    </tr>
                                    @error('price')
                                    <p style='color:red'>ERROR: Debe ingresar un valor en la columna 'precio'</p>
                                    @enderror
                                </thead>
                                <tbody>
                                    @foreach ($trabajos->sortBy('created_at') as $trabajo)
                                        <tr>
                                            <td>{{$trabajo->created_at}}</td>
                                            <td>{{$trabajo->name}}</td>
                                            <td>{{$trabajo->duration}}</td>
                                            <td>
                                                @if ($trabajo->price == null)
                                                    <form action='/setPrice/{{$trabajo->id}}' method='POST'>
                                                        @csrf
                                                        <input name='price' id='price' class='form-control' type='number' class='myInput'>
                                                        {{-- <input type="submit" id="submit-form" hidden /> --}}
                                                    </form>
                                                @else
                                                    {{$trabajo->price}}
                                                @endif
                                            </td>
                                            <td>{{$trabajo->total}}</td>
                                            <td>
                                                @if ($trabajo->price == null)
                                                    <label class='btn btn-secondary myLabel' {{-- for="submit-form" --}} tabindex="0">Fijar precio</label>
                                                @else
                                                <div style='position:relative;'>
                                                    <p> ¡Precio Asignado! </p>
                                                    <a class='editar' href='/usuarios/{{$usuario->id}}/trabajo/{{$trabajo->id}}/edit'> Editar </a>
                                                </div>
                                                @endif

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


@endsection