<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('SEGURIDAD')->create('usuarios', function (Blueprint $table) {
            $table->increments("usuarioID");
            $table->bigInteger("personaID");
            $table->integer("aplicacionID");
            $table->string("usuarioNOMBRE")->unique();
            $table->string("usuarioCLAVE")->nullable();
            $table->enum("usuarioESTADO",['ACTIVO','DESACTIVO'])->default('ACTIVO');
            $table->enum("usuarioADMINISTRADOR", ['SI', 'NO'])->default('NO');
            $table->timestamp("usuarioULTINGRESO")->nullable();
            $table->enum("usuarioCUENTADE", ['GOOGLE','FACEBOOCK','GITHUB','APLICACION'])->default('APLICACION');
            $table->string("usuarioULTLATITUD")->nullable();
            $table->string("usuarioULTLONGITUD")->nullable();
            $table->rememberToken();
            $table->string("usuarioTOKEN",60)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('SEGURIDAD')->dropIfExists('usuarios');
    }
}
