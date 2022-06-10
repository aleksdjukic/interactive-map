<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('podacis', function (Blueprint $table) {
            $table->id();
            $table->integer('godina');
            $table->integer('pvk')->default(0);
            $table->integer('nerijesene_prijave_na_dan_0101')->default(0);
            $table->integer('zaprimljene_prijave')->default(0);
            $table->integer('ukupno_u_radu')->default(0);
            $table->integer('ukupno_u_radu_istrage')->default(0);
            $table->integer('ukupno_rijeseno')->default(0);
            $table->integer('tuzilastvo')->default(0);
            $table->integer('nerijesene_prijave_na_dan_3112')->default(0);
            $table->integer('nerijesene_prijave_na_dan_0101_istrage')->default(0);
            $table->integer('zaprimljene_prijave_istrage')->default(0);
            $table->integer('ukupno_rijeseno_istrage')->default(0);
            $table->integer('naredbe_o_nepokretanju')->default(0);
            $table->integer('naredbe_o_nepokretanju_istrage')->default(0);
            $table->integer('nerijesene_prijave_na_dan_3112_istrage')->default(0);
            $table->integer('podignute_optuznice')->default(0);
            $table->integer('potvrdjene_optuznice')->default(0);
            $table->integer('pravosnazne_odbijajuce_presude')->default(0);
            $table->integer('pravosnazne_oslobadjajuce_presude')->default(0);
            $table->integer('pravosnazne_ukupno_osudjujuce')->default(0);
            $table->integer('pravosnazne_uslovna_osuda')->default(0);
            $table->integer('pravosnazne_zatvorska_kazna')->default(0);
            $table->integer('pravosnazne_novcana_kazna')->default(0);
            $table->integer('nepravosnazne_odbijajuce_presude')->default(0);
            $table->integer('nepravosnazne_oslobadjajuce_presude')->default(0);
            $table->integer('nepravosnazne_ukupno_osudjujuce')->default(0);
            $table->integer('nepravosnazne_zatvorska_kazna')->default(0);
            $table->integer('nepravosnazne_uslovna_osuda')->default(0);
            $table->integer('nepravosnazne_novcana_kazna')->default(0);
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
        Schema::dropIfExists('podacis');
    }
};
