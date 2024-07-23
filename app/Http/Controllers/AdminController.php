<?php

namespace App\Http\Controllers;

use App\Models\Agencia;
use App\Models\Asociacion;
use App\Models\Firmas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    //FASE #1
    public function getasociaciones(){

        $agenciaU = session('agenciau');

        if($agenciaU == 'Gerencia General' || $agenciaU == 'Todo' || $agenciaU == 'Coordinacion 4'){
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
                $response = Http::get($url . 'nombre/' . $request->noidentificacion);
                $data = $response->json();

                $response2 = Http::get($url2 . 'persona/' . $request->noidentificacion);
                $data2 = $response2->json();

                break;
            } catch (\Exception $e) {
                $attempts++;
                usleep($retryDelay * 1000);
            }
        } while ($attempts < $maxAttempts);



        if(session('rol') == 'Consultante'){
            $status = $data['status'];
            if($status == 422){
                return back()->with('incorrecto', 'El asociado con CC.'.$request->noidentificacion.'. No existe en el AS400!');
            }

            $status2 = $data2['status'];
            if($status2 == 422){
                return back()->with('incorrecto', 'El asociado con CC.'.$request->noidentificacion.'. No existe en Datacrédito!');
            }
            //si la agencia entra ya no tendra la opcion para vinculacion de agencia
            $asociacion = Asociacion::where('ID', $id)->first();
            if(session('agenciau') == 'Gerencia General' || session('agenciau') == 'Todo' || session('agenciau') == 'Coordinacion 4'){
                $agencia = $request->agencia;
                $agenciabd = Agencia::where('NameAgencia', $agencia)->first();
                $noAgencia = $agenciabd->NumAgencia;

            }else{
                $agencia = $asociacion->agenciaasociacion;
                $agenciabd = Agencia::where('NameAgencia', $agencia)->first();
                $noAgencia = $agenciabd->NumAgencia;
            }

            $cuenta = $data['asociado']['CUENTA'];
            $nombre = $asociacion->nombre.' '.$asociacion->apellido;
            $fechavinculacion = $asociacion->fechaAccion;
            $ciudadescribe = $request->ciudad;
            $cedula = $asociacion->noidentificacion;
            $cedula = number_format($cedula, 0, ',', '.');
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
            $celular = $data['asociado']['CELULAR'];
            $correo = $data['asociado']['CORREO'];
            $whatsapp = $data['asociado']['WHATSAPP'];
            $salarioFormateado = number_format($salario, 0, '.', ',');
            $asesor = session('name');
            $score2 = $data2['persona']['Score'];

            $asociaciondos = DB::select('SELECT * FROM asociacion2 WHERE ID_F1 = ?', [$id]);

            if(empty($asociaciondos)){
                //insercion fase 2
                DB::table('asociacion2')->insert([
                    'celular' => $celular,
                    'whatsapp' => $whatsapp,
                    'correo' => $correo,
                    'score' => $score2,
                    'nomina' => $codNomina . ' - ' . $nomNomina,
                    'salario' => $salario,
                    'nombreasesor' => $asesor,
                    'ID_F1' => $id,
                ]);

            }

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
                    'celular' => $celular,
                    'correo' => $correo,
                    'whatsapp' => $whatsapp
                ];

                //ACTUALIZACION DEL MODAL COMPLETO F1
                $actualizacion = DB::table('asociacion')
                ->where('ID', $id)
                ->update([
                    'tipoavirtual' => $request->tipoavirtual,
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
                    'agenciaasociacion' => $agencia,
                    'fase2' => 1
                ]);

                if($request->autoriza == 'SI'){
                    $attempts = 0;
                    $maxAttempts = 3; // Intentos máximos
                    $retryDelay = 500; // Milisegundos
                    $url = 'http://srv-owncloud.coopserp.com/menu-datacredito/api/crear';

                    do {
                        try {
                            $response = Http::post($url, [
                                'Cedula' => $request->noidentificacion,
                                'Nombre' => $request->nombre,
                                'Apellidos' => $request->apellidos,
                                'CuentaAsociada' => 'N/A',
                                'Agencia' => $agencia,
                            ]);

                            $data = $response->json();
                            break;
                        } catch (\Exception $e) {
                            $attempts++;
                            usleep($retryDelay * 1000);
                        }
                    } while ($attempts < $maxAttempts);
                }else{
                    return back()->with('incorrecto', 'Recuerde que la persona debe aceptar la consulta en centrales de riesgo. Cambiar el estado a SI (preguntarle previamente) para continuar con la Fase #2.');
                }

                return view('fase2', $viewData);

        }

        //si la agencia entra ya no tendra la opcion para vinculacion de agencia
        $asociacion = Asociacion::where('ID', $id)->first();
        if(session('agenciau') == 'Gerencia General' || session('agenciau') == 'Todo' || session('agenciau') == 'Coordinacion 4'){
            $agencia = $request->agencia;
            $agenciabd = Agencia::where('NameAgencia', $agencia)->first();
            $noAgencia = $agenciabd->NumAgencia;

        }else{
            $agencia = $asociacion->agenciaasociacion;
            $agenciabd = Agencia::where('NameAgencia', $agencia)->first();
            $noAgencia = $agenciabd->NumAgencia;
        }





        //ACTUALIZACION DEL MODAL COMPLETO F1
        $actualizacion = DB::table('asociacion')
        ->where('ID', $id)
        ->update([
            'tipoavirtual' => $request->tipoavirtual,
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


        return back()->with('correcto', 'Se asignó a la agencia de '.$agencia);




        // DB::table('asociacion2')->insert([

        // ]);



    }


    public function index()
    {
        $usuario = session('email');

        $apiUrl = 'http://srv-owncloud.coopserp.com/menu-datacredito/api/usuarios/' . urlencode($usuario);

        $response = Http::get($apiUrl);
        if ($response->successful()) {
            $id = $response->json()['usuarios'][0]['id'];

            $firmas = Firmas::where('firma', $id . '.png')->get();

            return view('admin/firma', compact('firmas'));
        }else {
            return redirect()->back()->with('error', 'Error al obtener datos del usuario desde la API.');
        }

    }



    public function delete($id)
    {

        $firma = Firmas::find($id);

        if (!$firma) {
            return redirect()->back()->with('error', 'La firma no existe.');
        }

        // Construir la ruta del archivo
        $filePath = public_path('img/firmas/' . $id . '.png');
        Log::info($filePath);

        // Verificar si el archivo existe y eliminarlo
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $firma->delete();


        return redirect('/firmas')->with('success', 'Firma eliminada Correctamente!');
    }


    public function store(Request $request)
    {
        $usuario = session('email');

        $request->validate([
            'nombre' => 'required',
            'firma' => 'image|mimes:jpeg,png,jpg|max:2048',
            'firmaImagen' => 'required',
            'options' => 'required',
        ]);

        $apiUrl = 'http://srv-owncloud.coopserp.com/menu-datacredito/api/usuarios/'. $usuario;

        $response = Http::get($apiUrl);


        if ($response->successful()) {
            $id = $response->json()['usuarios'][0]['id'];

        $firmaExistente = Firmas::where('firma', $id . '.png')->first();

        if($firmaExistente){
            return redirect()->back()->with('error', 'Ya existe una firma solo puedes ingresar una firma.');
        }else {
                $firma = new Firmas([
                'nombre' => $request->get('nombre'),
                ]);

                if ($request->hasFile('firma')) {
                    $imagen = $request->file("firma");
                    $nombreimagen = $id .".".$imagen->guessExtension();
                    $ruta = public_path("img/firmas/");
                    $imagen->move($ruta,$nombreimagen);
                    $firma->firma = $nombreimagen;

                }



                if ($request->options == 'option1') {
                    $imagenData = $request->get('firmaImagen');
                    $imagenData = str_replace('data:image/png;base64,', '', $imagenData); // Eliminar el prefijo
                    $imagenData = str_replace(' ', '+', $imagenData);
                    $imagenBinaria = base64_decode($imagenData);



                    $nombreimagen = $id . '.png';
                    $ruta = public_path("img/firmas/");
                    $rutaCompleta = $ruta . $nombreimagen;
                    file_put_contents($rutaCompleta, $imagenBinaria);
                $firma->firma = $nombreimagen;
                }

                $firma->save();



                return redirect('/firmas')->with('success', 'Firma guardada correctamente!');
            }


        }


    }

    public function infofase3(Request $request){
        $id = $request->id;

        $consulta = DB::select('SELECT * FROM asociacion WHERE ID = ?', [$id]);


        $viewData = [
            'id' => $id
        ];


        return view('admin/fase3', $viewData);

    }


    public function registrarfase3(Request $request){


        //insercion fase3

        DB::table('asociacion3')->insert([
            'celular' => $request->nombre_completo,

        ]);
        dd($request->num_cuenta);


    }


}
