<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $all_data = ['FrontEnd', 'BackEnd', 'FullStack'];
        foreach ($all_data as $data) {
            $new_type = new Type();
            $new_type->name = $data;
            $new_type->slug = Type::getTheSlug($data);
            $new_type->save();
        }
    }
}
