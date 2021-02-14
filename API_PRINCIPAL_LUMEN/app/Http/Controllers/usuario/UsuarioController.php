<?php

namespace App\Http\Controllers;

use App\Clases\sistema\Respuesta;
use App\Models\persona\TipoPersona;
use App\Models\persona\TipoIdentificacion;
use App\Models\persona\Persona;
use App\Models\usuario\Usuario;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    function index(){
        $usuarios=Usuario::all();
        return  response()->json($usuarios);
    }

    function crearUsuario(Request $request){
        $usuarioNombre=empty($request["usuarioNOMBRE"])?NULL:$request["usuarioNOMBRE"];
        $usuarioClave=empty($request["usuarioCLAVE"])?NULL:Hash::make($request["usuarioCLAVE"]);
        $usuarioAplicacion=empty($request["aplicacionID"])?NULL:$request["aplicacionID"];
        $usuarioCuenta=empty($request["usuarioCUENTADE"])?"APLICACION":$request["usuarioCUENTADE"];
        $tipoIdentificacionID=empty($request["tipoIdentificacionID"])? NULL:$request["tipoIdentificacionID"];
        $personaIDENTIFICACION=empty($request["personaIDENTIFICACION"])? NULL:$request["personaIDENTIFICACION"];
        $personaNIT=empty($request["personaNIT"])? NULL:$request["personaNIT"];
        $personaRAZANSOCIAL=empty($request["personaRAZANSOCIAL"])? NULL:$request["personaRAZANSOCIAL"];
        $personaPRIMERNOMBRE=empty($request["personaPRIMERNOMBRE"])? NULL:$request["personaPRIMERNOMBRE"];
        $personaSEGUNDONOMBRE=empty($request["personaSEGUNDONOMBRE"])? NULL:$request["personaSEGUNDONOMBRE"];
        $personaPRIMERAPELLIDO=empty($request["personaPRIMERAPELLIDO"])? NULL:$request["personaPRIMERAPELLIDO"];
        $personaSEGUNDOAPELLIDO=empty($request["personaSEGUNDOAPELLIDO"])?NULL:$request["personaSEGUNDOAPELLIDO"];
        $personaFCHNACIMIENTO=empty($request["personaFCHNACIMIENTO"])? NULL:$request["personaFCHNACIMIENTO"];
        $tipoPersonaID= ($tipoIdentificacionID==TipoIdentificacion::NIT)?TipoPersona::JURIDICA : TipoPersona::NATURAL;

        $persona=Persona::gestionPersona($tipoPersonaID,$tipoIdentificacionID,$personaIDENTIFICACION,$personaNIT,$personaRAZANSOCIAL,$personaPRIMERNOMBRE,$personaSEGUNDONOMBRE,$personaPRIMERAPELLIDO,$personaSEGUNDOAPELLIDO,$personaFCHNACIMIENTO);

        if(isset($usuarioNombre,$usuarioAplicacion,$usuarioCuenta) && $persona){
            $usuario=Usuario::guardar($persona->personaID,$usuarioAplicacion,$usuarioNombre,$usuarioClave,$usuarioCuenta);
            if($usuario){
                return  Respuesta::exito(["persona"=>$persona,"usuario"=>$usuario],"Usuario creado con exito!");
            }
        }
        return  Respuesta::error("Error al crear usuario, por favor verifique los datos enviados.");
    }
}
