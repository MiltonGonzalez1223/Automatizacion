<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follows', function (Blueprint $table) {
            $table->increments('id');
            $table->string('periodo');
            $table->unsignedInteger('docs_id'); 
            $table->foreign('docs_id')->references('id')->on('docs');
            $table->string('cod_vul')->nullable();
            $table->string('fecha_radicacion')->nullable();
            $table->unsignedInteger('observations_id'); 
            $table->foreign('observations_id')->references('id')->on('observations');
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
        Schema::dropIfExists('follows');
    }
};
