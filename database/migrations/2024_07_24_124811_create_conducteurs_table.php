<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_conducteurs_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('conducteurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('permis');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('conducteurs');
    }
};

