<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuMakanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_makanans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_makanan');
            $table->string('harga_penjual');
            $table->string('harga_jual');
            $table->string('nama_penjual_id');
            $table->string('nama_kategori_id');
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
        Schema::dropIfExists('menu_makanans');
    }
}
