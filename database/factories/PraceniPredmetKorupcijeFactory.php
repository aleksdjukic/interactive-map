<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class PraceniPredmetKorupcijeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'naziv_krivicnog_djela' => $this->faker->name(),
            'neformalni_naziv_predmeta' => $this->faker->name(),
            'tuzilastvo' => rand(1, 20),
            'broj_optuzenih_u_predmetu' => rand(1, 200), // password
            'sud_pred_kojim_se_vodi_postupak' => $this->faker->name(),
            'vrijeme_izvrsenja_djela' => $this->faker->text(),
            'datum_podnosenja_krivicne_prijave' => $this->faker->date(),
            'datum_donosenja_naredbe_o_sprovodjenju_istrage' => $this->faker->date(),
            'preduzimanje_posebnih_istraznih_radnji' => $this->faker->text(),
            'datum_podizanja_optuznice' => $this->faker->date(),
            'datum_potvrdjivanja_optuznice' => $this->faker->date(),
            'datum_donosenja_prvostepene_presude' => $this->faker->date(),
            'optuzeni' => $this->faker->name(),
            'postupajuci_sud' => $this->faker->name(),
            'postupajuce_tuzilastvo' => $this->faker->name(),
            'naziv_krivicnog_djela_izrecenim' => $this->faker->text(),
            'zaprijecena_sankcija_za_predmetno_krivicno_djelo_shodno_kz' => $this->faker->text(),
            'vrsta_i_visina_izrecene_sankcije_da_li_je_sankcija_ublazena_izm' => $this->faker->text(),
            'da_li_je_presudom_izrecena_sigurnosna_mjera_zabrane_vrsenja_paif' => $this->faker->text(),
            'da_li_je_izrecena_mjera_oduzimanje_imovinske_koristi_pkd' => $this->faker->text(),
            'da_li_je_tuzilastvo_izjavilo_zalbu_na_prvostepenu_presudu' => $this->faker->text()
        ];
    }
}
