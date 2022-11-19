<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\References;

class ReferencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $references = new References;
        $references->code = "overtime_method";
        $references->name = "Salary / 173";
        $references->expression = "(salary / 173) * overtime_duration_total"; 
        $references->save();

        $references = new References;
        $references->code = "overtime_method";
        $references->name = "Fixed";
        $references->expression = "10000 * overtime_duration_total"; 
        $references->save();
    }
}