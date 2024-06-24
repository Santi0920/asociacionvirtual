<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;

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

        if(auth()->attempt(request(['email', 'password'])) == false){
            return back()->withErrors([
                'message' => 'El usuario o la contraseña es incorrecto!'
            ]);

        }
        $user = auth()->user();

                if ($user->rol == 'Consultante') {
                    $usuarioActual = Auth::user();
                    $nombre = $usuarioActual->name;
                    $rol = $usuarioActual->rol;

                    date_default_timezone_set('America/Bogota');

                    $fechaHoraActual = date('Y-m-d H:i:s');
                    $ip = $_SERVER['REMOTE_ADDR'];
                    $agencia = $usuarioActual->agenciau;
                    $login = DB::insert("INSERT INTO auditoria (Hora_login, Usuario_nombre, Usuario_Rol, AgenciaU, Accion_realizada, Hora_Accion, Cedula_Registrada, cerro_sesion, IP) VALUES (?, ?, ?, ?, 'IngresoaAutorizaciones', ?, ?, ?, ?)", [
                        null,
                        $nombre,
                        $rol,
                        $agencia,
                        $fechaHoraActual,
                        null,
                        null,
                        $ip
                    ]);

                    return redirect()->to('/fase1');


                }
                return redirect()->to('/login');
    }

    public function destroy(Request $request)
    {

        //AUDITORIA
        $usuarioActual = Auth::user();
        $nombre = $usuarioActual->name;
        $rol = $usuarioActual->rol;
        date_default_timezone_set('America/Bogota');
        $fechaHoraActual = date('Y-m-d H:i:s');
        $ip = $_SERVER['REMOTE_ADDR'];
        $agencia = $usuarioActual->agenciau;
        $login = DB::insert("INSERT INTO auditoria (Hora_login, Usuario_nombre, Usuario_Rol, AgenciaU, Accion_realizada, Hora_Accion, Cedula_Registrada, cerro_sesion, IP) VALUES (?, ?, ?, ?, 'CerrosesionAutorizacion', ?, ?, ?, ?)", [
            null,
            $nombre,
            $rol,
            $agencia,
            $fechaHoraActual,
            null,
            $fechaHoraActual,
            $ip
        ]);


        auth()->logout();
        Cookie::forget('laravel_session');
        Cache::flush();



        return redirect()->to('/login');
    }
}
