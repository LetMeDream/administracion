
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <style>
        .pair{
            position:absolute;
            left:100px;
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
        .table, .tableTitle{
            margin-top:30px;
            width:100%;
        }
        .thidBody{
            position:relative !important;
            margin-top:40px !important;
        }
        .tiny{
            font-size: 10px;
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script type="text/javascript" src="{{ asset('js/submit.js') }}"></script>



        <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-12">



                            <div class=" thisBody">
                                {{-- <div class="row">
                                    <h5 class='ml-2'>ID:</h5>  <p class='pair'>{{ $usuario->id}}</p>
                                </div> --}}
                                <div class="row">
                                    <h5 class='ml-2'>&nbsp;Nombre:</h5>  <p class='pair'>{{ $usuario->name}}</p>
                                </div>
                                <div class="row">
                                    <h5 class='ml-2'>&nbsp;Correo:</h5>  <p class='pair'>{{ $usuario->email}}</p>
                                </div>




                            </div>

                           {{--  <div class="card-header">Trabajos para usuario: {{ $usuario->name}}</div> --}}


                                <table class='table '>
                                    <thead class='table-dark'>
                                        <tr>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Duración<br> <span class='tiny'>(horas)</span></th>
                                            <th scope="col">Precio<br> <span class='tiny'>($/hora)</span></th>
                                            <th scope="col">Total</th>
                                            {{-- <th scope="col">Fijar precio</th> --}}
                                        </tr>

                                    </thead>
                                    <tbody>
                                        @foreach ($trabajos->sortBy('created_at') as $trabajo)
                                            <tr>
                                                <td>{{$trabajo->created_at}}</td>
                                                <td>{{$trabajo->name}}</td>
                                                <td>{{$trabajo->duration}}</td>
                                                <td class='valores'>
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
                                                <td>
                                                    <div class='sumandos' valor='{{$trabajo->total}}'>
                                                        {{$trabajo->total}}
                                                    </div></td>

                                            </tr>

                                        @endforeach

                                            <tr>
                                                <th>
                                                    <p>
                                                        <b>Resultado Total</b>
                                                    </p>
                                                </th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th>
                                                    <div class='sumTotal'>
                                                        {{ $total }}
                                                    </div>
                                                </th>

                                            </tr>

                                    </tbody>
                                </table>






                    </div>
                </div>
        </div>



</body>
</html>