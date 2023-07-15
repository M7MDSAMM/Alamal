<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Home Page Header
        Setting::create([
            'key' => 'test_title_en',
            'value' => '',
            'label_en' => 'LABEL (English)',
            'label_ar' => 'العنوان بالإنجليزية',
            'type' => 'text', //image, text, tags, textarea, file, editor
            'group' => 'general',
        ]);
    }
}
