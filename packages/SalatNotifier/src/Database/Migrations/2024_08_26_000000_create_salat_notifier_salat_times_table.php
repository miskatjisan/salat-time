<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalatNotifierSalatTimesTable extends Migration
{
    public function up()
    {
        Schema::create('salat_times', function (Blueprint $table) {
            $table->id();
            $table->time('fajr');
            $table->time('dhuhr');
            $table->time('asr');
            $table->time('maghrib');
            $table->time('isha');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('salat_times');
    }
}
