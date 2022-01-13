<?php

namespace App\Http\Controllers;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Nutricionista;
use App\Models\Paciente;
use App\Models\Persona;
use App\Models\SuscripcionUsuario;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class NutricionistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        // $this->middleware('auth');//?
        $this->middleware('can:nutricionistas.index')->only('index');
        // $this->middleware('can:nutricionistas.create')->only('create', 'store');
        $this->middleware('can:nutricionistas.edit')->only('edit', 'update');
        $this->middleware('can:nutricionistas.destroy')->only('destroy');
    }
    public function index()
    {
        $userNutricionistaid= auth()->user()->id;
        $userNutricionista= User::where('id', $userNutricionistaid)->first();
        
        $nutricionistas = Nutricionista::all();
        $personas = Persona::all();
        return view('nutricionista.index',compact('nutricionistas','personas', 'userNutricionista'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $user2= auth()->user()->id;
$user=User::where('id', $user2)->first();
// return $user;
        if($user->hasAnyRole('nutricionista', 'administrador')){//tiene rol nutricionista
            
        }else{
            $user->assignRole(3);
        }
        
        // $personas = Persona::all();
        return view('nutricionista.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $persona = new Persona();
        $persona->ci = $request->get('ci');
        $persona->nombres = $request->get('nombres');
        $persona->apellidos= $request->get('apellidos');
        $persona->fechaNacimiento = $request->get('fechaNacimiento');
        $persona->sexo = $request->get('sexo');
        $persona->celular = $request->get('celular');
        $persona->tipo = 'N';
        $persona->save();

        $paciente = new Nutricionista();
        $paciente->id=$persona->id;
        $paciente->profesion = $request->get('profesion');

        $paciente->save();

        $user= auth()->user();
        if($user->hasAnyRole('nuevo')){//tiene rol nutricionista
            $user->persona_id=$persona->id;
            $user->save();
            $suscripcionUsuario = new SuscripcionUsuario();
            $suscripcionUsuario->suscripcion_id = '1';
            $fecha1 = date("d-m-Y");
            $suscripcionUsuario->fecha_inicio = $fecha1;
            $fecha = date("d-m-Y", strtotime($fecha1 . ' + 1 month'));
            $suscripcionUsuario->fecha_fin = $fecha;
            $suscripcionUsuario->activo = 'Activo';
            $suscripcionUsuario->pagado = false;
            $suscripcionUsuario->user_id = $user->id;
            $suscripcionUsuario->save();
            // $user->assignRole(2);
            $user->syncRoles(2);
        }
        return redirect()->route('nutricionistas.index');
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
    public function edit(Nutricionista $nutricionista)
    {
        $personas = Persona::all();
        return view('nutricionista.edit',compact('nutricionista','personas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Nutricionista $nutricionista)
    {
        $persona = Persona::all()->where('id',$nutricionista->id)->first();
        $persona->ci = $request->get('ci');
        $persona->nombres = $request->get('nombres');
        $persona->apellidos= $request->get('apellidos');
        $persona->fechaNacimiento = $request->get('fechaNacimiento');
        $persona->sexo = $request->get('sexo');
        $persona->celular = $request->get('celular');
        $persona->save();

        $nutricionista->id=$persona->id;
        $nutricionista->profesion = $request->get('profesion');

        $nutricionista->save();
        return redirect()->route('nutricionistas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nutricionista $nutricionista)
    {
        $persona = Persona::all()->where('id',$nutricionista->id)->first();
        $nutricionista->delete();
        $persona->delete();

        return redirect()->route('nutricionistas.index');
    }
}
