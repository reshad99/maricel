<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('phone', 100)->unique();
            $table->string('email', 100)->unique();
            $table->string('card_number', 8)->unique()->nullable();
            $table->bigInteger('card_id')->unsigned();
            $table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');
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
        Schema::dropIfExists('registers');
    }
}
