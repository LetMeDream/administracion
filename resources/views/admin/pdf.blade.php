
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
        .table{
            margin-top:30px;
            width:100%;
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script type="text/javascript" src="{{ asset('js/submit.js') }}"></script>



        <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-header">Trabajos para usuario: {{ $usuario->name}}</div>
                            <div class="card-body">

                                <table class='table table-bordered'>
                                    <thead>
                                        <tr>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Duración</th>
                                            <th scope="col">Precio</th>
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

                                                    </div>
                                                </th>

                                            </tr>

                                    </tbody>
                                </table>


                            </div>

                        </div>

                    </div>
                </div>
        </div>



</body>
</html>