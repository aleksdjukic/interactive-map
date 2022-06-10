<?php

namespace App\Http\Controllers;

use App\Models\Podaci;
use App\Models\Tuzilastvo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PodaciController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->pvk == 1) {
            $podaci = Podaci::where('pvk', 1)->get();
            return view('admin.podaci.index')->with('podaci', $podaci);
        } else {
            $podaci = Podaci::where('pvk', 0)->get();
            return view('admin.podaci.index')->with('podaci', $podaci);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->pvk == 1) {
            $pvk = 1;
            $tuzilastvo = Tuzilastvo::all();
            return view('admin.podaci.create')->with('tuzilastvo', $tuzilastvo)->withPvk($pvk);
        } else {
            $pvk = 0;
            $tuzilastvo = Tuzilastvo::all();
            return view('admin.podaci.create')->with('tuzilastvo', $tuzilastvo)->withPvk($pvk);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $podaci = new Podaci;
        $podaci->pvk = $request->pvk;
        $podaci->godina = $request->godina;
        $podaci->nerijesene_prijave_na_dan_0101 = $request->nerijesene_prijave_na_dan_0101;
        $podaci->zaprimljene_prijave = $request->zaprimljene_prijave;
        $podaci->ukupno_u_radu = $request->ukupno_u_radu;
        $podaci->ukupno_u_radu_istrage = $request->ukupno_u_radu_istrage;
        $podaci->ukupno_rijeseno = $request->ukupno_rijeseno;
        $podaci->naredbe_o_nepokretanju = $request->naredbe_o_nepokretanju;
        $podaci->nerijesene_prijave_na_dan_3112 = $request->nerijesene_prijave_na_dan_3112;
        $podaci->nerijesene_prijave_na_dan_3112_istrage = $request->nerijesene_prijave_na_dan_3112_istrage;
        $podaci->tuzilastvo = $request->tuzilastvo;
        $podaci->zaprimljene_prijave_istrage = $request->zaprimljene_prijave_istrage;
        $podaci->ukupno_rijeseno_istrage = $request->ukupno_rijeseno_istrage;
        $podaci->naredbe_o_nepokretanju_istrage = $request->naredbe_o_nepokretanju_istrage;
        $podaci->naredbe_o_nepokretanju = $request->naredbe_o_nepokretanju;
        $podaci->nerijesene_prijave_na_dan_0101_istrage = $request->nerijesene_prijave_na_dan_0101_istrage;
        $podaci->zaprimljene_prijave = $request->zaprimljene_prijave;
        $podaci->ukupno_rijeseno = $request->ukupno_rijeseno;
        $podaci->nerijesene_prijave_na_dan_3112 = $request->nerijesene_prijave_na_dan_3112;
        $podaci->podignute_optuznice = $request->podignute_optuznice;
        $podaci->potvrdjene_optuznice = $request->potvrdjene_optuznice;
        $podaci->pravosnazne_odbijajuce_presude = $request->pravosnazne_odbijajuce_presude;
        $podaci->pravosnazne_oslobadjajuce_presude = $request->pravosnazne_oslobadjajuce_presude;
        $podaci->pravosnazne_ukupno_osudjujuce = $request->pravosnazne_ukupno_osudjujuce;
        $podaci->pravosnazne_uslovna_osuda = $request->pravosnazne_uslovna_osuda;
        $podaci->pravosnazne_zatvorska_kazna = $request->pravosnazne_zatvorska_kazna;
        $podaci->pravosnazne_novcana_kazna = $request->pravosnazne_novcana_kazna;
        $podaci->nepravosnazne_odbijajuce_presude = $request->nepravosnazne_odbijajuce_presude;
        $podaci->nepravosnazne_oslobadjajuce_presude = $request->nepravosnazne_oslobadjajuce_presude;
        $podaci->nepravosnazne_ukupno_osudjujuce = $request->nepravosnazne_ukupno_osudjujuce;
        $podaci->nepravosnazne_zatvorska_kazna = $request->nepravosnazne_zatvorska_kazna;
        $podaci->nepravosnazne_uslovna_osuda = $request->nepravosnazne_uslovna_osuda;
        $podaci->nepravosnazne_novcana_kazna = $request->nepravosnazne_novcana_kazna;

        if ($request->pvk == 1) {
            if ($podaci->save()) {
                Session::flash('success', 'Uspješno ste dodali "Podatak Visoke Korupcije"');
            } else {
                Session::flash('error', 'Došlo je do greške, molimo Vas pokušajte ponovo');
            }
            return redirect('/admin/podaci?pvk=1');
        } else {
            if ($podaci->save()) {
                Session::flash('success', 'Uspješno ste dodali "Podatak"');
            } else {
                Session::flash('error', 'Došlo je do greške, molimo Vas pokušajte ponovo');
            }
            return redirect('/admin/podaci?pvk=0');
        }


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
    public function edit(Podaci $podaci)
    {
        $tuzilastvo = Tuzilastvo::all();
        return view('admin.podaci.edit')->withPodaci($podaci)->with('tuzilastvo', $tuzilastvo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Podaci $podaci)
    {
        $podaci->pvk = $request->pvk;
        $podaci->godina = $request->godina;
        $podaci->nerijesene_prijave_na_dan_0101 = $request->nerijesene_prijave_na_dan_0101;
        $podaci->zaprimljene_prijave = $request->zaprimljene_prijave;
        $podaci->ukupno_u_radu = $request->ukupno_u_radu;
        $podaci->ukupno_u_radu_istrage = $request->ukupno_u_radu_istrage;
        $podaci->ukupno_rijeseno = $request->ukupno_rijeseno;
        $podaci->naredbe_o_nepokretanju = $request->naredbe_o_nepokretanju;
        $podaci->nerijesene_prijave_na_dan_3112 = $request->nerijesene_prijave_na_dan_3112;
        $podaci->nerijesene_prijave_na_dan_3112_istrage = $request->nerijesene_prijave_na_dan_3112_istrage;
        $podaci->tuzilastvo = $request->tuzilastvo;
        $podaci->zaprimljene_prijave_istrage = $request->zaprimljene_prijave_istrage;
        $podaci->ukupno_rijeseno_istrage = $request->ukupno_rijeseno_istrage;
        $podaci->naredbe_o_nepokretanju_istrage = $request->naredbe_o_nepokretanju_istrage;
        $podaci->naredbe_o_nepokretanju = $request->naredbe_o_nepokretanju;
        $podaci->nerijesene_prijave_na_dan_0101_istrage = $request->nerijesene_prijave_na_dan_0101_istrage;
        $podaci->zaprimljene_prijave = $request->zaprimljene_prijave;
        $podaci->ukupno_rijeseno = $request->ukupno_rijeseno;
        $podaci->nerijesene_prijave_na_dan_3112 = $request->nerijesene_prijave_na_dan_3112;
        $podaci->podignute_optuznice = $request->podignute_optuznice;
        $podaci->potvrdjene_optuznice = $request->potvrdjene_optuznice;
        $podaci->pravosnazne_odbijajuce_presude = $request->pravosnazne_odbijajuce_presude;
        $podaci->pravosnazne_oslobadjajuce_presude = $request->pravosnazne_oslobadjajuce_presude;
        $podaci->pravosnazne_ukupno_osudjujuce = $request->pravosnazne_ukupno_osudjujuce;
        $podaci->pravosnazne_uslovna_osuda = $request->pravosnazne_uslovna_osuda;
        $podaci->pravosnazne_zatvorska_kazna = $request->pravosnazne_zatvorska_kazna;
        $podaci->pravosnazne_novcana_kazna = $request->pravosnazne_novcana_kazna;
        $podaci->nepravosnazne_odbijajuce_presude = $request->nepravosnazne_odbijajuce_presude;
        $podaci->nepravosnazne_oslobadjajuce_presude = $request->nepravosnazne_oslobadjajuce_presude;
        $podaci->nepravosnazne_ukupno_osudjujuce = $request->nepravosnazne_ukupno_osudjujuce;
        $podaci->nepravosnazne_zatvorska_kazna = $request->nepravosnazne_zatvorska_kazna;
        $podaci->nepravosnazne_uslovna_osuda = $request->nepravosnazne_uslovna_osuda;
        $podaci->nepravosnazne_novcana_kazna = $request->nepravosnazne_novcana_kazna;

        if ($request->pvk == 1) {
            if ($podaci->save()) {
                Session::flash('success', 'Uspješno ste izmjenili "Podatak Visoke Korupcije"');
            } else {
                Session::flash('error', 'Došlo je do greške, molimo Vas pokušajte ponovo');
            }
            return redirect('/admin/podaci?pvk=1');
        } else {
            if ($podaci->save()) {
                Session::flash('success', 'Uspješno ste izmjenili "Podatak"');
            } else {
                Session::flash('error', 'Došlo je do greške, molimo Vas pokušajte ponovo');
            }
            return redirect('/admin/podaci?pvk=0');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $podatak = Podaci::where('id', $id)->first();

        if ($podatak->pvk == 1) {
            if ($podatak->delete()) {
                Session::flash('success', 'Uspješno ste obrisali "Podatak Visoke Korupcije"');
            } else {
                Session::flash('error', 'Ne može se obrisati, pokušajte ponovo');
            }
            return redirect('/admin/podaci?pvk=1');
        }else{
            if ($podatak->delete()) {
                Session::flash('success', 'Uspješno ste obrisali "Podatak"');
            } else {
                Session::flash('error', 'Ne može se obrisati, pokušajte ponovo');
            }
            return redirect('/admin/podaci?pvk=0');
        }


    }
}
