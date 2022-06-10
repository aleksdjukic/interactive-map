<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Podaci;
use App\Models\Tuzilastvo;
use Illuminate\Http\Request;

class TuzilastvoApiController extends Controller
{
    public function tuzilastvo(Request $request, $slug)
    {
        if ($request->get('godina') !== null) {
            $godina = $request->godina;
            $tuzilastvo = Tuzilastvo::where('slug', $slug)
                ->with('podatak', function ($q) use ($godina) {
                    $q->where('godina', $godina);
                })
                ->with('visoka_korupcija', function ($q) use ($godina) {
                    $q->where('godina', $godina);
                })
                ->first();
        } else {
            $tuzilastvo = Tuzilastvo::where('slug', $slug)
                ->with('podatak')
                ->with('visoka_korupcija')
                ->first();
        }

        return response()->json($tuzilastvo, 200);
    }

    public function praceniPredmetiKorupcije($slug)
    {
        $ppk = Tuzilastvo::where('slug', $slug)
            ->with('ppk')
            ->first();

        return response()->json($ppk, 200);
    }

//    public function compareChart(Request $request)
//    {
//        $tuzilastvo1 = Tuzilastvo::whereIn('slug', [$request->slug_1])
//            ->with(['podaci' => function ($q) {
//                $q->orderBy('godina', 'desc');
//            }])->get();
//
//        $tuzilastvo2 = Tuzilastvo::whereIn('slug', [$request->slug_2])
//            ->with(['podaci' => function ($q) {
//                $q->orderBy('godina', 'desc');
//            }])->get();
//
//       $data1 = array();
//       $data2 = array();
//
//        foreach ($tuzilastvo1 as $t1) {
//            $data1 = $t1;
//        }
//        foreach ($tuzilastvo2 as $t2) {
//            $data2 = $t2;
//        }
//
//        return response()->json([$data1, $data2]);
//    }



    public function compareChart(Request $request)
    {
        $data = array();
//        $data["Ukupno u radu ( Prijava )"] = array();
//        $data["Ukupno u radu ( Istraga )"] = array();
        $data["Podignute optužnice"] = array();
        $data["Potvrđene optužnice"] = array();
        $data["Ukupno osuđujućih presuda"] = array();
        $data["Zatvorska kazna"] = array();
        $data["Uslovna osuda"] = array();
        $data["Novčana kazna"] = array();

//        $data["Ukupno u radu ( Prijava ) 2"] = array();
//        $data["Ukupno u radu ( Istraga ) 2"] = array();
        $data["Podignute optužnice 2"] = array();
        $data["Potvrđene optužnice 2"] = array();
        $data["Ukupno osuđujućih presuda 2"] = array();
        $data["Zatvorska kazna 2"] = array();
        $data["Uslovna osuda 2"] = array();
        $data["Novčana kazna 2"] = array();

        $godine = array();

        $tuzilastva = Tuzilastvo::where('slug', $request->get('slug_1'))->with('podaci', function ($q) {
            $q->orderBy('godina');
        })->first();

        $tuzilastva2 = Tuzilastvo::where('slug', $request->get('slug_2'))->with('podaci', function ($q) {
            $q->orderBy('godina');
        })->first();

        foreach ($tuzilastva->podaci as $podatak) {
            array_push($godine, $podatak->godina);
//            array_push($data["Ukupno u radu ( Prijava )"], $podatak->ukupno_u_radu);
//            array_push($data["Ukupno u radu ( Istraga )"], $podatak->ukupno_u_radu_istrage);
            array_push($data["Podignute optužnice"], $podatak->podignute_optuznice);
            array_push($data["Potvrđene optužnice"], $podatak->potvrdjene_optuznice);
            array_push($data["Ukupno osuđujućih presuda"], $podatak->pravosnazne_ukupno_osudjujuce);
            array_push($data["Zatvorska kazna"], $podatak->pravosnazne_zatvorska_kazna);
            array_push($data["Uslovna osuda"], $podatak->pravosnazne_uslovna_osuda);
            array_push($data["Novčana kazna"], $podatak->pravosnazne_novcana_kazna);
        }

        foreach ($tuzilastva2->podaci as $podatak) {
//            array_push($data["Ukupno u radu ( Prijava ) 2"], $podatak->ukupno_u_radu);
//            array_push($data["Ukupno u radu ( Istraga ) 2"], $podatak->ukupno_u_radu_istrage);
            array_push($data["Podignute optužnice 2"], $podatak->podignute_optuznice);
            array_push($data["Potvrđene optužnice 2"], $podatak->potvrdjene_optuznice);
            array_push($data["Ukupno osuđujućih presuda 2"], $podatak->pravosnazne_ukupno_osudjujuce);
            array_push($data["Zatvorska kazna 2"], $podatak->pravosnazne_zatvorska_kazna);
            array_push($data["Uslovna osuda 2"], $podatak->pravosnazne_uslovna_osuda);
            array_push($data["Novčana kazna 2"], $podatak->pravosnazne_novcana_kazna);
        }
        return response()->json(['godine' => $godine, 'podaci' => $data]);
    }

    public function tuzilastvoGroup(Request $request)
    {
        if ($request->get('godina') !== null) {
            $godina = $request->get('godina');
            $tuzilastvo = Tuzilastvo::whereIn('slug', explode(',', $request->get('slugs')))
                ->with(['podatak' => function ($q) use ($godina) {
                    $q->where('godina', $godina);
                }])
                ->with(['visoka_korupcija' => function ($q) use ($godina) {
                    $q->where('godina', $godina);
                }])
                ->get();
        } else {
            $tuzilastvo = Tuzilastvo::whereIn('slug', explode(',', $request->get('slugs')))
                ->with('podatak')
                ->with('visoka_korupcija')
                ->get();
        }

        $podatak = new Podaci();
        $podatak->pvk = 0;
        $podatak->godina = 0;
        $podatak->nerijesene_prijave_na_dan_0101 = 0;
        $podatak->zaprimljene_prijave = 0;
        $podatak->ukupno_u_radu = 0;
        $podatak->ukupno_u_radu_istrage = 0;
        $podatak->ukupno_rijeseno = 0;
        $podatak->naredbe_o_nepokretanju = 0;
        $podatak->nerijesene_prijave_na_dan_3112 = 0;
        $podatak->nerijesene_prijave_na_dan_3112_istrage = 0;
        $podatak->zaprimljene_prijave_istrage = 0;
        $podatak->ukupno_rijeseno_istrage = 0;
        $podatak->naredbe_o_nepokretanju_istrage = 0;
        $podatak->nerijesene_prijave_na_dan_0101_istrage = 0;
        $podatak->podignute_optuznice = 0;
        $podatak->potvrdjene_optuznice = 0;
        $podatak->pravosnazne_odbijajuce_presude = 0;
        $podatak->pravosnazne_oslobadjajuce_presude = 0;
        $podatak->pravosnazne_ukupno_osudjujuce = 0;
        $podatak->pravosnazne_uslovna_osuda = 0;
        $podatak->pravosnazne_zatvorska_kazna = 0;
        $podatak->pravosnazne_novcana_kazna = 0;
        $podatak->nepravosnazne_odbijajuce_presude = 0;
        $podatak->nepravosnazne_oslobadjajuce_presude = 0;
        $podatak->nepravosnazne_ukupno_osudjujuce = 0;
        $podatak->nepravosnazne_zatvorska_kazna = 0;
        $podatak->nepravosnazne_uslovna_osuda = 0;
        $podatak->nepravosnazne_novcana_kazna = 0;

        $visoka_korupcija = new Podaci();
        $visoka_korupcija->pvk = 0;
        $visoka_korupcija->godina = 0;
        $visoka_korupcija->nerijesene_prijave_na_dan_0101 = 0;
        $visoka_korupcija->zaprimljene_prijave = 0;
        $visoka_korupcija->ukupno_u_radu = 0;
        $visoka_korupcija->ukupno_u_radu_istrage = 0;
        $visoka_korupcija->ukupno_rijeseno = 0;
        $visoka_korupcija->naredbe_o_nepokretanju = 0;
        $visoka_korupcija->nerijesene_prijave_na_dan_3112 = 0;
        $visoka_korupcija->nerijesene_prijave_na_dan_3112_istrage = 0;
        $visoka_korupcija->zaprimljene_prijave_istrage = 0;
        $visoka_korupcija->ukupno_rijeseno_istrage = 0;
        $visoka_korupcija->naredbe_o_nepokretanju_istrage = 0;
        $visoka_korupcija->nerijesene_prijave_na_dan_0101_istrage = 0;
        $visoka_korupcija->podignute_optuznice = 0;
        $visoka_korupcija->potvrdjene_optuznice = 0;
        $visoka_korupcija->pravosnazne_odbijajuce_presude = 0;
        $visoka_korupcija->pravosnazne_oslobadjajuce_presude = 0;
        $visoka_korupcija->pravosnazne_ukupno_osudjujuce = 0;
        $visoka_korupcija->pravosnazne_uslovna_osuda = 0;
        $visoka_korupcija->pravosnazne_zatvorska_kazna = 0;
        $visoka_korupcija->pravosnazne_novcana_kazna = 0;
        $visoka_korupcija->nepravosnazne_odbijajuce_presude = 0;
        $visoka_korupcija->nepravosnazne_oslobadjajuce_presude = 0;
        $visoka_korupcija->nepravosnazne_ukupno_osudjujuce = 0;
        $visoka_korupcija->nepravosnazne_zatvorska_kazna = 0;
        $visoka_korupcija->nepravosnazne_uslovna_osuda = 0;
        $visoka_korupcija->nepravosnazne_novcana_kazna = 0;

        foreach ($tuzilastvo as $t) {
            if ($t->podatak->first() != null) {
                $podatak->pvk = $t->podatak->first()->pvk;
                $podatak->godina .= $t->podatak->first()->zaprimljene_prijave.';';
                $podatak->nerijesene_prijave_na_dan_0101 += $t->podatak->first()->nerijesene_prijave_na_dan_0101;
                $podatak->zaprimljene_prijave += $t->podatak->first()->zaprimljene_prijave;
                $podatak->ukupno_u_radu += $t->podatak->first()->ukupno_u_radu;
                $podatak->ukupno_u_radu_istrage += $t->podatak->first()->ukupno_u_radu_istrage;
                $podatak->ukupno_rijeseno += $t->podatak->first()->ukupno_rijeseno;
                $podatak->nerijesene_prijave_na_dan_3112 += $t->podatak->first()->nerijesene_prijave_na_dan_3112;
                $podatak->nerijesene_prijave_na_dan_3112_istrage += $t->podatak->first()->nerijesene_prijave_na_dan_3112_istrage;
                $podatak->zaprimljene_prijave_istrage += $t->podatak->first()->zaprimljene_prijave_istrage;
                $podatak->ukupno_rijeseno_istrage += $t->podatak->first()->ukupno_rijeseno_istrage;
                $podatak->naredbe_o_nepokretanju_istrage += $t->podatak->first()->naredbe_o_nepokretanju_istrage;
                $podatak->naredbe_o_nepokretanju += $t->podatak->first()->naredbe_o_nepokretanju;
                $podatak->nerijesene_prijave_na_dan_0101_istrage += $t->podatak->first()->nerijesene_prijave_na_dan_0101_istrage;
                $podatak->podignute_optuznice += $t->podatak->first()->podignute_optuznice;
                $podatak->potvrdjene_optuznice += $t->podatak->first()->potvrdjene_optuznice;
                $podatak->pravosnazne_odbijajuce_presude += $t->podatak->first()->pravosnazne_odbijajuce_presude;
                $podatak->pravosnazne_oslobadjajuce_presude += $t->podatak->first()->pravosnazne_oslobadjajuce_presude;
                $podatak->pravosnazne_ukupno_osudjujuce += $t->podatak->first()->pravosnazne_ukupno_osudjujuce;
                $podatak->pravosnazne_uslovna_osuda += $t->podatak->first()->pravosnazne_uslovna_osuda;
                $podatak->pravosnazne_zatvorska_kazna += $t->podatak->first()->pravosnazne_zatvorska_kazna;
                $podatak->pravosnazne_novcana_kazna += $t->podatak->first()->pravosnazne_novcana_kazna;
                $podatak->nepravosnazne_odbijajuce_presude += $t->podatak->first()->nepravosnazne_odbijajuce_presude;
                $podatak->nepravosnazne_oslobadjajuce_presude += $t->podatak->first()->nepravosnazne_oslobadjajuce_presude;
                $podatak->nepravosnazne_ukupno_osudjujuce += $t->podatak->first()->nepravosnazne_ukupno_osudjujuce;
                $podatak->nepravosnazne_zatvorska_kazna += $t->podatak->first()->nepravosnazne_zatvorska_kazna;
                $podatak->nepravosnazne_uslovna_osuda += $t->podatak->first()->nepravosnazne_uslovna_osuda;
                $podatak->nepravosnazne_novcana_kazna += $t->podatak->first()->nepravosnazne_novcana_kazna;
            }

            if ($t->visoka_korupcija->first() != null) {
                $visoka_korupcija->pvk = $t->visoka_korupcija->first()->pvk;
                $visoka_korupcija->godina += $t->visoka_korupcija->first()->godina;
                $visoka_korupcija->nerijesene_prijave_na_dan_0101 += $t->visoka_korupcija->first()->nerijesene_prijave_na_dan_0101;
                $visoka_korupcija->zaprimljene_prijave += $t->visoka_korupcija->first()->zaprimljene_prijave;
                $visoka_korupcija->ukupno_u_radu += $t->visoka_korupcija->first()->ukupno_u_radu;
                $visoka_korupcija->ukupno_u_radu_istrage += $t->visoka_korupcija->first()->ukupno_u_radu_istrage;
                $visoka_korupcija->ukupno_rijeseno += $t->visoka_korupcija->first()->ukupno_rijeseno;
                $visoka_korupcija->naredbe_o_nepokretanju += $t->visoka_korupcija->first()->naredbe_o_nepokretanju;
                $visoka_korupcija->nerijesene_prijave_na_dan_3112 += $t->visoka_korupcija->first()->nerijesene_prijave_na_dan_3112;
                $visoka_korupcija->nerijesene_prijave_na_dan_3112_istrage += $t->visoka_korupcija->first()->nerijesene_prijave_na_dan_3112_istrage;
                $visoka_korupcija->zaprimljene_prijave_istrage += $t->visoka_korupcija->first()->zaprimljene_prijave_istrage;
                $visoka_korupcija->ukupno_rijeseno_istrage += $t->visoka_korupcija->first()->ukupno_rijeseno_istrage;
                $visoka_korupcija->naredbe_o_nepokretanju_istrage += $t->visoka_korupcija->first()->naredbe_o_nepokretanju_istrage;
                $visoka_korupcija->naredbe_o_nepokretanju += $t->visoka_korupcija->first()->naredbe_o_nepokretanju;
                $visoka_korupcija->nerijesene_prijave_na_dan_0101_istrage += $t->visoka_korupcija->first()->nerijesene_prijave_na_dan_0101_istrage;
                $visoka_korupcija->podignute_optuznice += $t->visoka_korupcija->first()->podignute_optuznice;
                $visoka_korupcija->potvrdjene_optuznice += $t->visoka_korupcija->first()->potvrdjene_optuznice;
                $visoka_korupcija->pravosnazne_odbijajuce_presude += $t->visoka_korupcija->first()->pravosnazne_odbijajuce_presude;
                $visoka_korupcija->pravosnazne_oslobadjajuce_presude += $t->visoka_korupcija->first()->pravosnazne_oslobadjajuce_presude;
                $visoka_korupcija->pravosnazne_ukupno_osudjujuce += $t->visoka_korupcija->first()->pravosnazne_ukupno_osudjujuce;
                $visoka_korupcija->pravosnazne_uslovna_osuda += $t->visoka_korupcija->first()->pravosnazne_uslovna_osuda;
                $visoka_korupcija->pravosnazne_zatvorska_kazna += $t->visoka_korupcija->first()->pravosnazne_zatvorska_kazna;
                $visoka_korupcija->pravosnazne_novcana_kazna += $t->visoka_korupcija->first()->pravosnazne_novcana_kazna;
                $visoka_korupcija->nepravosnazne_odbijajuce_presude += $t->visoka_korupcija->first()->nepravosnazne_odbijajuce_presude;
                $visoka_korupcija->nepravosnazne_oslobadjajuce_presude += $t->visoka_korupcija->first()->nepravosnazne_oslobadjajuce_presude;
                $visoka_korupcija->nepravosnazne_ukupno_osudjujuce += $t->visoka_korupcija->first()->nepravosnazne_ukupno_osudjujuce;
                $visoka_korupcija->nepravosnazne_zatvorska_kazna += $t->visoka_korupcija->first()->nepravosnazne_zatvorska_kazna;
                $visoka_korupcija->nepravosnazne_uslovna_osuda += $t->visoka_korupcija->first()->nepravosnazne_uslovna_osuda;
                $visoka_korupcija->nepravosnazne_novcana_kazna += $t->visoka_korupcija->first()->nepravosnazne_novcana_kazna;
            }
        }

        $tuzilastvoGroup = new Tuzilastvo;
        $tuzilastvoGroup->podatak = [$podatak];
        $tuzilastvoGroup->visoka_korupcija = [$visoka_korupcija];

        return response()->json($tuzilastvoGroup, 200);
    }

//    public function tuzilastvoOrder(Request $request, $id)
//    {
//        $tuzilastvo = Tuzilastvo::where('id', $id)->with('podaci', function ($q) {
//            $q->orderBy('godina');
//        })->first();
//
//        return response()->json($tuzilastvo, 200);
//    }

//    public function tuzilastvoMainData(Request $request, $id){
//        $tuzilastvo = Tuzilastvo::select('naziv')->where('id', $id)->with('podaci', function ($q){
////            $q->select('ukupno_u_radu', 'ukupno_u_radu_istrage', 'potvrdjene_optuznice', 'nepravosnazne_ukupno_osudjujuce');
//            $q->orderBy('godina');
//        })->first();
//
//        dd($tuzilastvo);
//
//        return response()->json($tuzilastvo, 200);
//    }

    public function tuzilastvoAllChart(Request $request, $slug)
    {
        $data = array();
        $data["Ukupno u radu ( Prijava )"] = array();
        $data["Ukupno u radu ( Istraga )"] = array();
        $data["Potvrđene optužnice"] = array();
        $data["Ukupno osuđujućih presuda ( Pravosnažnih )"] = array();
        $data["Ukupno osuđujućih presuda ( Nepravosnažnih )"] = array();

        $godine = array();

        $tuzilastva = Tuzilastvo::where('slug', $slug)->with('podaci', function ($q) {
            $q->orderBy('godina');
        })->first();

        foreach ($tuzilastva->podaci as $podatak) {
            array_push($godine, $podatak->godina);
            array_push($data["Ukupno u radu ( Prijava )"], $podatak->ukupno_u_radu);
            array_push($data["Ukupno u radu ( Istraga )"], $podatak->ukupno_u_radu_istrage);
            array_push($data["Potvrđene optužnice"], $podatak->potvrdjene_optuznice);
            array_push($data["Ukupno osuđujućih presuda ( Pravosnažnih )"], $podatak->pravosnazne_ukupno_osudjujuce);
            array_push($data["Ukupno osuđujućih presuda ( Nepravosnažnih )"], $podatak->nepravosnazne_ukupno_osudjujuce);
        }
        return response()->json(['godine' => $godine, 'podaci' => $data]);
    }

    public function tuzilastvoAll(Request $request)
    {
        if ($request->get('language') !== null) {
            app()->setLocale($request->get('language'));
        }
        $tuzilastva = Tuzilastvo::with('podatak')->get();

        $svaTuzilastva = array();

        foreach ($tuzilastva as $tuzilastvo) {
            $data = array();
            $tuzilastvaName = $tuzilastvo->naziv;
            $podatak = $tuzilastvo->podatak->first();

            $data["Naziv"] = $tuzilastvaName;
            $data["Godina"] = $podatak->godina;
            $data["Ukupno u radu ( Prijava )"] = $podatak->ukupno_u_radu;
            $data["Ukupno u radu ( Istraga )"] = $podatak->ukupno_u_radu_istrage;
            $data["Potvrđene optužnice"] = $podatak->potvrdjene_optuznice;
            $data["Ukupno osuđujućih presuda ( Pravosnažnih )"] = $podatak->pravosnazne_ukupno_osudjujuce;
            $data["Ukupno osuđujućih presuda ( Nepravosnažnih )"] = $podatak->nepravosnazne_ukupno_osudjujuce;

            $svaTuzilastva[$tuzilastvo->slug] = $data;
        }

        if ($request->get('language') !== null) {
            app()->setLocale('bs');
        }
        return response()->json($svaTuzilastva);
    }

    public function nadleznost($nadleznost)
    {
        $nadleznaTuzilastva = Tuzilastvo::where('nadleznost', $nadleznost)->get();

        return response()->json(array('nadleznaTuzilastva' => $nadleznaTuzilastva), 201);
    }

//    public function lol($id){
//        $podaci = Podaci::where('tuzilastvo', $id)->get();
//
//        foreach ($podaci as $podatak){
//            $godina += $podatak->godina;
//            $nerijesene_prijave_na_dan_0101 += $podatak->nerijesene_prijave_na_dan_0101;
//            $zaprimljene_prijave += $podatak->zaprimljene_prijave;
//            $ukupno_u_radu += $podatak->ukupno_u_radu;
//            $ukupno_u_radu_istrage += $podatak->
//            $ukupno_rijeseno += $podatak->
//            $tuzilastvo += $podatak->
//            $nerijesene_prijave_na_dan_3112 += $podatak->
//            $nerijesene_prijave_na_dan_0101_istrage += $podatak->
//            $zaprimljene_prijave_istrage += $podatak->
//            $ukupno_rijeseno_istrage += $podatak->
//            $naredbe_o_nepokretanju += $podatak->
//            $naredbe_o_nepokretanju_istrage += $podatak->
//            $nerijesene_prijave_na_dan_3112_istrage += $podatak->
//            $podignute_optuznice += $podatak->
//            $potvrdjene_optuznice += $podatak->
//            $pravosnazne_odbijajuce_presude += $podatak->
//            $pravosnazne_oslobadjajuce_presude += $podatak->
//            $pravosnazne_ukupno_osudjujuce += $podatak->
//            $pravosnazne_uslovna_osuda += $podatak->
//            $pravosnazne_zatvorska_kazna += $podatak->
//            $pravosnazne_novcana_kazna += $podatak->
//            $nepravosnazne_odbijajuce_presude += $podatak->
//            $nepravosnazne_oslobadjajuce_presude += $podatak->
//            $nepravosnazne_ukupno_osudjujuce += $podatak->
//            $nepravosnazne_zatvorska_kazna += $podatak->
//            $nepravosnazne_uslovna_osuda += $podatak->
//            $nepravosnazne_novcana_kazna += $podatak->
//        }
//
//        return response()->json(array('podaci'=>$podaci), 201);
//    }


    public function godine($slug)
    {
        $tuzilastvo = Tuzilastvo::where('slug', $slug)
            ->with('podatak')
            ->first();
        $godine = array();
        foreach ($tuzilastvo->podatak as $podatak) {
            array_push($godine, $podatak->godina);
        }

        return response()->json($godine, 200);
    }
}
