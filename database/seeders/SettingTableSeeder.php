<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        $setting = new Setting;
        $setting->key = "overtime_method";
        $setting->value = "1";
        $setting->save();
    }
}