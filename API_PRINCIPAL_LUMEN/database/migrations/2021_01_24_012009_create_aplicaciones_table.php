<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAplicacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection("PRINCIPAL")->create('aplicaciones', function (Blueprint $table) {
            $table->increments("aplicacionID");
            $table->string("aplicacionCODIGO",30)->nulable();
            $table->string("aplicacionTITULO");
            $table->string("aplicacionDESCRIPCION")->nullable();
            $table->string("aplicacionIMAGEN")->nullable();
            $table->string("aplicacionICONO")->nulable();
            $table->string("aplicacionURL")->nullable();
            $table->string("aplicacionFCHALANZAMIENTO")->nullable();
            $table->timestamp("aplicacionFCHACTULIZACION")->nullable();
            $table->timestamp("aplicacionFCHASUSPENSION")->nullable();
            $table->integer("politicaID")->nullable();
            $table->integer("aplicacionTipoID")->nullable();
            $table->enum("aplicacionESTADO", ['ENDESARROLLO','PRUEBAS','PRODUCCION','SUSPENDIDA','PLANEACION']);
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
        Schema::connection('PRINCIPAL')->dropIfExists('aplicaciones');
    }
}
