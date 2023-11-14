<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'key' => 'site_name',
                'value' => 'TAFE Quiz Platform',
                'description' => 'The name of the application.',
            ],
            [
                'key' => 'maintenance_mode',
                'value' => 'false',
                'description' => 'Whether the site is in maintenance mode.',
            ],
            [
                'key' => 'quiz_default_duration',
                'value' => '60',
                'description' => 'Default duration for quizzes in minutes.',
            ],
            // Add more settings as necessary
        ];

        foreach ($settings as $settingData) {
            Setting::create($settingData);
        }
    }
}
