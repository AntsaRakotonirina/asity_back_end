<?php

namespace Database\Factories;

use App\Models\NomScientifique;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class AnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categories = ["Oiseau d'eau","Oiseau forestier","Primate","Amphibien"];
        $endemicites = ['Endemique','Nicheuse',''];
        $especes = [
            'Newtoni',
            'Hypoleucos',
            'Albinucha',
            'Bernieri',
            'Erythrorhyncha',
            'Lamelligerus',
            'Rufa',
            'Alba',
            'Cinerea',
            'humbloti',
            'purpurea',
            'idae',
            'ralloides',
            'interpres'
        ];
        
        $familles = [
            'Acrocephalidae',
            'Scolopacidae',
            'Jacanidae',
            'Anatidae',
            'Ciconiidae',
            'Anhingidae',
            'Ardeidae',
            'Scolopacidae'
        ];

        $genres = [
            'Gallinula',
            'Gelochelidon',
            'Glareola',
            'Haliaeetus',
            'Himantopus',
            'Hydroprogne',
            'Ixobrychus',
            'Larus',
            'Limosa',
            'Lophotibis',
            'Microcarbo',
            'Mycteria',
            'Nettapus',
            'Numenius',
            'Nycticorax',
            'Phoeniconaias',
            'Phoenicopterus'
        ];

        $status = [
            'LC',
            'VU',
            'NT',
            'EN',
            ''
        ];
        
        return [
            'categorie' => Arr::random($categories),
            'endemicite' => Arr::random($endemicites),
            'espece'  => Arr::random($especes),
            'famille' => Arr::random($familles),
            'genre' => Arr::random($genres),
            'guild' => '',
            'status' => Arr::random($status)
        ];
    }
}
