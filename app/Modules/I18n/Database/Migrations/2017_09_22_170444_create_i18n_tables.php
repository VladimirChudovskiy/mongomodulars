<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateI18nTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locales', function (Blueprint $table) {
            $table->increments('id');
            //$table->integer('client_id')->index();
            $table->timestamps();
        });
        Schema::create('translations', function (Blueprint $table) {
            $table->increments('id');
//            $table->string('section')->index();
//            $table->string('type')->index();
//            $table->string('key')->index();
            $table->string('full_key')->index()->unique();
            $table->string('value');
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
        Schema::drop('locales');
        Schema::drop('translations');
    }
}
