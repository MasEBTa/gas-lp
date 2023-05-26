<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DaftarDownload extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_download', function (Blueprint $table) {
            $table->id();
            $table->string('title_daftar');
            $table->string('pic_daftar');
            $table->string('link_daftar')->nullable();
            $table->string('logo_daftar')->nullable();
            $table->string('title_download');
            $table->string('pic_download');
            $table->string('link_download')->nullable();
            $table->string('logo_download')->nullable();
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
        Schema::dropIfExists('daftar_download');
    }
}
