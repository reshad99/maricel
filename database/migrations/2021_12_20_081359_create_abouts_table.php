<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('photo');
            $table->string('name_az');
            $table->string('name_en');
            $table->string('name_ru');
            $table->string('name_2_az');
            $table->string('name_2_en');
            $table->string('name_2_ru');
            $table->text('text_az');
            $table->text('text_en');
            $table->text('text_ru');
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
        Schema::dropIfExists('abouts');
    }
}
