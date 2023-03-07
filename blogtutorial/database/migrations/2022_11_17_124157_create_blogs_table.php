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
        Schema::create('blogs', function (Blueprint $table) {
            /*
                Aici avem imaginea tabelei din baza de date SQL
            */
            $table->id(); // Coloana default, la executia comenzii 'php artisan make:migration create_blogs_table'
            $table->string('title'); // Coloana adaugata suplimentar, aici
            $table->string('description'); // Coloana adaugata suplimentar, aici
            $table->text('content'); // Adaugat suplimentar, aici
            $table->string('image'); // Adaugat suplimentar, aici. Stocheaza doar link catre imaginea dorita.
            $table->timestamps(); // Coloana default, la executia comenzii 'php artisan make:migration create_blogs_table'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
};
