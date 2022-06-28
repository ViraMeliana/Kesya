<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDasarHukumsTable extends Migration
{
    public function up()
    {
        Schema::table('dasar_hukums', function (Blueprint $table) {
            $table->unsignedBigInteger('kategori_dasar_hukum_id')->nullable();
            $table->foreign('kategori_dasar_hukum_id', 'kategori_dasar_hukum_fk_6777391')->references('id')->on('kategori_dasar_hukums');
        });
    }
}
