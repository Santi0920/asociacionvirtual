<?php

namespace App\Http\Controllers;

use App\Models\Asociacion;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AsociacionController extends Controller
{
    public function store(Request $request)
    {
        $currentDate = Carbon::now('America/Bogota')->locale('es')->isoFormat('MMMM D YYYY, h:mm:ss A');
        $currentDate = ucfirst($currentDate);
        // Crear una nueva instancia del modelo y asignar los valore

        $asociacion = new Asociacion([
            'fechaAccion' => $currentDate,
            'vinculado' => $request->vinculado,
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'lnacimiento' => $request->lnacimiento,
            'tidentificacion' => $request->tidentificacion,
            'noidentificacion' => $request->noidentificacion,
            'fechaexpedicion' => $request->mesdiaexpedicion.'/'.$request->diaexpedicion.'/'.$request->anioexpedicion,
            'lexpedicion' => $request->lexpedicion,
            'dcorrespondencia' => $request->dcorrespondencia,
            'ciudcorrespondencia' => $request->ciudcorrespondencia,
            'genero' => $request->genero,
            'ciudad' => $request->ciudad,
            'fnacimiento' => $request->mes.'/'.$request->dia.'/'.$request->anio,
            'dresidencia' => $request->dresidencia,
            'ciudadresidencia' => $request->ciudadresidencia,
            'empresatrabaja' => $request->empresatrabaja,
            'dtrabajo' => $request->dtrabajo,
            'cargo' => $request->cargo,
            'ciudadempresa' => $request->ciudadempresa,
            'tiempocargo' => $request->anios .' años y '. $request->meses . ' meses.',
            'celular1' => $request->code1.' '.$request->celular1,
            'whatsapp1' => $request->code1whatsapp.' '.$request->whatsapp1,
            'celular2' => $request->code2.' '.$request->celular1,
            'whatsapp2' => $request->code2whatsapp.' '.$request->whatsapp2,
            'correo' => $request->correousuario.'@'.$request->correodominio,
            'autoriza' => $request->autoriza,
        ]);


        $asociacion->save();

        $insertedId = $asociacion->getKey();


        $mensaje = "";
        if($request->genero == 'M'){
            $mensaje .= "Señor <span class='fw-bold'>".$request->nombre . " " . $request->apellidos."</span>";
        } else if($request->genero == 'F'){
            $mensaje .= "Señora <span class='fw-bold'>".$request->nombre . " " . $request->apellidos."</span>";
        } else {
            $mensaje .= "Señor(a) ";
        }


        return back()->with("correcto","<span class='fs-4'>".$mensaje." su solicitud ha sido registrada correctamente!<br><span class='text-dark fw-bold'>Fecha:</span> " . $currentDate . "<br><span class='text-dark fw-bold'>Nos escribe:</span> " . $request->ciudad . "<br> <span class='text-dark fw-bold'>Su número de solicitud es:</span> <span class='badge bg-primary fw-bold'>" . $insertedId . "</span>.</span>");
    }

    // public function agencias()
    // {
    //     $agencias = DB::select("SELECT * FROM agencias ORDER BY NameAgencia ASC");

    //     return view('/asociacion', ['agencias' => $agencias]);
    // }

    public function municipios()
    {
        $municipios = DB::select("SELECT * FROM municipios ORDER BY municipio ASC");

        return view('/asociacion', ['municipios' => $municipios]);
    }


    public function datosf2(){



    }
}
