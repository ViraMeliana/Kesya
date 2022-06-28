<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKamusIstilahsTable extends Migration
{
    public function up()
    {
        Schema::create('kamus_istilahs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('istilah');
            $table->longText('detail');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
