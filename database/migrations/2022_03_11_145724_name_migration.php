<?php

use App\Models\Animal;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NameMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nom_vernaculaires', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->foreignId('animal_id')->constrained('animaux')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
        Schema::create('nom_scientifiques', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->date('mis_a_jour');
            $table->foreignId('animal_id')->constrained('animaux')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });

        Schema::create('nom_communs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->foreignId('animal_id')->constrained('animaux')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('nom_vernaculaires');
        Schema::dropIfExists('nom_scientifiques');
        Schema::dropIfExists('nom_communs');
    }
}
