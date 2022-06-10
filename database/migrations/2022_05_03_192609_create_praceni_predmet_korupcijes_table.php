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
        Schema::create('praceni_predmet_korupcijes', function (Blueprint $table) {
            $table->id();
            $table->json('naziv_krivicnog_djela');
            $table->json('neformalni_naziv_predmeta');
            $table->bigInteger('tuzilastvo');
            $table->integer('broj_optuzenih_u_predmetu');
            $table->json('sud_pred_kojim_se_vodi_postupak');
            $table->json('vrijeme_izvrsenja_djela');
            $table->json('datum_podnosenja_krivicne_prijave');
            $table->json('datum_donosenja_naredbe_o_sprovodjenju_istrage');
            $table->json('preduzimanje_posebnih_istraznih_radnji');
            $table->json('datum_podizanja_optuznice');
            $table->json('datum_potvrdjivanja_optuznice');
            $table->json('datum_donosenja_prvostepene_presude');
            $table->json('optuzeni');
            $table->json('postupajuci_sud');
            $table->json('postupajuce_tuzilastvo');
            $table->json('naziv_krivicnog_djela_izrecenim');
            $table->json('zaprijecena_sankcija_za_predmetno_krivicno_djelo_shodno_kz')->nullable();
            $table->json('vrsta_i_visina_izrecene_sankcije_da_li_je_sankcija_ublazena_izm')->nullable();
            $table->json('da_li_je_presudom_izrecena_sigurnosna_mjera_zabrane_vrsenja_paif')->nullable();
            $table->json('da_li_je_izrecena_mjera_oduzimanje_imovinske_koristi_pkd')->nullable();
            $table->json('da_li_je_tuzilastvo_izjavilo_zalbu_na_prvostepenu_presudu')->nullable();
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
        Schema::dropIfExists('praceni_predmet_korupcijes');
    }
};
