<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerhitunganAkadsTable extends Migration
{
    public function up()
    {
        Schema::create('perhitungan_akads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('collection');
            $table->longText('property')->nullable();
            $table->longText('code')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
