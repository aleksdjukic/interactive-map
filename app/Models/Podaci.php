<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Podaci extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table = 'podacis';

    protected $fillable = [
        'pvk',
        'godina',
        'nerijesene_prijave_na_dan_0101',
        'nerijesene_prijave_na_dan_0101_istrage',
        'zaprimljene_prijave',
        'zaprimljene_prijave_istrage',
        'potvrdjene_optuznice',
        'ukupno_u_radu',
        'ukupno_u_radu_istrage',
        'tuzilastvo',
        'ukupno_rijeseno',
        'naredbe_o_nepokretanju',
        'naredbe_o_nepokretanju_istrage',
        'nerijesene_prijave_na_dan_3112',
        'nerijesene_prijave_na_dan_3112_istrage',
        'Podignute_optužnice',
        'podignute_optuznice',
        'Potvrđene_optužnice',
        'pravosnazne_odbijajuce_presude',
        'ukupno_rijeseno_istrage',
        'pravosnazne_oslobadjajuce_presude',
        'pravosnazne_ukupno_osudjujuce',
        'pravosnazne_uslovna_osuda',
        'pravosnazne_zatvorska_kazna',
        'pravosnazne_novcana_kazna',
        'nepravosnazne_odbijajuce_presude',
        'nepravosnazne_oslobadjajuce_presude',
        'nepravosnazne_ukupno_osudjujuce',
        'nepravosnazne_zatvorska_kazna',
        'nepravosnazne_uslovna_osuda',
        'nepravosnazne_novcana_kazna'
    ];

    public $translatable = ['naziv'];

    public function tuzilastva(){
        return $this->belongsTo(Tuzilastvo::class, 'tuzilastvo');
    }

}
