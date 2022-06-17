<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Process;

class process_seed_list extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Process::create([
            'purpose_id' => '1',
            'sort_number' => '1',
            'title' => 'addする',
            'command' => 'git add *',
            'description' => '*にはファイルのディレクトリをしていするが、ここでは全ファイルを指定している',
        ]);

        Process::create([
            'purpose_id' =>'1',
            'sort_number' => '2',
            'title' => 'commitする',
            'command' => 'git commit -m "コメント"',
            'description' => 'addしたファイルをgit状にコッミトして変更点を管理できるようにする',
        ]);

        Process::create([
            'purpose_id' =>'2',
            'sort_number' => '1',
            'title' => 'laravel/uiをダウンロード',
            'command' => 'composer require laravel/ui',
            'description' => 'Laravel 6 からcssフレームワークが分離したため、別にダウンロードが必要',
        ]);

        Process::create([
            'purpose_id' =>'2',
            'sort_number' => '2',
            'title' => 'bootstrapをダウンロードする',
            'command' => 'php artisan ui bootstrap --auth',
            'description' => 'bootstrapをダウンロードする',
        ]);

        Process::create([
            'purpose_id' =>'2',
            'sort_number' => '3',
            'title' => '出力する',
            'command' => 'npm install & npm run dev',
            'description' => 'CSS、Javascriptを出力する',
        ]);

    }
}
