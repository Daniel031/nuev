<?php

namespace App\Http\Controllers;

use App\Exports\ConsultaExport;
use Illuminate\Http\Request;
use App\Models\Consulta;
use App\Models\Paciente;
use App\Models\Persona;
use App\Models\Consultorio;
use App\Models\ConsultaNutricionista;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        // $this->middleware('auth');//?

        // $this->middleware('can:consulta.index')->only('index');
        // $this->middleware('can:consulta.create')->only('create', 'store');
        // $this->middleware('can:consulta.edit')->only('edit', 'update');
        // $this->middleware('can:consulta.destroy')->only('destroy');
    }

    public function index()
    {
        $consultas = Consulta::all();
        $personas =Persona::all();
        $pacientes = Paciente::all();
        $consultorios =Consultorio::all();

        return view('consulta.index',compact('consultorios','consultas','personas','pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $consultorios =Consultorio::all();
        $pacientes = Paciente::all();
        $personas = Persona::all();
        return view('consulta.create',compact('consultorios','pacientes','personas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {            
        
        $consulta = new Consulta();
        $consulta->confirmada = $request->confirmada;
        $consulta->motivoConsulta = $request->motivoConsulta;
        $consulta->expectativa = $request->expectativa;
        $consulta->paciente_id = $request->paciente_id;
        $consulta->save();

        $consultaNut=new ConsultaNutricionista();
        $consultaNut->fecha_hora = $request->fecha_hora;
        $consultaNut->tiempoDeConsulta= $request->tiempoDeConsulta;
        $consultaNut->consultorio_id = $request->consultorio_id;
        $consultaNut->nutricionista_id = Auth::user()->persona_id;
        $consultaNut->consulta_id=$consulta->id;
        $consultaNut->save();

        return redirect()->route('consulta.index');
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
    public function edit(Consulta $consultum)
    {
        $pacientes = Paciente::all();
        $personas = Persona::all();
        $consulta = $consultum;
        $consultorios = Consultorio::all();
        $consultasNutricionistas=ConsultaNutricionista::all();
        
        return view('consulta.edit',compact('consultorios','pacientes','personas','consulta','consultasNutricionistas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Consulta $consultum)
    {
        $consulta=$consultum;
        $consulta->confirmada = $request->confirmada;
        $consulta->motivoConsulta = $request->motivoConsulta;
        $consulta->expectativa = $request->expectativa;
        $consulta->paciente_id = $request->paciente_id;
        $consulta->save();

        $consultaNut=ConsultaNutricionista::all()->where('consulta_id',$consulta->id)->first();
        $consultaNut->fecha_hora = $request->fecha_hora;
        $consultaNut->tiempoDeConsulta= $request->tiempoDeConsulta;
        $consultaNut->consultorio_id = $request->consultorio_id;
        $consultaNut->nutricionista_id = Auth::user()->persona_id;
        $consultaNut->consulta_id=$consulta->id;
        $consultaNut->save();

        return redirect()->route('consulta.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consulta $consultum)
    {
        $consultum->delete();
        return redirect()->route('consulta.index');
    }

    public function reporte( Request $request ) {

        $consultorios =Consultorio::all();
        $pacientes = Paciente::select( 'pacientes.id', 'pers.id as idpersonas', 'pers.nombres', 'pers.apellidos' )
            ->join( 'personas as pers', 'pacientes.id', '=', 'pers.id' )
            ->get();

        return view('consulta.reporte', [
            'pacientes' => $pacientes,
            'consultorios' => $consultorios,
        ]);
    }

    public function generar( Request $request ) {

        $paciente_id = $request->input( 'paciente_id', null );
        $consultorio_id = $request->input( 'consultorio_id', null );
        $fechaHora_inicio = $request->input( 'fechaHora_inicio', null );
        $fechaHora_final = $request->input( 'fechaHora_final', null );
        $tiempoDeConsultaInicio = $request->input( 'tiempoDeConsultaInicio', null );
        $tiempoDeConsultaFinal = $request->input( 'tiempoDeConsultaFinal', null );

        $import_option = $request->input( 'import_option', null );

        $consulta = [];

        if ( !is_null( $paciente_id ) ) {
            array_push( $consulta, [ 'consultas.paciente_id', '=', $paciente_id ] );
        }

        if ( !is_null( $consultorio_id ) ) {
            array_push( $consulta, [ 'consnutri.consultorio_id', '=', $consultorio_id ] );
        }

        if ( !is_null( $fechaHora_inicio ) && !is_null( $fechaHora_final ) ) {
            if ( is_null( $fechaHora_final ) ) {
                array_push( $consulta, [ 'consnutri.fecha_hora', '>=', $fechaHora_inicio ] );
            } else {
                array_push( $consulta, [ 'consnutri.fecha_hora', '>=', $fechaHora_inicio ] );
                array_push( $consulta, [ 'consnutri.fecha_hora', '<=', $fechaHora_final ] );
            }
        }

        if ( !is_null( $tiempoDeConsultaInicio ) && !is_null( $tiempoDeConsultaFinal ) ) {
            if ( is_null( $tiempoDeConsultaFinal ) ) {
                array_push( $consulta, [ 'consnutri.tiempoDeConsulta', '>=', $tiempoDeConsultaInicio ] );
            } else {
                array_push( $consulta, [ 'consnutri.tiempoDeConsulta', '>=', $tiempoDeConsultaInicio ] );
                array_push( $consulta, [ 'consnutri.tiempoDeConsulta', '<=', $tiempoDeConsultaFinal ] );
            }
        }

        $consultas = new Consulta();

        $arrayConsulta = $consultas
            ->select(
                'consultas.id', 'consultas.motivoConsulta', 'consultas.expectativa',
                'consnutri.fecha_hora', 'consnutri.tiempoDeConsulta',
                'consulrio.nombre as consultorio',
                'pers.nombres', 'pers.apellidos'
            )
            ->join( 'consulta_nutricionistas as consnutri', 'consultas.id', '=', 'consnutri.consulta_id' )
            ->join( 'consultorios as consulrio', 'consnutri.consultorio_id', '=', 'consulrio.id' )
            ->join( 'pacientes as pacien', 'consultas.paciente_id', '=', 'pacien.id' )
            ->join( 'personas as pers', 'pacien.id', '=', 'pers.id' )
            ->where( $consulta )
            ->orderBy( 'consultas.id', 'DESC' )
            ->get();

        if ( $import_option == "PDF" ) {
            $pdf = \PDF::loadview( 'reporte.consultas', compact( 'arrayConsulta' ) );
            return $pdf->download( 'consultas.pdf' );
        }

        return Excel::download(new ConsultaExport( $arrayConsulta ), 'consultas.xlsx');
        

    }

}
