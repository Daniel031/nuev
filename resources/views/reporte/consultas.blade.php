<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Consultas </title>
</head>
<body>
    <div style="width: 100%; padding: 5px;">
        <table style="width: 100%; border-collapse: collapse;">
            
            <thead>
                <tr>
                    <th colspan="7" style="padding: 10px; text-align: center;">
                        <strong> REPORTE DE CONSULTAS </strong>
                    </th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th style="padding: 5px; text-align: left; border: 1px solid #e8e8e8;">
                        <strong> # </strong>
                    </th>
                    <th style="padding: 5px; text-align: left; border: 1px solid #e8e8e8;">
                        <strong> Paciente </strong>
                    </th>
                    <th style="padding: 5px; text-align: left; border: 1px solid #e8e8e8;">
                        <strong> Consultorio </strong>
                    </th>
                    <th style="padding: 5px; text-align: left; border: 1px solid #e8e8e8;">
                        <strong> Fecha y Hora </strong>
                    </th>
                    <th style="padding: 5px; text-align: left; border: 1px solid #e8e8e8;">
                        <strong> Tiempo </strong>
                    </th>
                    <th style="padding: 5px; text-align: left; border: 1px solid #e8e8e8;">
                        <strong> Motivo </strong>
                    </th>
                    <th style="padding: 5px; text-align: left; border: 1px solid #e8e8e8;">
                        <strong> Espectativa </strong>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $arrayConsulta as $consulta )
                    <tr>
                        <td style="padding: 5px; text-align: left; border: 1px solid #e8e8e8;">
                            {{ $consulta->id }}
                        </td>
                        <td style="padding: 5px; text-align: left; border: 1px solid #e8e8e8;">
                            {{ $consulta->nombres . ' ' . $consulta->apellidos }}
                        </td>
                        <td style="padding: 5px; text-align: left; border: 1px solid #e8e8e8;">
                            {{ $consulta->consultorio }}
                        </td>
                        <td style="padding: 5px; text-align: left; border: 1px solid #e8e8e8;">
                            {{ $consulta->fecha_hora }}
                        </td>
                        <td style="padding: 5px; text-align: left; border: 1px solid #e8e8e8;">
                            {{ $consulta->tiempoDeConsulta }}
                        </td>
                        <td style="padding: 5px; text-align: left; border: 1px solid #e8e8e8;">
                            {{ $consulta->motivoConsulta }}
                        </td>
                        <td style="padding: 5px; text-align: left; border: 1px solid #e8e8e8;">
                            {{ $consulta->expectativa }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>