<?php

namespace App\Http\Controllers\Johhan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\Models\Johhan\Cuenta;
use App\Models\Johhan\Asiento;
use App\Models\Johhan\DetalleAsiento;

use PDF;
use Alert;

class AsientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asientos_c = Asiento::orderBy('id')->get();
        return view('pages.asientos.index', compact('asientos_c'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $daily = Cuenta::all();
        $CuentaAsiento = Asiento::all();
        return view('pages.asientos.create', compact('daily', 'CuentaAsiento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
        if($request->ajax()){
            Asiento::create($request->all());
            $data = Asiento::latest('id')->first();
            $table = [];
            $uno = '0';
            $dos = '1';
            $tres = '2';
            $cuatro = '4';
            for ($i= 0; $i < 1; $i++) {
                foreach($request->tab as $reg){
                    $table[] = [
                        'id_asiento'  => $data->id,
                        'id_cuenta'  => $reg[$cuatro],
                        'debe'  => $reg[$dos],
                        'haber'  => $reg[$tres],
                    ];
                }
            }
            
            Db::table('detalle_asiento')->insert($table);
            toast('Partida almacenada con éxito','info')->timerProgressBar();
            return response()->json([
                "mensaje" => $request->all()
            ]);
        }

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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pdf_asiento()
    {

        $sql = "
            SELECT 
                det.id_asiento,
                a.fecha_asiento,
                cat.codigo,
                cat.nombre,
                c.nombreCuenta,
                det.debe,
                det.haber,
                a.descripcion,
                0 AS subtotal
            FROM detalle_asiento det
            INNER JOIN asiento AS a ON det.id_asiento = a.id
            INNER JOIN cuenta AS c ON  det.id_cuenta = c.id
            INNER JOIN naturaleza AS cat ON c.id_categoria = cat.id
            ORDER BY det.id_asiento";

        $partida = DB::select($sql);

        $totalDebe = 0;

        foreach ($partida as $key => $value) {
            $subtotal = ($partida[$key]->debe);
            $partida[$key]->subtotal = $subtotal;
            $totalDebe += $subtotal;
           
        }

        $pdf = PDF::loadView('pages.pdfs.index', compact('partida', 'totalDebe'));
        return $pdf->setPaper('a4', 'landscape')->stream('Asiento.pdf');
    }
}
