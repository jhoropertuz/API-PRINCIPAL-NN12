<?php

namespace App\Models\usuario;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Support\Str;
class Usuario extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;
    protected $table = 'usuarios';
    protected $connection = 'SEGURIDAD';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'usuarioNOMBRE', 
        'usuarioCLAVE', 
        'aplicacionID' , 
        'personaID',
        'usuarioULTINGRESO',
        'usuarioCUENTADE',
        'usuarioTOKEN'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'usuarioCLAVE',
    ];

    static function guardar($personaID,$usuarioAplicacion,$usuarioNombre,$usuarioClave,$usuarioCuenta){
        $usuario=Usuario::create([
            "personaID"=>$personaID,
            "aplicacionID"=>$usuarioAplicacion,
            "usuarioNOMBRE"=>$usuarioNombre,
            "usuarioCLAVE"=>$usuarioClave,
            "usuarioULTINGRESO"=>date("Y-m-d h:i:s"),
            "usuarioCUENTADE"=>$usuarioCuenta,
            "usuarioTOKEN"=>Str::random(60)
        ]);
        return $usuario;
    }
}
