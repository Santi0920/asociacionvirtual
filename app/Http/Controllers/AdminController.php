<?php

namespace App\Http\Controllers;

use App\Models\Asociacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function getasociaciones(){
        $usuarioActual = Auth::user();
        $agenciaU = $usuarioActual->agenciau;

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
        return view('admin/fase1', ['agencias' => $agencias]);
    }
}
