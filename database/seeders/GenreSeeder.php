<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            'Фантастика',
            'Фэнтези',
            'Детектив',
            'Триллер',
            'Роман',
            'Драма',
            'Комедия',
            'Ужасы',
            'Приключения',
            'Историческая литература',
            'Биография',
            'Автобиография',
            'Научная фантастика',
            'Мистика',
            'Любовный роман',
            'Классическая литература',
            'Современная литература',
            'Поэзия',
            'Философия',
            'Психология',
            'Самопомощь',
            'Бизнес',
            'Образование',
            'Детская литература',
            'Подростковая литература'
        ];

        foreach ($genres as $genreName) {
            Genre::firstOrCreate(['name' => $genreName]);
        }
    }
}
