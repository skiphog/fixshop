<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Rubric;
use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RubricSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        Rubric::truncate();
        Article::truncate();
        Rubric::flushEventListeners();
        Article::flushEventListeners();

        $users = User::all()->pluck('id')->all();

        /**
         * Создать 5 категорий и к каждой категории создать и привязать 5-10 статей
         * Т.к. статьи создаются здесь, то Seeder статей не нужен.
         */
        Rubric::factory(5)->create()->each(static function (Rubric $rubric) use ($users) {
            Article::factory(random_int(5, 10))->create([
                'rubric_id' => $rubric->id,
                'user_id'   => fake()->randomElement($users)
            ]);
        });
    }
}
