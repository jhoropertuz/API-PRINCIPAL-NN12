<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection("PRINCIPAL")->create('personas', function (Blueprint $table) {
            $table->increments("personaID");
            $table->integer("tipoPersonaID");
            $table->integer("tipoIdentificacionID");
            $table->string("personaIDENTIFICACION");
            $table->string("personaNIT")->nullable();
            $table->string("personaRAZANSOCIAL")->nulable();
            $table->string("personaPRIMERNOMBRE")->nullable();
            $table->string("personaSEGUNDONOMBRE")->nullable();
            $table->string("personaPRIMERAPELLIDO")->nullable();
            $table->string("personaSEGUNDOAPELLIDO")->nullable();
            $table->timestamp("personaFCHNACIMIENTO")->nullable();
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
        Schema::connection('PRINCIPAL')->dropIfExists('personas');
    }
}
