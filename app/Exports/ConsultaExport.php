<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ConsultaExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct( $arrayConsulta )
    {
        $this->arrayConsulta = $arrayConsulta;
    }

    public function view(): View
    {
        return view('excel.consultas', [
            'arrayConsulta' => $this->arrayConsulta
        ]);
    }
}
