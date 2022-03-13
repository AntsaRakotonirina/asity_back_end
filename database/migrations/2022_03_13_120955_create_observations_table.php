<?php

use App\Models\Animal;
use App\Models\Suivi;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observations', function (Blueprint $table) {
            $table->id();
            $table->string('habitat')->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->bigInteger('nombre')->nullable();
            $table->double('abondance')->nullable();
            $table->boolean('presence')->nullable();
            $table->string('zone','5')->nullable();
            $table->date('date')->nullable();
            $table->foreignIdFor(Animal::class)->cascadeOnDelete();
            $table->foreignIdFor(Suivi::class)->cascadeOnDelete();
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
        Schema::dropIfExists('observations');
    }
}
