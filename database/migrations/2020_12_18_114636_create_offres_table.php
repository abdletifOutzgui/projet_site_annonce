<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offres', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("slug")->unique();
            $table->string("type");
            $table->string("lieu");
            $table->string("fonction");
            $table->integer("duree");
            $table->integer("nbr_stagiaires");
            $table->boolean("remuneration");
            $table->longText("mission");
            $table->longText("profile_recherche");
            $table->timestamp("date_debut");
            $table->integer("nbr_vue")->default(1);
            $table->foreignId("user_id")->constrained()->cascadeOnDelete();
            $table->softDeletes();
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
        Schema::dropIfExists('offres');
    }
}
