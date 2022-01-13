<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        // $this->middleware('auth');//?

        // $this->middleware('can:users.index')->only('index');
        // $this->middleware('can:users.create')->only('create', 'store');
        // $this->middleware('can:users.edit')->only('edit', 'update');
        // $this->middleware('can:users.destroy')->only('destroy');
    }
    
    public function index()
    {
        $userNutricionistaid= auth()->user()->id;
        $userNutricionista= User::where('id', $userNutricionistaid)->first();
        $pacientes = Paciente::where('nutricionista_id', $userNutricionista->persona_id)->get();
        // $pacientes=Paciente::all();
        // return $pacientes;
        $users = User::all();
        $personas = Persona::all();
        return view('user.index', compact('users', 'personas', 'userNutricionista', 'pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = Persona::all();

        $roles = Role::all();

        return view('user.create', compact('users', 'roles'));
        // return view('user.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = new User();
        $users->name = $request->get('name');
        $users->email = $request->get('email');
        $users->password = bcrypt($request->get('password'));
        $users->persona_id = $request->get('ci_trab');
        $users->save();
        $users->assignRole($request->rol); //crear rol
        // $users->syncRoles($request->rol);//sincronizar rol
        //    return redirect()->route('users.edit', $users)->with('info', 'Se asignó los roles correctamente');
        // User::create($request->all());

        // activity()->useLog('Usuario')->log('Nuevo')->subject();
        // $lastActivity = Activity::all()->last();
        // $lastActivity->subject_id = User::all()->last()->id;
        // $lastActivity->save();

        return redirect()->route('users.index')->with('info', 'Se creó un nuevo usuario'); //redirige a la vista index de la carpeta cargo

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('user.show', compact('user', 'trabajador'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $users = Persona::all();

        $roles = Role::all();
        return view('user.edit', compact('user', 'users', 'roles'));
        // return view('user.edit', compact('user', 'users'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ci)
    {
        $user = User::find($ci);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        if ($request->password != 'xxxxxxxxx') {
            $user->password = bcrypt($request->get('password'));
        }
        $user->persona_id = null;
        $user->save();
        $user->persona_id = $request->get('ci_trab');
        $user->save();
        $user->syncRoles($request->rol); //sincronizar rol

        // activity()->useLog('Usuario')->log('Editado')->subject();
        // $lastActivity = Activity::all()->last();
        // $lastActivity->subject_id = User::all()->last()->id;
        // $lastActivity->save();

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // activity()->useLog('Usuario')->log('Eliminado')->subject();
        // $lastActivity = Activity::all()->last();
        // $lastActivity->subject_id = User::all()->last()->id;
        // $lastActivity->save();

        $user->delete();


        return redirect()->route('users.index');
    }
}
