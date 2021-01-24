<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postules', function (Blueprint $table) {
            $table->id();
            $table->string("CV");
            $table->longText("lettre_de_motivation");
            $table->foreignId("user_id")->constrained()->cascadeOnDelete();
            $table->foreignId("offre_id")->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('postules');
    }
}
