<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBelongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('belong', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entry_id');
            $table->unsignedInteger('genre_id');
            $table->timestamps();
            $table->unique(['entry_id','genre_id']);
            $table->foreign('entry_id')->references('id')->on('entry')->onDelete('cascade');
            $table->foreign('genre_id')->references('id')->on('genre');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('belong');
    }
}
