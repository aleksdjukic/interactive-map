<?php

namespace App\Http\Controllers;

use App\Models\PraceniPredmetKorupcije;
use App\Models\Tuzilastvo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class PraceniPredmetKorupcijeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pkk = PraceniPredmetKorupcije::all();
        return view('admin.ppk.index')->withPkk($pkk);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tuzilastvo = Tuzilastvo::all();
        return view('admin.ppk.create')->with('tuzilastvo', $tuzilastvo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pkk = new PraceniPredmetKorupcije;
        $pkk->naziv_krivicnog_djela = $request->naziv_krivicnog_djela;
        $pkk->optuzeni = $request->optuzeni;
        $pkk->tuzilastvo = $request->tuzilastvo;
        $pkk->naziv_krivicnog_djela_izrecenim = $request->naziv_krivicnog_djela_izrecenim;
        $pkk->neformalni_naziv_predmeta = $request->neformalni_naziv_predmeta;
        $pkk->broj_optuzenih_u_predmetu = $request->broj_optuzenih_u_predmetu;
        $pkk->sud_pred_kojim_se_vodi_postupak = $request->sud_pred_kojim_se_vodi_postupak;
        $pkk->vrijeme_izvrsenja_djela = $request->vrijeme_izvrsenja_djela;
        $pkk->datum_podnosenja_krivicne_prijave = $request->datum_podnosenja_krivicne_prijave;
        $pkk->datum_donosenja_naredbe_o_sprovodjenju_istrage = $request->datum_donosenja_naredbe_o_sprovodjenju_istrage;
        $pkk->preduzimanje_posebnih_istraznih_radnji = $request->preduzimanje_posebnih_istraznih_radnji;
        $pkk->datum_podizanja_optuznice = $request->datum_podizanja_optuznice;
        $pkk->datum_potvrdjivanja_optuznice = $request->datum_potvrdjivanja_optuznice;
        $pkk->datum_donosenja_prvostepene_presude = $request->datum_donosenja_prvostepene_presude;
        $pkk->optuzeni = $request->optuzeni;
        $pkk->neformalni_naziv_predmeta = $request->neformalni_naziv_predmeta;
        $pkk->postupajuci_sud = $request->postupajuci_sud;
        $pkk->postupajuce_tuzilastvo = $request->postupajuce_tuzilastvo;
        $pkk->naziv_krivicnog_djela = $request->naziv_krivicnog_djela;
        $pkk->zaprijecena_sankcija_za_predmetno_krivicno_djelo_shodno_kz = $request->zaprijecena_sankcija_za_predmetno_krivicno_djelo_shodno_kz;
        $pkk->vrsta_i_visina_izrecene_sankcije_da_li_je_sankcija_ublazena_izm = $request->vrsta_i_visina_izrecene_sankcije_da_li_je_sankcija_ublazena_izm;
        $pkk->da_li_je_presudom_izrecena_sigurnosna_mjera_zabrane_vrsenja_paif = $request->da_li_je_presudom_izrecena_sigurnosna_mjera_zabrane_vrsenja_paif;
        $pkk->da_li_je_izrecena_mjera_oduzimanje_imovinske_koristi_pkd = $request->da_li_je_izrecena_mjera_oduzimanje_imovinske_koristi_pkd;
        $pkk->da_li_je_tuzilastvo_izjavilo_zalbu_na_prvostepenu_presudu = $request->da_li_je_tuzilastvo_izjavilo_zalbu_na_prvostepenu_presudu;


        if ($pkk->save()) {
            Session::flash('success', 'Uspješno ste dodali "Praćeni predmet korupcije": ');
        } else {
            Session::flash('error', 'Došlo je do greške, molimo Vas pokušajte ponovo');
        }

        return redirect()->route('praceni-predmeti-korupcije.index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
//        app()->setLocale('en');
        $request->language == 'en' ? app()->setLocale('en') : '';
        $tuzilastvo = Tuzilastvo::all();
        $pkk = PraceniPredmetKorupcije::where('id', $id)->first();
        return view('admin.ppk.edit')->withPkk($pkk)->withTuzilastvo($tuzilastvo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        app()->setLocale($request->get('language'));
        $praceniPredmetKorupcije = PraceniPredmetKorupcije::where('id', $id)->first();
        $praceniPredmetKorupcije->naziv_krivicnog_djela = $request->naziv_krivicnog_djela;
        $praceniPredmetKorupcije->optuzeni = $request->optuzeni;
        $praceniPredmetKorupcije->tuzilastvo = $request->tuzilastvo;
        $praceniPredmetKorupcije->naziv_krivicnog_djela_izrecenim = $request->naziv_krivicnog_djela_izrecenim;
        $praceniPredmetKorupcije->neformalni_naziv_predmeta = $request->neformalni_naziv_predmeta;
        $praceniPredmetKorupcije->broj_optuzenih_u_predmetu = $request->broj_optuzenih_u_predmetu;
        $praceniPredmetKorupcije->sud_pred_kojim_se_vodi_postupak = $request->sud_pred_kojim_se_vodi_postupak;
        $praceniPredmetKorupcije->vrijeme_izvrsenja_djela = $request->vrijeme_izvrsenja_djela;
        $praceniPredmetKorupcije->datum_podnosenja_krivicne_prijave = $request->datum_podnosenja_krivicne_prijave;
        $praceniPredmetKorupcije->datum_donosenja_naredbe_o_sprovodjenju_istrage = $request->datum_donosenja_naredbe_o_sprovodjenju_istrage;
        $praceniPredmetKorupcije->preduzimanje_posebnih_istraznih_radnji = $request->preduzimanje_posebnih_istraznih_radnji;
        $praceniPredmetKorupcije->datum_podizanja_optuznice = $request->datum_podizanja_optuznice;
        $praceniPredmetKorupcije->datum_potvrdjivanja_optuznice = $request->datum_potvrdjivanja_optuznice;
        $praceniPredmetKorupcije->datum_donosenja_prvostepene_presude = $request->datum_donosenja_prvostepene_presude;
        $praceniPredmetKorupcije->postupajuci_sud = $request->postupajuci_sud;
        $praceniPredmetKorupcije->postupajuce_tuzilastvo = $request->postupajuce_tuzilastvo;
        $praceniPredmetKorupcije->naziv_krivicnog_djela = $request->naziv_krivicnog_djela;
        $praceniPredmetKorupcije->zaprijecena_sankcija_za_predmetno_krivicno_djelo_shodno_kz = $request->zaprijecena_sankcija_za_predmetno_krivicno_djelo_shodno_kz;
        $praceniPredmetKorupcije->vrsta_i_visina_izrecene_sankcije_da_li_je_sankcija_ublazena_izm = $request->vrsta_i_visina_izrecene_sankcije_da_li_je_sankcija_ublazena_izm;
        $praceniPredmetKorupcije->da_li_je_presudom_izrecena_sigurnosna_mjera_zabrane_vrsenja_paif = $request->da_li_je_presudom_izrecena_sigurnosna_mjera_zabrane_vrsenja_paif;
        $praceniPredmetKorupcije->da_li_je_izrecena_mjera_oduzimanje_imovinske_koristi_pkd = $request->da_li_je_izrecena_mjera_oduzimanje_imovinske_koristi_pkd;
        $praceniPredmetKorupcije->da_li_je_tuzilastvo_izjavilo_zalbu_na_prvostepenu_presudu = $request->da_li_je_tuzilastvo_izjavilo_zalbu_na_prvostepenu_presudu;

        if ($praceniPredmetKorupcije->save()) {
            Session::flash('success', 'Uspješno ste izmjenili "Praćeni predmet korupcije": ');
        } else {
            Session::flash('error', 'Došlo je do greške, molimo Vas pokušajte ponovo');
        }

        app()->setLocale('bs');
        return redirect()->route('praceni-predmeti-korupcije.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pkk = PraceniPredmetKorupcije::where('id', $id)->first();
        if ($pkk->delete()) {
            Session::flash('success', 'Uspješno ste obrisali "Praćeni predmet korupcije"');
        } else {
            Session::flash('error', 'Ne može se obrisati, pokušajte ponovo');
        }

        return redirect()->route('praceni-predmeti-korupcije.index');
    }
}
