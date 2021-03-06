<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKecamatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kecamatans', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('kota_id')->unsigned(); 
            $table->integer('kode_kecamatan')->unique();
            $table->string('nama_kecamatan');
           
            $table->foreign('kota_id')->references('id')->on('kotas')
            ->onDelete('cascade')->onUpdate('cascade');
   
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
        Schema::dropIfExists('kecamatans');
    }
}
