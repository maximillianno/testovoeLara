<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorMagazineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('author_magazine', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id')->unsigned()->default(1);
            $table->foreign('author_id')->references('id')->on('authors');
            $table->integer('magazine_id')->unsigned()->default(1);
            $table->foreign('magazine_id')->references('id')->on('magazines');
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
        Schema::dropIfExists('author_magazine');
    }
}
