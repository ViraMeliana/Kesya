<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriDasarHukumsTable extends Migration
{
    public function up()
    {
        Schema::create('kategori_dasar_hukums', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
