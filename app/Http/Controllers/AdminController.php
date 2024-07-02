<?php

namespace App\Http\Controllers;

use App\Models\Agencia;
use App\Models\Asociacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function getasociaciones(){

        $agenciaU = session('agenciau');

        if($agenciaU == 'Todo'){
            $asociacion = Asociacion::get();
        }else{
            $asociacion = Asociacion::get()->where('agenciaasociacion' ,'=',$agenciaU);
        }

        return datatables()->of($asociacion)->toJson();
    }

    public function getdata($id) {
        $data = Asociacion::find($id);

        return response()->json($data);
    }

    public function agencias()
    {
        $agencias = DB::select("SELECT * FROM agencias ORDER BY NameAgencia ASC");
        $municipios = DB::select("SELECT * FROM municipios ORDER BY municipio ASC");
        return view('admin/fase1', ['agencias' => $agencias, 'municipios' => $municipios]);
    }

    public function validarafase2(Request $request){
        $id = $request->id;

        //url api
        $url = "http://srv-owncloud.coopserp.com/conexion_s400/api/";
        $url2 = "http://srv-owncloud.coopserp.com/menu-datacredito/api/";
        $attempts = 0;
        $maxAttempts = 3; // INTENTOS MÁXIMOS
        $retryDelay = 500; // Milisegundos

        do {
            try {
                $response = Http::get($url . 'nombre/' . '1007864285');
                $data = $response->json();

                $response2 = Http::get($url2 . 'persona/' . '1007864285');
                $data2 = $response2->json();

                break;
            } catch (\Exception $e) {
                $attempts++;
                usleep($retryDelay * 1000);
            }
        } while ($attempts < $maxAttempts);
        $status = $data['status'];
        if($status == 422){
            return back()->with('incorrecto', 'El asociado con CC.'.' 10061717'.'. No existe en el AS400!');
        }

        $status2 = $data2['status'];
        if($status2 == 422){
            return back()->with('incorrecto', 'El asociado con CC.'.' 10061717'.'. No existe en Datacrédito!');
        }

        $cuenta = $data['asociado']['CUENTA'];
        //si la agencia entra ya no tendra la opcion para vinculacion de agencia
        $asociacion = Asociacion::where('ID', $id)->first();
        if(session('agenciau') !== 'Todo'){
            $agencia = $asociacion->agenciaasociacion;
            $agenciabd = Agencia::where('NameAgencia', $agencia)->first();
            $noAgencia = $agenciabd->NumAgencia;
        }else{
            $agencia = $request->agencia;
            $agenciabd = Agencia::where('NameAgencia', $agencia)->first();
            $noAgencia = $agenciabd->NumAgencia;
        }
        //ACTUALIZACION DEL MODAL COMPLETO F1
        DB::table('asociacion')
        ->where('ID', $id)
        ->update([
            'vinculado' => $request->vinculado,
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'lnacimiento' => $request->lnacimiento,
            'tidentificacion' => $request->tidentificacion,
            'noidentificacion' => $request->noidentificacion,
            'fechaexpedicion' => $request->mesdiaexpedicion . '/' . $request->diaexpedicion . '/' . $request->anioexpedicion,
            'lexpedicion' => $request->lexpedicion,
            'dcorrespondencia' => $request->dcorrespondencia,
            'ciudcorrespondencia' => $request->ciudcorrespondencia,
            'genero' => $request->genero,
            'ciudad' => $request->ciudad,
            'fnacimiento' => $request->mes . '/' . $request->dia . '/' . $request->anio,
            'dresidencia' => $request->dresidencia,
            'ciudadresidencia' => $request->ciudadresidencia,
            'empresatrabaja' => $request->empresatrabaja,
            'dtrabajo' => $request->dtrabajo,
            'cargo' => $request->cargo,
            'ciudadempresa' => $request->ciudadempresa,
            'tiempocargo' => $request->tiempocargo,
            'celular1' => $request->code1 . ' ' . $request->celular1,
            'whatsapp1' => $request->code1whatsapp . ' ' . $request->whatsapp1,
            'celular2' => $request->code2 . ' ' . $request->celular2,
            'whatsapp2' => $request->code2whatsapp . ' ' . $request->whatsapp2,
            'correo' => $request->correo,
            'autoriza' => $request->autoriza,
            'agenciaasociacion' => $agencia
        ]);

        $nombre = $asociacion->nombre.' '.$asociacion->apellido;
        $fechavinculacion = $asociacion->fechaAccion;
        $ciudadescribe = $request->ciudad;
        $cedula = $asociacion->noidentificacion;
        $score = $data2['persona']['Score'];
        if($score === 'S/E'){
            $score = '<span class="badge badge-pill bg-warning text-dark fw-bold">'.$score.'</span>';
        }else if($score >= 650){
            $score = '<span class="badge badge-pill bg-success text-light fw-bold">'.$score.'</span>';
        }else{
            $score = '<span class="badge badge-pill bg-danger text-light fw-bold">'.$score.'</span>';
        }
        $fechaInsercion = $data2['documentos']['documentosintesis']['FechaInsercion'];
        $fechaDatacredito = Carbon::parse($fechaInsercion);
        $fechaActual = Carbon::now();
        $diferenciaDias = $fechaActual->diffInDays($fechaDatacredito);
        if($fechaInsercion == null){
            $estadoDatacredito = '<span class="fs-2">⚪⚪⚪</span>';
        }
        else if ($diferenciaDias > 179) {
            $estadoDatacredito = '<span class="fs-2">⚪⚪🔴</span>';
        } elseif ($diferenciaDias > 169) {
            $estadoDatacredito = '<span class="fs-2">⚪🟡⚪</span>';
        } else {
            $estadoDatacredito = '<span class="fs-2">🟢⚪⚪</span>';
        }
        $nombreAS = $data['asociado']['NOMBRES'];
        $codNomina = $data['asociado']['NOMINA'];
        $nomNomina = $data['asociado']['NOMNOMINA'];
        $salario = $data['asociado']['SALARIO'];
        $salarioFormateado = number_format($salario, 0, '.', ',');
        $asesor = session('name');



        //pasar datos a la vista
        $viewData = [
            'id' => $id,
            'cuenta' => $cuenta,
            'ciudadescribe' => $ciudadescribe,
            'fechavinculacion' => $fechavinculacion,
            'agencia' => $agencia,
            'noAgencia' => $noAgencia,
            'nombre' => $nombre,
            'nombreAS' => $nombreAS,
            'cedula' => $cedula,
            'score' => $score,
            'estadoDatacredito' => $estadoDatacredito,
            'codNomina' => $codNomina,
            'nomNomina' => $nomNomina,
            'salario' => $salarioFormateado,
            'asesor' => $asesor,
        ];


        // DB::table('asociacion2')->insert([

        // ]);


        return view('fase2', $viewData);
    }


}
