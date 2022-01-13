<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Suscripcion;
use App\Models\SuscripcionUsuario;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class Suscripcion_usuarioController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');//?

        $this->middleware('can:suscripcion_usuarios.index')->only('index');
        $this->middleware('can:suscripcion_usuarios.create')->only('create', 'store');
        $this->middleware('can:suscripcion_usuarios.edit')->only('edit', 'update');
        $this->middleware('can:suscripcion_usuarios.destroy')->only('destroy');
    }

    public function index()
    {
        $suscripcions = Suscripcion::all();
        $users = User::all();
        // return $users;
        $suscripcionUsuarios = SuscripcionUsuario::all();
        return view('suscripcionUsuario.index', compact('users', 'suscripcionUsuarios', 'suscripcions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personas = DB::table('personas')->where('tipo', 'N')
            ->whereExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('users')
                    ->whereColumn('users.persona_id', 'personas.id');
            })
            ->get();
        // return $personas;
        $suscripcions = Suscripcion::all();
        $personas = Persona::Where('tipo', 'N')->get();
        // $users = DB::table('users')->count(); //para contar una tabla
        return view('suscripcionUsuario.create', compact('suscripcions', 'suscripcions', 'personas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return auth()->user()->id;

        $mes = Suscripcion::Where('id', $request->get('suscripcion_id'))->first();

        $suscripcionUsuario = new SuscripcionUsuario();

        $fecha1 = date("d-m-Y");
        if ($mes->meses == 1) {
            $fecha = date("d-m-Y", strtotime($fecha1 . ' + 1 month'));
        } else if ($mes->meses == 3) {
            $fecha = date("d-m-Y", strtotime($fecha1 . ' + 3 month'));
        } else if ($mes->meses == 6) {
            $fecha = date("d-m-Y", strtotime($fecha1 . ' + 6 month'));
        } else {
            $fecha = date("d-m-Y", strtotime($fecha1 . ' + 12 month'));
        };
        $suscripcionUsuario->fecha_inicio = $fecha1;

        $suscripcionUsuario->fecha_fin = $fecha;
        $suscripcionUsuario->activo = 'En espera';
        $suscripcionUsuario->pagado = false;
        $suscripcionUsuario->suscripcion_id = $request->get('suscripcion_id');
        if ($request->get('persona_id') != null) {
            $user = User::Where('persona_id', $request->get('persona_id'))->first();
            $suscripcionUsuario->user_id = $user->id;
            if ($mes->monto_total == 0) {
                $user->assignRole(2);
                $suscripcionUsuario->activo = 'Activo';
            }
        } else {
            $suscripcionUsuario->user_id = auth()->user()->id;
            if ($mes->monto_total == 0) {
                auth()->user()->id->assignRole(2);
                $suscripcionUsuario->activo = 'Activo';
            }
        }
        $suscripcionUsuario->save();


        return redirect()->route('suscripcionUsuarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SuscripcionUsuario $suscripcionUsuario)
    {
        $suscripcions = Suscripcion::all();
        return view('suscripcionUsuario.edit', compact('suscripcionUsuario', 'suscripcions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuscripcionUsuario $suscripcionUsuario)
    {
        $suscripcionUsuario->fecha_inicio = $request->get('fecha_inicio');
        $suscripcionUsuario->fecha_fin = $request->get('fecha_fin');
        $suscripcionUsuario->activo = $request->get('activo');
        $suscripcionUsuario->pagado = $request->get('pagado');
        $suscripcionUsuario->suscripcion_id = $request->get('suscripcion_id');
        $suscripcionUsuario->save();
        return redirect()->route('suscripcionUsuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuscripcionUsuario $suscripcionUsuario)
    {
        $suscripcionUsuario->delete();
        return redirect()->route('suscripcionUsuarios.index');
    }
}
