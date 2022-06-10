<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TuzilastvoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tuzilastvos')->insert([
            'naziv' => json_encode([
                'bs' => 'Tužilaštvo Unsko-sanskog kantona',
                'en' => 'Una-Sana Canton Prosecutors Office',
            ]),
            'slug' => Str::slug('Tužilaštvo Unsko-sanskog kantona'),
            'nadleznost' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('tuzilastvos')->insert([
            'naziv' => json_encode([
                'bs' => 'Kantonalno tužiteljstvo kantona 10 Livno',
                'en' => 'Cantonal Prosecutors Office of Canton 10 Livno',
            ]),
            'slug' => Str::slug('Kantonalno tužiteljstvo kantona 10 Livno'),
            'nadleznost' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('tuzilastvos')->insert([
            'naziv' => json_encode([
                'bs' => 'Tužiteljstvo Zapadnohercegovačke županije',
                'en' => 'West Herzegovina County Prosecutors Office',
            ]),
            'slug' => Str::slug('Tužiteljstvo Zapadnohercegovačke županije'),
            'nadleznost' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('tuzilastvos')->insert([
            'naziv' => json_encode([
                'bs' => 'Tužiteljstvo Hercegovačko-neretvanskog kantona',
                'en' => 'Prosecutors Office of the Herzegovina-Neretva Canton',
            ]),
            'slug' => Str::slug('Tužiteljstvo Hercegovačko-neretvanskog kantona'),
            'nadleznost' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('tuzilastvos')->insert([
            'naziv' => json_encode([
                'bs' => 'Kantonalno tužilaštvo Sarajevo',
                'en' => 'Sarajevo Cantonal Prosecutors Office',
            ]),
            'slug' => Str::slug('Kantonalno tužilaštvo Sarajevo'),
            'nadleznost' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('tuzilastvos')->insert([
            'naziv' => json_encode([
                'bs' => 'Tužilaštvo kantona Goražde',
                'en' => 'Goražde Canton Prosecutors Office',
            ]),
            'slug' => Str::slug('Tužilaštvo kantona Goražde'),
            'nadleznost' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('tuzilastvos')->insert([
            'naziv' => json_encode([
                'bs' => 'Tužilaštvo Zeničko-dobojskog kantona',
                'en' => 'Zenica-Doboj Canton Prosecutors Office',
            ]),
            'slug' => Str::slug('Tužilaštvo Zeničko-dobojskog kantona'),
            'nadleznost' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('tuzilastvos')->insert([
            'naziv' => json_encode([
                'bs' => 'Tužiteljstvo Srednjobosanskog kantona',
                'en' => 'Central Bosnia Canton Prosecutors Office',
            ]),
            'slug' => Str::slug('Tužiteljstvo Srednjobosanskog kantona'),
            'nadleznost' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('tuzilastvos')->insert([
            'naziv' => json_encode([
                'bs' => 'Tužilaštvo Tuzlanskog kantona',
                'en' => 'Tuzla Canton Prosecutors Office',
            ]),
            'slug' => Str::slug('Tužilaštvo Tuzlanskog kantona'),
            'nadleznost' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('tuzilastvos')->insert([
            'naziv' => json_encode([
                'bs' => 'Kantonalno tužiteljstvo Posavskog Kantona-Orašje',
                'en' => 'Cantonal Prosecutors Office of Posavina Canton-Orašje',
            ]),
            'slug' => Str::slug('Kantonalno tužiteljstvo Posavskog Kantona-Orašje'),
            'nadleznost' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('tuzilastvos')->insert([
            'naziv' => json_encode([
                'bs' => 'Okružno javno tužilaštvo u Prijedoru',
                'en' => 'District Public Prosecutors Office in Prijedor',
            ]),
            'slug' => Str::slug('Okružno javno tužilaštvo u Prijedoru'),
            'nadleznost' => '2',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('tuzilastvos')->insert([
            'naziv' => json_encode([
                'bs' => 'Okružno javno tužilaštvo u Banjoj Luci',
                'en' => 'District Public Prosecutors Office in Banja Luka',
            ]),
            'slug' => Str::slug('Okružno javno tužilaštvo u Banjoj Luci'),
            'nadleznost' => '2',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('tuzilastvos')->insert([
            'naziv' => json_encode([
                'bs' => 'Okružno javno tužilaštvo u Doboju',
                'en' => 'Doboj District Public Prosecutors Office',
            ]),
            'slug' => Str::slug('Okružno javno tužilaštvo u Doboju'),
            'nadleznost' => '2',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('tuzilastvos')->insert([
            'naziv' => json_encode([
                'bs' => 'Tužilaštvo Brčko distrikta BiH',
                'en' => 'Prosecutors Office of the Brčko District of BiH',
            ]),
            'slug' => Str::slug('Tužilaštvo Brčko distrikta BiH'),
            'nadleznost' => '3',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('tuzilastvos')->insert([
            'naziv' => json_encode([
                'bs' => 'Okružno javno tužilaštvo u Bijeljini',
                'en' => 'District Public Prosecutors Office in Bijeljina',
            ]),
            'slug' => Str::slug('Okružno javno tužilaštvo u Bijeljini'),
            'nadleznost' => '2',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('tuzilastvos')->insert([
            'naziv' => json_encode([
                'bs' => 'Okružno javno tužilaštvo u Istočnom Sarajevu',
                'en' => 'District Public Prosecutors Office in East Sarajevo',
            ]),
            'slug' => Str::slug('Okružno javno tužilaštvo u Istočnom Sarajevu'),
            'nadleznost' => '2',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('tuzilastvos')->insert([
            'naziv' => json_encode([
                'bs' => 'Okružno javno tužilaštvo u Trebinju',
                'en' => 'District Public Prosecutors Office in Trebinje',
            ]),
            'slug' => Str::slug('Okružno javno tužilaštvo u Trebinju'),
            'nadleznost' => '2',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('tuzilastvos')->insert([
            'naziv' => json_encode([
                'bs' => 'Tužilaštvo BiH',
                'en' => 'Prosecutorss Office of BiH',
            ]),
            'slug' => Str::slug('Tužilaštvo BiH'),
            'nadleznost' => '4',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('tuzilastvos')->insert([
            'naziv' => json_encode([
                'bs' => 'Posebno odjeljenje - OJT Banja Luka',
                'en' => 'Special Department - OJT Banja Luka',
            ]),
            'slug' => Str::slug('Posebno odjeljenje - OJT Banja Luka'),
            'nadleznost' => '2',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('tuzilastvos')->insert([
            'naziv' => json_encode([
                'bs' => 'Posebno odjeljenje - Republičko tužilaštvo RS',
                'en' => 'Special Department - Republic Prosecutors Office of RS',
            ]),
            'slug' => Str::slug('Posebno odjeljenje - Republičko tužilaštvo RS'),
            'nadleznost' => '2',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
