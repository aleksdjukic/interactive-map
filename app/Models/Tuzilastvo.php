<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Tuzilastvo extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $table = 'tuzilastvos';

    protected $fillable = [
        'naziv',
        'nadleznost',
        'slug',
    ];

    public $translatable = ['naziv'];

    public function podaci(){
        return $this->hasMany(Podaci::class, 'tuzilastvo')
            ->where('pvk', 0);
    }

    public function podatak(){
        return $this->hasMany(Podaci::class, 'tuzilastvo')
            ->where('pvk', '=', 0)
            ->orderBy('godina', 'desc');
    }

    public function visoka_korupcija(){
        return $this->hasMany(Podaci::class, 'tuzilastvo')
            ->where('pvk', '=', 1)
            ->orderBy('godina', 'desc');
    }

    public function ppk(){
        return $this->hasMany(PraceniPredmetKorupcije::class, 'tuzilastvo');
    }
}
