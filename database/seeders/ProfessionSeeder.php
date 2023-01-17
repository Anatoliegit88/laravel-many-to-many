<?php

namespace Database\Seeders;

use App\Models\Profession;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $professions = ['Teacher', 'Tutor', 'Student'];
        foreach ($professions as $profession) {
            $new_profession = new Profession();
            $new_profession->name = $profession;
            $new_profession->slug = Str::slug($profession);
            $new_profession->save();
        }
    }
}
