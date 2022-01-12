<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Lista De Tratamiento</title>
</head>
<body>
    <div style="width: 100%; padding: 5px;">
        <table style="width: 100%; border-collapse: collapse;">
            
            <thead>
                <tr>
                    <th colspan="7" style="padding: 10px; text-align: center;">
                        <strong> REPORTE DE TRATAMIENTOS </strong>
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
                        <strong> Fecha Nac. </strong>
                    </th>
                    <th style="padding: 5px; text-align: left; border: 1px solid #e8e8e8;">
                        <strong> Objetivo </strong>
                    </th>
                    <th style="padding: 5px; text-align: left; border: 1px solid #e8e8e8;">
                        <strong> Fecha Inicio </strong>
                    </th>
                    <th style="padding: 5px; text-align: left; border: 1px solid #e8e8e8;">
                        <strong> Fecha Fin </strong>
                    </th>
                    <th style="padding: 5px; text-align: left; border: 1px solid #e8e8e8;">
                        <strong> Costo </strong>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $arrayTratatmiento as $tratamiento )
                    <tr>
                        <td style="padding: 5px; text-align: left; border: 1px solid #e8e8e8;">
                            {{ $tratamiento->id }}
                        </td>
                        <td style="padding: 5px; text-align: left; border: 1px solid #e8e8e8;">
                            {{ $tratamiento->nombres . ' ' . $tratamiento->apellidos }}
                        </td>
                        <td style="padding: 5px; text-align: left; border: 1px solid #e8e8e8;">
                            {{ $tratamiento->fechaNacimiento }}
                        </td>
                        <td style="padding: 5px; text-align: left; border: 1px solid #e8e8e8;">
                            {{ $tratamiento->objetivo }}
                        </td>
                        <td style="padding: 5px; text-align: left; border: 1px solid #e8e8e8;">
                            {{ $tratamiento->fechaInicio }}
                        </td>
                        <td style="padding: 5px; text-align: left; border: 1px solid #e8e8e8;">
                            {{ $tratamiento->fechaFin }}
                        </td>
                        <td style="padding: 5px; text-align: left; border: 1px solid #e8e8e8;">
                            {{ $tratamiento->costo }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>