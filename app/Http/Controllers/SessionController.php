<?php

namespace App\Http\Controllers;

use App\Models\Sesion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function login()
    {
        Cookie::forget('laravel_session');
        Cache::flush();
        return view("login");
    }

    public function login_post(Request $request)
    {
        $url = "http://srv-owncloud.coopserp.com/menu-datacredito/api/";

        $attempts = 0;
        $maxAttempts = 3; // Intentos máximos
        $retryDelay = 500; // Milisegundos

        do {
            try {
                $response = Http::get($url.'usuarios/'.$request->email);

                if ($response->failed()) {
                    throw new \Exception('Error al obtener datos del usuario');
                }

                $data = $response->json();

                // Si llegamos aquí, la solicitud fue exitosa, podemos salir del bucle.
                break;
            } catch (\Exception $e) {
                $attempts++;
                usleep($retryDelay * 1000);
            }
        } while ($attempts < $maxAttempts);

        if ($attempts == $maxAttempts) {
            return back()->withErrors([
                'message' => 'Error al intentar conectar con el servicio de autenticación.'
            ]);
        }



        // Verificar la autenticación con los datos obtenidos de la API
        if (isset($data['usuarios'][0])) {
            $user = $data['usuarios'][0];


            if ($user['email'] == strtolower($request->email) && Hash::check($request->password, $user['password'])) {
                if($user['rol'] == 'Consultante'){
                    session([
                        'email' => $user['email'],
                        'rol' => $user['rol'],
                        'agenciau' => $user['agenciau'],
                        'name' => $user['name'],
                        'expires_at' => now()->addHours(1) // Sesión expira en 1 hora
                    ]);

                    if ($user['rol'] == 'Consultante') {
                        //auditoria
                        $nombre = session('name');
                        $rol = session('rol');
                        $agencia = session('agenciau');

                        date_default_timezone_set('America/Bogota');

                        $fechaHoraActual = date('Y-m-d H:i:s');
                        $ip = $_SERVER['REMOTE_ADDR'];
                        $login = DB::insert("INSERT INTO auditoria (Hora_login, Usuario_nombre, Usuario_Rol, AgenciaU, Accion_realizada, Hora_Accion, Cedula_Registrada, cerro_sesion, IP) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)", [
                            $fechaHoraActual,
                            $nombre,
                            $rol,
                            $agencia,
                            'Ingresoaasociacionvirtual',
                            $fechaHoraActual,
                            null,
                            null,
                            $ip
                        ]);


                        return redirect()->to('/fase1');
                    }
                }
            }
        }

        // Si no se autenticó correctamente, mostrar un mensaje de error
        return back()->withErrors([
            'message' => 'El usuario o la contraseña es incorrecto!'
        ]);
    }

    public function destroy(Request $request)
    {

        //auditoria
        $nombre = session('name');
        $rol = session('rol');
        $agencia = session('agenciau');

        date_default_timezone_set('America/Bogota');

        $fechaHoraActual = date('Y-m-d H:i:s');
        $ip = $_SERVER['REMOTE_ADDR'];
        $login = DB::insert("INSERT INTO auditoria (Hora_login, Usuario_nombre, Usuario_Rol, AgenciaU, Accion_realizada, Hora_Accion, Cedula_Registrada, cerro_sesion, IP) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)", [
            $fechaHoraActual,
            $nombre,
            $rol,
            $agencia,
            'CerroSesion',
            $fechaHoraActual,
            null,
            null,
            $ip
        ]);



        $request->session()->invalidate(); // Invalida la sesión activa
        $request->session()->regenerateToken(); // Regenera el token CSRF
        Cookie::forget('laravel_session');
        Cache::flush();



        return redirect()->to('/login');
    }
}
