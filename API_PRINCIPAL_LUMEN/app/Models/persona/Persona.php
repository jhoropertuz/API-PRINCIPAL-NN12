<?php

namespace App\Models\persona;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    static function dato($personaID){

    }

    static function datoCompletos($personaID){

    }

    static function todos(){

    }

    static function todosCompletos(){
       
    }

    static function buscarIgualdad($tipoIdentificacionID,$personaIDENTIFICACION){
       return Persona::where('tipoIdentificacionID',$tipoIdentificacionID)->where('personaIDENTIFICACION',$personaIDENTIFICACION)->first();
    }

    static function guardar($tipoPersonaID,$tipoIdentificacionID,$personaIDENTIFICACION,$personaNIT,$personaRAZANSOCIAL,$personaPRIMERNOMBRE,$personaSEGUNDONOMBRE,$personaPRIMERAPELLIDO,$personaSEGUNDOAPELLIDO,$personaFCHNACIMIENTO){
        $persona=Persona::create([
            
        ]);
        return $persona;
    }
    
    static function gestionPersona($tipoPersonaID,$tipoIdentificacionID,$personaIDENTIFICACION,$personaNIT=NULL,$personaRAZANSOCIAL=NULL,$personaPRIMERNOMBRE=NULL,$personaSEGUNDONOMBRE=NULL,$personaPRIMERAPELLIDO=NULL,$personaSEGUNDOAPELLIDO=NULL,$personaFCHNACIMIENTO=NULL){
        $personaNIT=(TipoPersona::JURIDICA==$tipoPersonaID)?$personaIDENTIFICACION:$personaNIT;
        if(isset($tipoIdentificacionID,$personaIDENTIFICACION)){
            $Persona=self::buscarIgualdad($tipoIdentificacionID,$personaIDENTIFICACION);
            if($Persona){
                $Persona->personaRAZANSOCIAL= is_null($personaRAZANSOCIAL) ? $Persona->personaRAZANSOCIAL : $personaRAZANSOCIAL;
                $Persona->personaPRIMERNOMBRE= is_null($personaPRIMERNOMBRE) ? $Persona->personaPRIMERNOMBRE : $personaPRIMERNOMBRE;
                $Persona->personaSEGUNDONOMBRE= is_null($personaSEGUNDONOMBRE) ? $Persona->personaSEGUNDONOMBRE : $personaSEGUNDONOMBRE;
                $Persona->personaPRIMERAPELLIDO= is_null($personaPRIMERAPELLIDO) ? $Persona->personaPRIMERAPELLIDO : $personaPRIMERAPELLIDO;
                $Persona->personaSEGUNDOAPELLIDO= is_null($personaSEGUNDOAPELLIDO) ? $Persona->personaSEGUNDOAPELLIDO : $personaSEGUNDOAPELLIDO;
                $Persona->personaFCHNACIMIENTO= is_null($personaFCHNACIMIENTO) ? $Persona->personaFCHNACIMIENTO : $personaFCHNACIMIENTO;
                $Persona->tipoPersonaID= is_null($tipoPersonaID) ? $Persona->tipoPersonaID : $tipoPersonaID;
            }else{
                $Persona=new Persona();
                $Persona->tipoPersonaID=$tipoPersonaID;
                $Persona->tipoIdentificacionID=$tipoIdentificacionID;
                $Persona->personaIDENTIFICACION=$personaIDENTIFICACION;
                $Persona->personaNIT=$personaNIT;
                $Persona->personaRAZANSOCIAL= $personaRAZANSOCIAL;
                $Persona->personaPRIMERNOMBRE= $personaPRIMERNOMBRE;
                $Persona->personaSEGUNDONOMBRE=$personaSEGUNDONOMBRE;
                $Persona->personaPRIMERAPELLIDO= $personaPRIMERAPELLIDO;
                $Persona->personaSEGUNDOAPELLIDO=  $personaSEGUNDOAPELLIDO;
                $Persona->personaFCHNACIMIENTO= $personaFCHNACIMIENTO;
            }
            $Persona->save();  
            return $Persona;
        }
        return false;
    }
    
}
