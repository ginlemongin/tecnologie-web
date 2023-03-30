<?php

/** nella cartella migrations ci sono i paramentri per aggiornare il database, tutto quello che serve per
 * creare tabelle
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        /**nei dati ci mettiamo le strutture */
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            /** prima devo verificare la tipologia dei campi per inserirli, poi assegno il tipo di dato */
            $table->string('username');
            $table->string('name');
            $table->string('surname');
            $table->string('email');
            $table->integer('age');
            $table->string('title')->nullable();/**nullable lo prendo dalla documentazione di laravel, significa che un campo è null (su php my admin) se non lo valorizzi, se un campo non puo essere null è come se fosse required  */
            
            /**crea due campi data e ora, a noi serve username, name, title , email quindi non basta epr la valiazione*/
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
    /**aggiornare la migrazione significa aggiornare il database
     * apro il terminale e scrivo  php artisan migrate
     * 
     * 
     * per creare il file migration usa php artisan make:migration create_reviews_table --create=reviews
     */
};
