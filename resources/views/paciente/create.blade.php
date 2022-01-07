@extends('adminlte::page')

@section('title', 'CREAR PACIENTE')

@section('content_header')
    <h1>Crear Pacientes</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('paciente.store') }}" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="ci">Ci</label>
                    <input type="text" class="form-control" id="ci" name="ci" placeholder="carnet de identidad" required>
                </div>
                <div class="form-group">
                    <label for="nombres">Nombres </label>
                    <input type="text" class="form-control" id="nombres" name="nombres" placeholder="nombres" required>
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos </label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="apellidos"
                        required>
                </div>
                <div class="form-group">
                    <label for="fechaNacimiento">Fecha de nacimiento </label>
                    <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento"
                        placeholder="Fecha de Nacimiento" required>
                </div>
                <div class="form-group">
                    <label for="sexo">Sexo</label>
                    <select class="form-control" id="sexo" name="sexo">
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                        <option value="O">Otros</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="celular">Celular </label>
                    <input type="number" class="form-control" id="celular" name="celular" placeholder="Numero de celular"
                        required>
                </div>
                <div class="form-group">
                    <select id="nutricionista_id" name="nutricionista_id" class="form-select form-select-sm"
                        aria-label=".form-select-sm example">
                        @foreach ($nutricionistas as $nutricionista)
                            <option value="{{ $nutricionista->id }}">
                                {{ $personas->where('id', $nutricionista->id)->first()->nombres }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <div class="row mb-3">
                        <div class="col">
                            <div class="image-wrapper">
                                <img id="picture" src="https://www.ver.bo/wp-content/uploads/2019/01/4b463f287cd814216b7e7b2e52e82687.png_1805022883.png"
                                    alt="">
                            </div>
                        </div>
                        <div class="col">
                            <label class="file">Foto de Perfil</label>
                            <input class="form-control" type="file" id="image" name="image" accept="image/*">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <a href="{{ route('paciente.index') }}" class="btn btn-danger mb-4">Cancelar</a>
                <button class="btn btn-primary mb-4" type="submit">Guardar</button>
                @csrf
                @method('post')
            </form>
        </div>
    </div>


@stop

@section('css')
    <style>
        .image-wrapper {
            position: relative;
            padding-bottom: 76.25%;
        }

        .image-wrapper img {
            position: absolute;
            object-file: cover;
            width: 80%;
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
        function cambiarImagen(event){
            var file=event.target.files[0];
            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById('picture').setAttribute('src', event.target.result);
            };
            reader.readAsDataURL(file);
        }
    </script>

@stop
