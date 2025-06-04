<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Genre;

class CreateGenres extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:genres';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create default genres for books';

    /**
     * Execute the console command.
     */
    public function handle()
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

        $created = 0;
        foreach ($genres as $genreName) {
            $genre = Genre::firstOrCreate(['name' => $genreName]);
            if ($genre->wasRecentlyCreated) {
                $created++;
            }
        }

        $this->info("Создано жанров: {$created}");
        $this->info("Всего жанров в базе: " . Genre::count());
        
        return 0;
    }
}
