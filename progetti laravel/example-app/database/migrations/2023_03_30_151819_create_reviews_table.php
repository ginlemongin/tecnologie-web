<?php

/**sono tipo degli include */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/** crei una nuova migrazione con due funzioni up e down down fa l'opposto di quello che fa up*/
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {

            /**ha di deafult i timestamps e id univoco solno le colonne della tabella */
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->integer('stars');

            /**per legare due tabelle con l'id, devi dare la stessa tipologia di tipo di dato
             * alle chiavi in relazione.
             * Creiamo una nuova migrazione che altera la colonna
             * 
             * php artisan migrate:fresh svuota i db a tutte le migrazioni*/
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};