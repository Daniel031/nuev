<?php

namespace App\Http\Controllers;

use App\Http\Requests\PacienteRequest;
use App\Models\Images;
use App\Models\Nutricionista;
use App\Models\Paciente;
use App\Models\Persona;
use App\Models\Tratamiento;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // $this->middleware('auth');//?

        // $this->middleware('can:paciente.index')->only('index');
        // $this->middleware('can:paciente.create')->only('create', 'store');
        // $this->middleware('can:paciente.edit')->only('edit', 'update');
        // $this->middleware('can:paciente.destroy')->only('destroy');
    }
    // public function PDF(){
      //  $pdf=\PDF::loadView('paciente');
        //return $pdf->download('paciente.pdf');
    //}
    public function impriPDF(){
        //dd("hola");
        $pacientes = Paciente::all();
        $pdf=\PDF::loadview('reporte.paciente',compact('pacientes'));
        return $pdf ->download('paciente.pdf');

    }
    // public function UserExport()
    // {

    // return Excel::download(new UserExport,'paciente-xlsx');

    // }

    public function index()
    {
        $pacientes = Paciente::all();
        $personas = Persona::all();
        $images=Images::all();
        return view('paciente.index', compact('pacientes', 'images', 'personas'));
        //return $pacientes->last()->persona->image;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $nutricionistas = Nutricionista::all();
        $personas = Persona::all();
        return view('paciente.create', compact('nutricionistas', 'personas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $persona = Persona::create($request->all());
        if ($request->hasFile('image')) {
            $url = Storage::put('perfil',$request->file('image'));//Storage::put('perfil', $request->file('image'));
            $persona->image()->create([
                'url' => $url,
                'imageable_id' => $persona->id,
                'imageable_type' => Persona::class,
            ]);
        }
        $paciente = Paciente::create(['id' => $persona->id, 'nutricionista_id' => (int) $request->nutricionista_id]);
        return redirect()->route('paciente.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente)
    {
        $tratamientos = Tratamiento::where('paciente_id', $paciente->id);
        $image=Images::all();
        return view('paciente.show', compact('tratamientos', 'paciente', 'image'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente)
    {
        $nutricionistas = Nutricionista::all();
        $personas = Persona::all();
        $persona=$personas->find($paciente->id);
        $image=$persona->image;
        return view('paciente.perfil', compact('paciente', 'persona','personas', 'image','nutricionistas'));
       // return view('paciente.imagen',compact('image'));
        //return $paciente->persona->fechaNacimiento;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PacienteRequest $request, Paciente $paciente)
    {
        $persona = Persona::all()->find($paciente->id);
        $persona->update($request->all());

        if ($request->hasfile('image')) {
            if ($persona->image != null) {
                //Storage::disk($request->image)->delete($persona->image->url);//('image')->delete($persona->image->url);
                Storage::delete($persona->image->url);
                $persona->image->delete();
            }
            $url=Storage::put('perfil',$request->file('image'));
            $persona->image()->create([
                'url'=>$url,
                'imageable_id'=>$persona->id,
                'imageable_type'=>Persona::class
            ]);

        }
        /*$paciente->id = $persona->id;

        $paciente->nutricionista_id = $request->nutricionista_id;

        $paciente->save();*/
       // return $persona->image;
        return redirect()->route('paciente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
        $persona = Persona::all()->where('id', $paciente->id)->first();
        $paciente->delete();
        $persona->delete();

        return redirect()->route('paciente.index');

    }
}
