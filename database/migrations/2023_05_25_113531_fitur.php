<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Fitur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fitures', function (Blueprint $table) {
            $table->id();
            $table->integer('urutan');
            $table->string('picture_name');
            $table->string('logo_name');
            $table->string('title');
            $table->text('description');
            $table->boolean('popular');
            $table->boolean('status');
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
        Schema::dropIfExists('fitures');
    }
}
