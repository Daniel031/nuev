
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
            <th>
                <strong> # </strong>
            </th>
            <th>
                <strong> Paciente </strong>
            </th>
            <th>
                <strong> Consultorio </strong>
            </th>
            <th>
                <strong> Fecha y Hora </strong>
            </th>
            <th>
                <strong> Tiempo </strong>
            </th>
            <th>
                <strong> Motivo </strong>
            </th>
            <th>
                <strong> Espectativa </strong>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $arrayConsulta as $consulta )
            <tr>
                <td>
                    {{ $consulta->id }}
                </td>
                <td>
                    {{ $consulta->nombres . ' ' . $consulta->apellidos }}
                </td>
                <td>
                    {{ $consulta->consultorio }}
                </td>
                <td>
                    {{ $consulta->fecha_hora }}
                </td>
                <td>
                    {{ $consulta->tiempoDeConsulta }}
                </td>
                <td>
                    {{ $consulta->motivoConsulta }}
                </td>
                <td>
                    {{ $consulta->expectativa }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
