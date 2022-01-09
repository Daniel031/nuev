
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .table {
            border: 1px solid gray;
            border-collapse: collapse;
        }
        .table th,
        .table td {
            border: 1px solid grey;
            padding: 4px;
            padding-top: 9px;
            padding-bottom: 5px;
        }
    </style>
</head>
<body>
    <table id="pacientes" class="table table-striped table-bordered shadow-lg mt-3" style="width:100%">
        <thead>
            <tr>
                <th colspan="4" style="text-align: center; font-weight: bold; font-size: 25px">
                    REPORTE DE PACIENTES
                </th>
            </tr>
        </thead>
        <thead class="bg-dark text-white">

            <tr>
                <th scope="col">CI</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">APELLIDOS</th>
                <th scope="col">CELULAR</th>
                

            </tr>
        </thead>
        <TBODY>
            @foreach ($pacientes as $paciente)
                <tr>

                    <td>{{ $pacientes->where('id', $paciente->id)->first()->ci }}</td>
                    <td>{{ $pacientes->where('id', $paciente->id)->first()->nombres }}</td>
                    <td>{{ $pacientes->where('id', $paciente->id)->first()->apellidos }}</td>
                    <td>{{ $pacientes->where('id', $paciente->id)->first()->celular }}</td>

                    <td>


                        {{-- <form action="{{ route('paciente.destroy', compact('paciente')) }}" method="POST"> --}}
                            <form action="{{url('/paciente/'.$paciente->id)}}" method="post" >
                        </form>
                    </td>
                </tr>


            @endforeach
        </TBODY>
    </table>