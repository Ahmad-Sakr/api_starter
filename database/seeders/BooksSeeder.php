<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::truncate();

        Book::create([
           'title'      => 'Book 1',
           'author'     => 'Author 1',
           'category'   => 'Art',
        ]);
        Book::create([
            'title'      => 'Book 2',
            'author'     => 'Author 2',
            'category'   => 'Music',
        ]);
        Book::create([
            'title'      => 'Book 3',
            'author'     => 'Author 3',
            'category'   => 'Programming',
        ]);
    }
}
