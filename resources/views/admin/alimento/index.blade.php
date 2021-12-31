@extends('adminlte::page')

@section('title', 'INDEX')

@section('content_header')
    <h1>LISTADO DE ALIMENTOS</h1>
@stop

@section('content')
    <div>
        <a href="{{ route('admin.alimento.create') }}" class="btn btn-secondary">Crear Alimento</a>

        <div class="py-2">
            <table id="alimentos" name="alimentos" class="table table-striped table-bordered shadow-lg mt-3"
                style="width:100%">
                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Grasa (g)</th>
                        <th scope="col">Energía (kcal)</th>
                        <th scope="col">Carbono (g)</th>
                        <th scope="col">Proteína (g)</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <TBODY>

                    @foreach ($alimentos as $alimento)
                        <tr>

                            <td> {{ $alimento->nombre }} </td>
                            @foreach ($alimento->alimentonutrientes as $nutrientes)
                                @if ($nutrientes->nutriente_id < 5)
                                    <td>{{ $nutrientes->cantidad }}</td>
                                @endif
                            @endforeach

                            <td>
                                <form action="{{ route('admin.alimento.destroy', $alimento) }}" method="POST">
                                    <a href="{{ route('admin.alimento.show', $alimento) }}" class="btn btn-dark">Mostrar</a>
                                    <a href="{{ route('admin.alimento.edit', $alimento) }}"
                                        class="btn btn-primary">Editar</a>
                                    @csrf
                                    <!--metodo para añadir token a un formulario-->
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </TBODY>
            </table>
        </div>


        <div class="py-2">
            <a href="{{ route('admin.receta.create') }}" class="btn btn-info py-4">Crear Receta</a>
            <table id="recetas" name="recetas" class="table table-striped table-bordered shadow-lg mt-3" style="width:100%">
                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Grasa (g)</th>
                        <th scope="col">Energía (kcal)</th>
                        <th scope="col">Carbono (g)</th>
                        <th scope="col">Proteína (g)</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <TBODY>

                    @foreach ($recetas as $receta)
                        <tr>
                            <td> {{ $receta->nombre }} </td>
                            @foreach ($receta->recetanutrientes as $nutrientes)
                              @if ($nutrientes->nutriente_id < 5)
                                    <td>{{ $nutrientes->cantidad }}</td>
                                @endif
                            @endforeach
                            <td>
                                <form action="{{ route('admin.receta.destroy', $receta->id) }}" method="POST">
                                    <a href="{{ route('admin.receta.show', $receta->id) }}" class="btn btn-dark">Mostrar</a>
                                    <a href="{{ route('admin.receta.edit', $receta->id) }}"
                                        class="btn btn-primary">Editar</a>
                                    @csrf
                                    <!--metodo para añadir token a un formulario-->
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </TBODY>
            </table>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#alimentos').DataTable({
                "lengthMenu": [
                    [5, 10, 50, -1],
                    [5, 10, 50, "Todo"]
                ]
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#recetas').DataTable({
                "lengthMenu": [
                    [5, 10, 50, -1],
                    [5, 10, 50, "Todo"]
                ]
            });
        });
    </script>
@stop
