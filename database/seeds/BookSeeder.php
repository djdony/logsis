<?php

use Illuminate\Database\Seeder;


class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Author::class, 20)->create();
        factory(App\Book::class, 50)->create();

        foreach(range(1, 100) as $index) {
            DB::table('author_book')->insert(
                [
                    'author_id' => \App\Author::all()->random()->id,
                    'book_id' => \App\Book::all()->random()->id,

                ]
            );
        }

    }
}
