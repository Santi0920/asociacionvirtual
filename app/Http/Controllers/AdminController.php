<?php

namespace App\Http\Controllers;

use App\Models\Asociacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    public function getasociaciones(){

        $agenciaU = session('agenciau');

        if($agenciaU == 'Todo'){
            $asociacion = Asociacion::get();
        }else{
            $asociacion = Asociacion::get()->where('ciudad' ,'=',$agenciaU);
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
        $attempts = 0;
        $maxAttempts = 3; // INTENTOS MÁXIMOS
        $retryDelay = 500; // Milisegundos

        do {
            try {
                $response = Http::get($url . 'nombre/' . '1006051717');
                $data = $response->json();

                break;
            } catch (\Exception $e) {
                $attempts++;
                usleep($retryDelay * 1000);
            }
        } while ($attempts < $maxAttempts);





        return view('fase2', ['id' => $id]);
    }


}
