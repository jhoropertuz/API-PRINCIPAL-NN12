<?php

namespace App\Clases\sistema;

use stdClass;

class Respuesta 
{
    const EXITO = "EXITO";
    const ERROR = "ERROR";
    const FALLO = "FALLO";
    
    static public function exito($dato,$mensaje=NULL)
    {   
        $respuesta = self::validarRespuesta($dato,$mensaje); 
        $respuesta->RESPUESTA = self::EXITO;
        response()->json($respuesta);
    }

    static public function error($dato,$mensaje=NULL)
    {   
        $respuesta = self::validarRespuesta($dato,$mensaje); 
        $respuesta->RESPUESTA = self::ERROR;
        response()->json($respuesta);
    }

    static private function validarRespuesta($dato,$mensaje){
        $datos = new stdClass;
        $datos->MENSAJE = is_string($dato)?$dato:$mensaje;
        if(is_object($dato) || is_array($dato)){
            $datos->DATOS = $dato;
        }else{
            $datos->DATOS = [];
        }
        return $datos;
    }

    
}
