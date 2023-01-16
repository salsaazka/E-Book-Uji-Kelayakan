<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('create_books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('writer');
            $table->string('publisher');
            $table->string('category');
            $table->string('synopsis');
            $table->string('no');
            $table->string('image');
            $table->integer('count_download')->nullable();
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
        Schema::dropIfExists('create_books');
    }
};
