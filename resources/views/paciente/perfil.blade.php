@extends('adminlte::page')

@section('title', 'EDITAR PACIENTE')

@section('content_header')
    <h1>Perfil Pacientes</h1>
@stop

@section('content')
    <div class="card">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('paciente.update', compact('paciente')) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group col-sm">
                        <label for="ci">Ci</label>
                        <input type="text" class="form-control" id="ci" name="ci" placeholder="carnet de identidad"
                            required value="{{ $persona->ci }}">
                    </div>
                    <div class="form-group col-sm">
                        <label for="nombres">Nombres </label>
                        <input type="text" class="form-control" id="nombres" name="nombres" placeholder="nombres" required
                            value="{{ $persona->nombres }}">
                    </div>
                    <div class="form-group col-sm">
                        <label for="apellidos">Apellidos </label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="apellidos"
                            required value="{{ $persona->apellidos }}">
                    </div>
                    <div class="form-group col-sm">
                        <label for="fechaNacimiento">Fecha de nacimiento </label>
                        <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento"
                            placeholder="Fecha de Nacimiento" required value="{{ $persona->fechaNacimiento }}">
                    </div>
                    <div class="form-group col-sm">
                        <label for="sexo">Sexo</label>
                        <select class="form-control" id="sexo" name="sexo">
                            @switch($persona->sexo )
                                @case("F")
                                    <option value="M">Masculino</option>
                                    <option selected value="F">Femenino</option>
                                    <option value="O">Otros</option>
                                @break
                                @case("M")
                                    <option selected value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                    <option value="O">Otros</option>
                                @break
                                @case("O")
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                    <option selected value="O">Otros</option>
                                @break
                                @default

                            @endswitch

                        </select>
                    </div>
                    <div class="form-group col-sm">
                        <label for="celular">Celular </label>
                        <input type="number" class="form-control" id="celular" name="celular"
                            placeholder="Numero de celular" required value="{{ $persona->celular }}">
                    </div>
                    <div class="form-group col-sm">
                        <select id="nutricionista_id" name="nutricionista_id" class="form-select form-select-sm"
                            aria-label=".form-select-sm example">
                            @foreach ($nutricionistas as $nutricionista)

                                @if ($paciente->nutricionista_id == $nutricionista->id)
                                    <option value="{{ $nutricionista->id }}" selected>
                                        {{ $personas->where('id', $nutricionista->id)->first()->nombres }}</option>
                                @else
                                    <option value="{{ $nutricionista->id }}">
                                        {{ $personas->where('id', $nutricionista->id)->first()->nombres }}</option>
                                @endif


                            @endforeach

                        </select>
                    </div>
            </div>
            <div class="col-md-6">
                <label for="formFile" class="form-label">Foto de Perfil</label>
                @if ($persona->image == null)
                    <div class="form-group">
                        <div class="image-wrapper">
                            <img id="picture"
                                src="https://www.ver.bo/wp-content/uploads/2019/01/4b463f287cd814216b7e7b2e52e82687.png_1805022883.png">
                        </div>
                        <p class="py-1">Sin foto de Perfil</p>
                        <input class="form-control" type="file" id="image" name="image" accept="image/*">
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                @else
                    <div class="form-group px-2">
                        <div class="image-wrapper mb-3">
                            <img id="picture" src="{{ Storage::url($image->url) }}" class="img-responsive img-thumbnail">

                        </div>
                        <input class="form-control" type="file" id="image" name="image" accept="image/*">
                    </div>

                @endif
            </div>
            <div class="col-sm">
                <a href="{{ route('paciente.index') }}" class="btn btn-danger col-md-3">Cancelar</a>
                <button class="btn btn-primary col-md-3" type="submit">Guardar</button>
            </div>
            </form>
        </div>
    </div>
@stop

@section('css')
    <style>
        .image-wrapper {
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wrapper img {
            position: absolute;
            object-file: cover;
            width: 65%;
            height: 100%;
        }

    </style>
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="/css/styles.css">
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#productosPlatos').DataTable({
                "lengthMenu": [
                    [5, 10, 50, -1],
                    [5, 10, 50, "Todo"]
                ]
            });
        });
        //cambiar imagen
        document.getElementById('image').addEventListener('change', cambiarImagen);

        function cambiarImagen(event) {
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById('picture').setAttribute('src', event.target.result);
            };
            reader.readAsDataURL(file);
        }
    </script>
@stop
