<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class createMproduks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_produks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_produk');
            $table->text('deskripsi');
            $table->string('foto');
            $table->integer('wide_lens');
            $table->integer('pixel_cam');
            $table->integer('id_resolusi');
            $table->integer('battery');
            $table->integer('harga_pabrik');
            $table->enum('stabilizer', ['y', 'n']);
            $table->enum('time_lapse', ['y', 'n']);
            $table->enum('night_mode', ['y', 'n']);
            $table->enum('wifi', ['y', 'n']);
            $table->enum('waterproof', ['y', 'n']);
            $table->enum('lcd', ['y', 'n']);
            $table->enum('mobile_support', ['y', 'n']);
            $table->enum('gps', ['y', 'n']);
            $table->integer('quality');
            $table->integer('durability');
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
        Schema::dropIfExists('m_produks');
    }
}
