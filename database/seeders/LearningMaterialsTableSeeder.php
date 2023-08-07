<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LearningMaterial;
use App\Models\User;

class LearningMaterialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::inRandomOrder()->first();

        LearningMaterial::create([
            'title' => '基礎から学ぶ Laravel',
            'description' => 'Laravelの基礎を学べる書籍です。',
            'created_by' => $user->id,
            'media_type' => '書籍',
            'url' => 'http://example.com',
        ]);
    }
}
