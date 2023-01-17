<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = ['HTML', 'CSS', 'Js', 'Vue', 'PHP', 'Laravel'];
        foreach ($technologies as $technology) {
            $new_technology = new Technology();
            $new_technology->name= $technology;
            $new_technology->slug = Technology::getTheSlug($new_technology->name);
            $new_technology->save();
        }
    }
}
