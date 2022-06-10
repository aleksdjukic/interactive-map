<?php

namespace App\Http\Controllers;

use App\Models\Podaci;
use App\Models\Tuzilastvo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KorupcijeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.podaci.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tuzilastvo = Tuzilastvo::all();
        return view('admin.podaci.create')->with('tuzilastvo', $tuzilastvo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $podaci = new Korupcija;
        $podaci->po_stadijumima_u_postupku = $request->po_stadijumima_u_postupku;
        $podaci->naziv_krivicnog_djela = $request->naziv_krivicnog_djela;
        $podaci->optuzeni = $request->optuzeni;
        $podaci->neformalni_naziv_predmeta = $request->neformalni_naziv_predmeta;
        $podaci->broj_optuzenih_u_predmetu = $request->broj_optuzenih_u_predmetu;
        $podaci->sud_pred_kojim_se_vodi_postupak = $request->sud_pred_kojim_se_vodi_postupak;
        $podaci->tuzilastvo_koje_je_zastupalo_optuznicu = $request->tuzilastvo_koje_je_zastupalo_optuznicu;
        $podaci->vrijeme_izvrsenja_djela = $request->vrijeme_izvrsenja_djela;
        $podaci->datum_podnosenja_krivicne_prijave = $request->datum_podnosenja_krivicne_prijave;
        $podaci->datum_formiranja_spisa_u_tuzilastvu = $request->datum_formiranja_spisa_u_tuzilastvu;
        $podaci->datum_donosenja_naredbe_o_sprovodjenju_istrage = $request->datum_donosenja_naredbe_o_sprovodjenju_istrage;
        $podaci->preduzimanje_posebnih_istraznih_radnji = $request->preduzimanje_posebnih_istraznih_radnji;
        $podaci->datum_podizanja_optuznice = $request->datum_podizanja_optuznice;
        $podaci->datum_potvrdjivanja_optuznice = $request->datum_potvrdjivanja_optuznice;
        $podaci->datum_donosenja_prvostepene_presude = $request->datum_donosenja_prvostepene_presude;
        $podaci->po_izrecenim_krivicnim_sankcijama = $request->po_izrecenim_krivicnim_sankcijama;
        $podaci->optuzeni = $request->optuzeni;
        $podaci->neformalni_naziv_predmeta = $request->neformalni_naziv_predmeta;
        $podaci->postupajuci_sud = $request->postupajuci_sud;
        $podaci->postupajuce_tuzilastvo = $request->postupajuce_tuzilastvo;
        $podaci->naziv_krivicnog_djela = $request->naziv_krivicnog_djela;
        $podaci->zaprijecena_sankcija_za_predmetno_krivicno_djelo_shodno_krivicnom_zakonu = $request->zaprijecena_sankcija_za_predmetno_krivicno_djelo_shodno_krivicnom_zakonu;
        $podaci->vrsta_i_visina_izrecene_sankcije_da_li_je_sankcija_ublazena_ispod_zakonskog_minimuma = $request->vrsta_i_visina_izrecene_sankcije_da_li_je_sankcija_ublazena_ispod_zakonskog_minimuma;
        $podaci->da_li_je_presudom_izrecena_sigurnosna_mjera_zabrane_vrsenja_poziva_aktivnosti_ili_funkcija = $request->da_li_je_presudom_izrecena_sigurnosna_mjera_zabrane_vrsenja_poziva_aktivnosti_ili_funkcija;
        $podaci->da_li_je_izrecena_mjera_oduzimanje_imovinske_koristi_pribavljene_krivicnim_djelom = $request->da_li_je_izrecena_mjera_oduzimanje_imovinske_koristi_pribavljene_krivicnim_djelom;
        $podaci->da_li_je_tuzilastvo_izjavilo_zalbu_na_prvostepenu_presudu = $request->da_li_je_tuzilastvo_izjavilo_zalbu_na_prvostepenu_presudu;
        $podaci->da_li_je_presuda_pravosnazna = $request->da_li_je_presuda_pravosnazna;


        if ($podaci->save()) {
            Session::flash('success', 'Uspješno ste dodali podatak: ');
        } else {
            Session::flash('error', 'Došlo je do greške, molimo Vas pokušajte ponovo');
        }

        return redirect()->route('admin.podaci.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Podaci $podaci)
    {

        return view('admin.podaci.edit')->withPodaci($podaci);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Podaci $podaci)
    {
        $podaci->po_stadijumima_u_postupku = $request->po_stadijumima_u_postupku;
        $podaci->naziv_krivicnog_djela = $request->naziv_krivicnog_djela;
        $podaci->optuzeni = $request->optuzeni;
        $podaci->neformalni_naziv_predmeta = $request->neformalni_naziv_predmeta;
        $podaci->broj_optuzenih_u_predmetu = $request->broj_optuzenih_u_predmetu;
        $podaci->sud_pred_kojim_se_vodi_postupak = $request->sud_pred_kojim_se_vodi_postupak;
        $podaci->tuzilastvo_koje_je_zastupalo_optuznicu = $request->tuzilastvo_koje_je_zastupalo_optuznicu;
        $podaci->vrijeme_izvrsenja_djela = $request->vrijeme_izvrsenja_djela;
        $podaci->datum_podnosenja_krivicne_prijave = $request->datum_podnosenja_krivicne_prijave;
        $podaci->datum_formiranja_spisa_u_tuzilastvu = $request->datum_formiranja_spisa_u_tuzilastvu;
        $podaci->datum_donosenja_naredbe_o_sprovodjenju_istrage = $request->datum_donosenja_naredbe_o_sprovodjenju_istrage;
        $podaci->preduzimanje_posebnih_istraznih_radnji = $request->preduzimanje_posebnih_istraznih_radnji;
        $podaci->datum_podizanja_optuznice = $request->datum_podizanja_optuznice;
        $podaci->datum_potvrdjivanja_optuznice = $request->datum_potvrdjivanja_optuznice;
        $podaci->datum_donosenja_prvostepene_presude = $request->datum_donosenja_prvostepene_presude;
        $podaci->po_izrecenim_krivicnim_sankcijama = $request->po_izrecenim_krivicnim_sankcijama;
        $podaci->optuzeni = $request->optuzeni;
        $podaci->neformalni_naziv_predmeta = $request->neformalni_naziv_predmeta;
        $podaci->postupajuci_sud = $request->postupajuci_sud;
        $podaci->postupajuce_tuzilastvo = $request->postupajuce_tuzilastvo;
        $podaci->naziv_krivicnog_djela = $request->naziv_krivicnog_djela;
        $podaci->zaprijecena_sankcija_za_predmetno_krivicno_djelo_shodno_krivicnom_zakonu = $request->zaprijecena_sankcija_za_predmetno_krivicno_djelo_shodno_krivicnom_zakonu;
        $podaci->vrsta_i_visina_izrecene_sankcije_da_li_je_sankcija_ublazena_ispod_zakonskog_minimuma = $request->vrsta_i_visina_izrecene_sankcije_da_li_je_sankcija_ublazena_ispod_zakonskog_minimuma;
        $podaci->da_li_je_presudom_izrecena_sigurnosna_mjera_zabrane_vrsenja_poziva_aktivnosti_ili_funkcija = $request->da_li_je_presudom_izrecena_sigurnosna_mjera_zabrane_vrsenja_poziva_aktivnosti_ili_funkcija;
        $podaci->da_li_je_izrecena_mjera_oduzimanje_imovinske_koristi_pribavljene_krivicnim_djelom = $request->da_li_je_izrecena_mjera_oduzimanje_imovinske_koristi_pribavljene_krivicnim_djelom;
        $podaci->da_li_je_tuzilastvo_izjavilo_zalbu_na_prvostepenu_presudu = $request->da_li_je_tuzilastvo_izjavilo_zalbu_na_prvostepenu_presudu;
        $podaci->da_li_je_presuda_pravosnazna = $request->da_li_je_presuda_pravosnazna;

        if ($podaci->save()) {
            Session::flash('success', 'Uspješno ste dodali podatak: ');
        } else {
            Session::flash('error', 'Došlo je do greške, molimo Vas pokušajte ponovo');
        }

        return redirect()->route('admin.podaci.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Podaci $podaci)
    {
        if ($podaci->delete()) {
            Session::flash('success', 'Uspješno ste obrisali podatak');
        } else {
            Session::flash('error', 'Ne može se obrisati, pokušajte ponovo');
        }

        return redirect()->route('admin.podaci.index');
    }
}
