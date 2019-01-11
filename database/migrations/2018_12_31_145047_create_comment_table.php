<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50)->charset('utf8')->collation('utf8_unicode_ci');
            $table->unsignedInteger('image_id');
            $table->string('email',150);
            $table->string('comment',1000);
            $table->unsignedInteger('entry_id');
            $table->boolean('pending')->default(true);
            $table->timestamps();
            $table->foreign('entry_id')->references('id')->on('entry')->onDelete('cascade');
            $table->foreign('image_id')->references('id')->on('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment');
    }
}
