@extends('adminlte::page')

@section('title', 'USUARIOS')

@section('content_header')
    <h1>Lista de Usuarios</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    @hasanyrole('administrador')

        <a href="{{ route('users.create') }}" class="btn btn-primary mb-4">CREAR</a>

        <table id="users" class="table table-striped table-bordered shadow-lg mt-3" style="width:100%">
            <thead class="bg-dark text-white">
                <tr>
                    <th scope="col">NOMBRE DE USUARIO</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">PERSONA</th>
                    <th scope="col">ACCIONES</th>
                </tr>
            </thead>
            <TBODY>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @foreach ($personas as $persona)
                                @if ($persona->id == $user->persona_id)
                                    @php($personaId = $persona->nombres . ' ' . $persona->apellidos)
                                @break
                            @else
                                @php($personaId = 'persona no asignada')
                            @endif
                @endforeach{{ $personaId }}
                </td>
                <td>


                    <!---->
                    <form action="{{ route('users.destroy', $user) }}" method="POST">
                        {{-- <a href="{{route('users.edit', $user)}}" class="btn btn-primary">Asignar rol</a> --}}
                        <a href="{{ route('users.edit', $user) }}" class="btn btn-primary">Editar</a>
                        @csrf
                        <!--metodo para añadir token a un formulario-->
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                        {{-- <a href="{{route('users.show', $user)}}" class="btn btn-primary">Mostrar</a> --}}
                    </form>
                </td>
                </tr>
                @endforeach
            </TBODY>
        </table>

    @else


        <a href="{{ route('users.create') }}" class="btn btn-primary mb-4">CREAR</a>
        <h5>Usuario principal</h5>
        <table id="users" class="table table-striped table-bordered shadow-lg mt-3" style="width:100%">
            <thead class="bg-dark text-white">
                <tr>
                    <th scope="col">NOMBRE DE USUARIO</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">PERSONA</th>
                    <th scope="col">ACCIONES</th>
                </tr>
            </thead>
            <TBODY>
                <tr>
                    <td>{{ $userNutricionista->name }}</td>
                    <td>{{ $userNutricionista->email }}</td>
                    <td>
                        @foreach ($personas as $persona)
                            @if ($persona->id == $userNutricionista->persona_id)
                                @php($personaId = $persona->nombres . ' ' . $persona->apellidos)
                                @break
                            @else
                                @php($personaId = 'persona no asignada')
                            @endif 
                            @endforeach{{ $personaId }}
                    </td>
                    <td>
                        <!---->
                        {{-- <form action="{{ route('users.destroy', $userNutricionista) }}" method="POST"> --}}
                            {{-- <a href="{{route('users.edit', $user)}}" class="btn btn-primary">Asignar rol</a> --}}
                            <a href="{{ route('users.edit', $userNutricionista) }}" class="btn btn-primary">Editar</a>
                            {{-- @csrf --}}
                            <!--metodo para añadir token a un formulario-->
                            {{-- @method('delete')
                            <button type="submit" class="btn btn-danger">Eliminar</button> --}}
                            {{-- <a href="{{route('users.show', $user)}}" class="btn btn-primary">Mostrar</a> --}}
                        {{-- </form> --}}
                    </td>
                </tr>
            </TBODY>
        </table>


        <h5>Usuarios paciente</h5>
        <table id="users" class="table table-striped table-bordered shadow-lg mt-3" style="width:100%">
            <thead class="bg-dark text-white">
                <tr>
                    <th scope="col">NOMBRE DE USUARIO</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">PERSONA</th>
                    <th scope="col">ACCIONES</th>
                </tr>
            </thead>
            <TBODY>
                @foreach ($pacientes as $user)
            @isset ($users->where('persona_id',$user->id)->first()->name)
                
                    <tr>
                        <td>{{$users->where('persona_id',$user->id)->first()->name}}</td>
                        <td>{{ $users->where('persona_id',$user->id)->first()->email }}</td>
                        <td>{{ $personas->where('id',$user->id)->first()->nombres }}</td>
                <td>
                    <!---->
                    <form action="{{ route('users.destroy', $users->where('persona_id',$user->id)->first()) }}" method="POST">
                        {{-- <a href="{{route('users.edit', $user)}}" class="btn btn-primary">Asignar rol</a> --}}
                        <a href="{{ route('users.edit', $users->where('persona_id',$user->id)->first()) }}" class="btn btn-primary">Editar</a>
                        @csrf
                        <!--metodo para añadir token a un formulario-->
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                        {{-- <a href="{{route('users.show', $user)}}" class="btn btn-primary">Mostrar</a> --}}
                    </form>
                </td>
                </tr>
                @endisset
                @endforeach
            </TBODY>
        </table>

    @endhasanyrole
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
            $('#users').DataTable({
                "lengthMenu": [
                    [5, 10, 50, -1],
                    [5, 10, 50, "Todo"]
                ]
            });
        });
    </script>
@stop
