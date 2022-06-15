<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Purpose;

class purpose_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Purpose::create([
            'title' => 'Gitでプロジェクトを管理する',
            'status' => 'publish',
        ]);

        Purpose::create([
            'title' => 'LaravelプロジェクトにBootstrapを追加する',
            'status' => 'draft',
        ]);
    }
}
