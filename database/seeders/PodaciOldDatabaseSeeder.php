<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PodaciOldDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $podaci = DB::connection('old_db')->table('podaci')->get();
        foreach ($podaci as $podatak) {
            if($podatak->tuzilastvo == 25){
                $podatak->tuzilastvo = 19;
            }
            if($podatak->tuzilastvo == 26){
                $podatak->tuzilastvo =20;
            }
            DB::connection('mysql')->table('podacis')->insert([
                'godina' => $podatak->godina,
                'nerijesene_prijave_na_dan_0101' => $podatak->nerijesenepp,
                'zaprimljene_prijave' => $podatak->zaprimljenep,
                'ukupno_u_radu' => $podatak->ukuradu,
                'ukupno_u_radu_istrage' => $podatak->ukuradui,
                'ukupno_rijeseno' => $podatak->ukurijes,
                'tuzilastvo' => $podatak->tuzilastvo,
                'nerijesene_prijave_na_dan_3112' => $podatak->nerijesenepk,
                'nerijesene_prijave_na_dan_0101_istrage' => $podatak->nerijeseneip,
                'zaprimljene_prijave_istrage' => $podatak->naredjenei,
                'ukupno_rijeseno_istrage' => $podatak->ukurijesi,
                'naredbe_o_nepokretanju' => $podatak->narpokistr,
                'naredbe_o_nepokretanju_istrage' => $podatak->naredbeobustavai,
                'nerijesene_prijave_na_dan_3112_istrage' => $podatak->nerijeseneik,
                'podignute_optuznice' => $podatak->podopt,
                'potvrdjene_optuznice' => $podatak->potvropt,
                'pravosnazne_odbijajuce_presude' => $podatak->odbpres,
                'pravosnazne_oslobadjajuce_presude' => $podatak->oslobpres,
                'pravosnazne_ukupno_osudjujuce' => $podatak->ukosupres,
                'pravosnazne_uslovna_osuda' => $podatak->uslovpres,
                'pravosnazne_zatvorska_kazna' => $podatak->zatkaz,
                'pravosnazne_novcana_kazna' => $podatak->novkazna,
                'nepravosnazne_odbijajuce_presude' => 0,
                'nepravosnazne_oslobadjajuce_presude' => 0,
                'nepravosnazne_ukupno_osudjujuce' => 0,
                'nepravosnazne_zatvorska_kazna' => 0,
                'nepravosnazne_uslovna_osuda' => 0,
                'nepravosnazne_novcana_kazna' => 0,
            ]);
        }
    }
}

