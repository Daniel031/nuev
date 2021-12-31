@extends('adminlte::page')

@section('title', 'INDEX')

@section('content_header')
    <h1> CREAR RECETA</h1>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <form id="frmReceta" action="{{ route('admin.receta.store') }}" method="POST">

                @csrf

                <div class="form-group">
                    <label for="">Nombre </label>
                    <input type="text" name="nombre" id="nombre" class="form-control"
                        placeholder="Ingrese el nombre del alimento" aria-describedby="helpId"
                        value="{{ old('nombre') }}">
                    @error('nombre')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Preparación </label>

                        <textarea class="form-control" id="preparacion" name="preparacion" rows="10"  placeholder="Preparación de la comida" aria-describedby="helpId" value="{{ old('preparacion') }}"></textarea>
                    @error('preparacion')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Peso(g) </label>
                    <input type="number" size=50 style="width:200px" name="peso" id="peso" min="0" class="form-control"
                        placeholder="Ingrese Peso del alimento" aria-describedby="helpId" value="{{ old('peso') }}">
                    @error('peso')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Porcion</label>
                    <input type="number" size=50 style="width:200px" name="porcion" id="porcion" min="0" value="0" class="form-control"
                        placeholder="Ingrese la porción" aria-describedby="helpId" value="{{ old('porcion') }}">
                    @error('porcion')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                {{-- <a href="javascript:location.reload()" class="btn btn-danger">Añadir Alimento</a> --}}
                {{-- <a onclick="mostrar()" href="" class="btn btn-danger">Mostrar</a> --}}
                {{-- Para colocar en una fila varios input --}}
                <div class="container">
                    <div class="text-center">
                        <strong class="font-semibold ">INGREDIENTES</strong>
                    </div>
                    <div id="jsonDiv">

                    </div>
                    <div class="row justify-content-center py-4">
                        <div class="form-group col-md-3 ">
                            <label>Cantidad(gramos)</label>
                            <input name="cantidad" id="cantidad" type="number" class="form-control"
                                placeholder="cantidad">
                        </div>
                        <div class="form-group col-md-3 ">
                            <label>Alimentos</label>
                            <select name="alimento" id="alimento" class="form-control">
                                @foreach ($alimentos as $alimento)
                                    <option value="{{ $alimento->nombre }}">{{ $alimento->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="intro" style="text-align:center;">
                            <input id="vector[]" name="vector[]" type="hidden" :value="mypropstringify" />
                        </div>
                        <div class="form-group col-md-3">
                            <button id="btnAdd" type="button" class="button is-success"
                                style="height:68px;width: 70px">
                                <i class="fas fa-plus"></i>
                            </button>
                            <button id="btnSave" type="submit" class="btn btn-primary"
                                style="height:68px; width: 90px">Guardar</button>
                            <a onclick="mostrar()" class="btn btn-danger">
                                <i class="fas fa-long-arrow-alt-left"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </form>
            {{-- ALT+SHIFT+TECLA DE ABAJO
                CTRL+D=Selecciona palabras repetidas --}}

            <div id="divElements">
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://kit.fontawesome.com/3dc732140d.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.3/vue.min.js"></script>
    <script type="text/javascript">
        //const $divElements = document.getElementById("divElements");
        // const $divElements = document.getElementById("divElements");

        function removeElement(event, position) {
            event.target.parentElement.remove()
            delete parameters[position]
            //parameters.splice(position,1)

        }

        let parameters = []
        const addJsonElement = json => {
            parameters.push(json)
            return parameters.length - 1
        }

        (function load() {
            //function plus(){
            const $form = document.getElementById("frmReceta");
            const $divElements = document.getElementById("divElements");
            const $btnSave = document.getElementById("btnSave");
            const $btnAdd = document.getElementById("btnAdd");


            const templateElement = (data, position) => {
                return (`
                    <button class="delete" onclick="removeElement(event,${position})"></button>
                    <strong> </strong> ${data}
                `)
            }
            $btnAdd.addEventListener("click", (event) => {
                if ($form.cantidad.value != "" && $form.alimento.value != "") {
                    let index = addJsonElement({
                        cantidad: $form.cantidad.value,
                        alimento: $form.alimento.value
                    })

                    const $div = document.createElement("div")
                    $div.classList.add("notification", "is-link", "is-light", "py-2", "my-1")
                    $div.innerHTML = templateElement(`${$form.cantidad.value} gramos de ${$form.alimento.value}`,index)
                    $divElements.insertBefore($div, $divElements.firstChild)

                } else {
                    alert("Rellene todos los campos");
                }
            })
            //}

            //function save() {
            $btnSave.addEventListener("click", (event) => {


                parameters = parameters.filter(e1 => e1 != null)
                const $jsonDiv = document.getElementById("jsonDiv")
                const $divVector = document.getElementById("vector")
             //   $jsonDiv.innerHTML = `JSON: ${JSON.stringify(parameters)}`
                $divElements.innerHTML = ""
                // parameters = []
                var vue_det = new Vue({
                    el: '#intro',
                    data: {
                        myprop: [{
                                "hola": "chao"
                            },
                            {
                                "pan": "queso"
                            }
                        ]
                    },

                    computed: {
                        mypropstringify() {
                            return JSON.stringify(parameters);
                        }
                    }
                });
                parameters = []
            })
        })()
    </script>
@stop
