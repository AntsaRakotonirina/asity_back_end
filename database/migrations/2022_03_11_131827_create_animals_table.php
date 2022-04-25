<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animaux', function (Blueprint $table) {
            $table->id();
            $table->string('classe')->nullable();
            $table->string('endemicite')->nullable();
            $table->string('espece');
            $table->string('famille');
            $table->string('genre');
            $table->string('guild')->nullable();
            $table->string('status')->nullable();
            $table->string('nom_scientifique')->nullable();
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
        Schema::dropIfExists('animaux');
    }
}
