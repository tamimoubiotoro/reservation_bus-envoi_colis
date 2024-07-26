<?php

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
        Schema::create('colis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colis');
    }
};

/*********************** */

// database/migrations/xxxx_xx_xx_xxxxxx_create_colis_table.php

class CreateColisTable extends Migration
{
    public function up()
    {
        Schema::create('colis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('description');
            $table->enum('statut', ['Enregistré', 'En transit', 'Livré', 'Retiré'])->default('Enregistré');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('colis');
    }
}

