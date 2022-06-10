<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class PraceniPredmetKorupcije extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $table = 'praceni_predmet_korupcijes';

    protected $fillable = [
        "id",
        "naziv_krivicnog_djela",
        "neformalni_naziv_predmeta",
        "tuzilastvo",
        "broj_optuzenih_u_predmetu",
        "sud_pred_kojim_se_vodi_postupak",
        "vrijeme_izvrsenja_djela",
        "datum_podnosenja_krivicne_prijave",
        "datum_donosenja_naredbe_o_sprovodjenju_istrage",
        "preduzimanje_posebnih_istraznih_radnji",
        "datum_podizanja_optuznice",
        "datum_potvrdjivanja_optuznice",
        "datum_donosenja_prvostepene_presude",
        "optuzeni",
        "postupajuci_sud",
        "postupajuce_tuzilastvo",
        "naziv_krivicnog_djela_izrecenim",
        "zaprijecena_sankcija_za_predmetno_krivicno_djelo_shodno_kz",
        "vrsta_i_visina_izrecene_sankcije_da_li_je_sankcija_ublazena_izm",
        "da_li_je_presudom_izrecena_sigurnosna_mjera_zabrane_vrsenja_paif",
        "da_li_je_izrecena_mjera_oduzimanje_imovinske_koristi_pkd",
        "da_li_je_tuzilastvo_izjavilo_zalbu_na_prvostepenu_presudu",
        "created_at",
        "updated_at"
    ];

    public $translatable = [
        "naziv_krivicnog_djela",
        "neformalni_naziv_predmeta",
        "sud_pred_kojim_se_vodi_postupak",
        "vrijeme_izvrsenja_djela",
        "datum_podnosenja_krivicne_prijave",
        "datum_donosenja_naredbe_o_sprovodjenju_istrage",
        "preduzimanje_posebnih_istraznih_radnji",
        "datum_podizanja_optuznice",
        "datum_potvrdjivanja_optuznice",
        "datum_donosenja_prvostepene_presude",
        "optuzeni",
        "postupajuci_sud",
        "postupajuce_tuzilastvo",
        "naziv_krivicnog_djela_izrecenim",
        "zaprijecena_sankcija_za_predmetno_krivicno_djelo_shodno_kz",
        "vrsta_i_visina_izrecene_sankcije_da_li_je_sankcija_ublazena_izm",
        "da_li_je_presudom_izrecena_sigurnosna_mjera_zabrane_vrsenja_paif",
        "da_li_je_izrecena_mjera_oduzimanje_imovinske_koristi_pkd",
        "da_li_je_tuzilastvo_izjavilo_zalbu_na_prvostepenu_presudu",
    ];

    public function tuzilastva(){
        return $this->belongsTo(Tuzilastvo::class, 'tuzilastvo');
    }
}
