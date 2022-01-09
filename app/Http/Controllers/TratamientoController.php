<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tratamiento;
use App\Models\Paciente;
use App\Models\Persona;

class TratamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tratamientos= Tratamiento::all();
        $personas= Persona::where('tipo', 'P')->get();
        return view('tratamiento.index', compact('tratamientos', 'personas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personas = Persona::where('tipo', 'P')->get();
        // return $personas;
        return view('tratamiento.create', compact('personas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tratamiento = new Tratamiento();
        $tratamiento->objetivo=$request->objetivo;
        $tratamiento->fechaInicio=$request->fechaInicio;
        $tratamiento->fechaFin=$request->fechaFin;
        $tratamiento->costo=$request->costo;
        $tratamiento->completo=false;
        $tratamiento->paciente_id=$request->paciente_id;
        $tratamiento->save();
        
        return redirect()->route('tratamientos.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $persona=Persona::where('id',$id)->first();
        $paciente=Paciente::where('id',$id)->first();
        $tratamientos=Tratamiento::where('paciente_id',$id)->get();
        return view('tratamiento.show',compact('tratamientos', 'persona', 'paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(tratamiento $tratamiento)
    {
        $personas = Persona::where('tipo', 'P')->get();
        return view('tratamiento.edit',compact('personas','tratamiento'));
        //return $paciente->persona->fechaNacimiento;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,tratamiento $tratamiento)
    {
        $tratamiento->objetivo = $request->get('objetivo');
        $tratamiento->fechaInicio = $request->get('fechaInicio');
        $tratamiento->fechaFin= $request->get('fechaFin');
        $tratamiento->costo = $request->get('costo');
        $tratamiento->paciente_id = $request->get('paciente_id');
        $tratamiento->completo = $request->get('completo');
        $tratamiento->save();
        return redirect()->route('tratamientos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(tratamiento $tratamiento)
    {
        $tratamiento->delete();

        return redirect()->route('tratamientos.index');
    }

    public function generar( Request $request )
    {
        $fechainicio = $request->input( 'fechainicio', null );
        $fechafinal = $request->input( 'fechafinal', null );

        $paciente = $request->input( 'paciente', null );

        $consulta = [];

        if ( !is_null( $fechainicio ) && !is_null( $fechafinal ) ) {
            if ( is_null( $fechafinal ) ) {
                array_push( $consulta, [ 'tratamientos.fechaInicio', '>=', $fechainicio ] );
            } else {
                array_push( $consulta, [ 'tratamientos.fechaInicio', '>=', $fechafinal ] );
                array_push( $consulta, [ 'tratamientos.fechaFin', '<=', $fechafinal ] );
            }
        }

        if ( !is_null( $paciente ) ) {
            array_push( $consulta, [ 'tratamientos.paciente_id', '=', $paciente ] );
        }

        $tratento = new Tratamiento();

        $arrayTratatmiento = $tratento
            ->select( 
                'tratamientos.id', 'tratamientos.objetivo', 'tratamientos.fechaInicio',
                'tratamientos.fechaFin', 'tratamientos.costo',
                'pers.nombres', 'pers.apellidos', 'pers.fechaNacimiento', 'pers.sexo'
            )
            ->join( 'pacientes as pacte', 'tratamientos.paciente_id', '=', 'pacte.id' )
            ->join( 'personas as pers', 'pacte.id', '=', 'pers.id' )
            ->where( $consulta )
            ->orderBy( 'tratamientos.id', 'DESC' )
            ->get();

        $pdf = \PDF::loadview( 'reporte.tratamiento', compact( 'arrayTratatmiento' ) );
        return $pdf->download( 'tratamiento.pdf' );

    }

}
