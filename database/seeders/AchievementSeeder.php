<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('achievements')->insert([
        //     'title' => 'Test Achievement',
        //     'description' => 'An achievement made via the seeder',
        //     'completed' => true
        // ]);
        $achievements = json_decode(Storage::disk('local')->get('achievements.json'), true);
        foreach ($achievements as $achievement) {
            DB::table('achievements')->insert([
                'title' => $achievement['name'], //artifact of the first pass -- name was renamed to title
                'description' => $achievement['description'],
                'completed' => $achievement['completed'],
            ]);
        }
    }
}
