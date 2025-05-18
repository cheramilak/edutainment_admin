<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WordPuzzleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $puzzles = [
            ['question' => 'Famous Ethiopian flatbread', 'answer' => 'Injera', 'startIndex' => 0, 'endIndex' => 2],
            ['question' => 'Traditional Ethiopian coffee ceremony', 'answer' => 'Bunna', 'startIndex' => 0, 'endIndex' => 2],
            ['question' => 'Ethiopian raw meat dish', 'answer' => 'Kitfo', 'startIndex' => 0, 'endIndex' => 2],
            ['question' => 'Spicy Ethiopian stew', 'answer' => 'Doro', 'startIndex' => 0, 'endIndex' => 1],
            ['question' => 'Ethiopian traditional dress', 'answer' => 'Habesha', 'startIndex' => 0, 'endIndex' => 3],
            ['question' => 'Ethiopian butter spice mix', 'answer' => 'Niter', 'startIndex' => 0, 'endIndex' => 2],
            ['question' => 'Popular Ethiopian lentil dish', 'answer' => 'Misir', 'startIndex' => 0, 'endIndex' => 2],
            ['question' => 'Ethiopian beef stew', 'answer' => 'Sega', 'startIndex' => 0, 'endIndex' => 1],
            ['question' => 'Ethiopian holiday bread', 'answer' => 'Difo', 'startIndex' => 0, 'endIndex' => 1],
            ['question' => 'Ethiopian honey wine', 'answer' => 'Tej', 'startIndex' => 0, 'endIndex' => 1],
            ['question' => 'Traditional Ethiopian drum', 'answer' => 'Kebero', 'startIndex' => 0, 'endIndex' => 1],
            ['question' => 'Popular Ethiopian breakfast', 'answer' => 'Firfir', 'startIndex' => 0, 'endIndex' => 2],
            ['question' => 'Ethiopian Orthodox cross', 'answer' => 'Meskel', 'startIndex' => 3, 'endIndex' => 6],
            ['question' => 'Ethiopian fermented sauce', 'answer' => 'Awaze', 'startIndex' => 3, 'endIndex' => 4],
            ['question' => 'Ethiopian national dish', 'answer' => 'Wat', 'startIndex' => 0, 'endIndex' => 2],
            ['question' => 'Popular spice blend', 'answer' => 'Berbere', 'startIndex' => 4, 'endIndex' => 6],
            ['question' => 'Ethiopian incense', 'answer' => 'Etan', 'startIndex' => 0, 'endIndex' => 1],
            ['question' => 'Cultural dance style', 'answer' => 'Eskista', 'startIndex' => 0, 'endIndex' => 2],
            ['question' => 'Traditional scarf', 'answer' => 'Netela', 'startIndex' => 2, 'endIndex' => 4],
            ['question' => 'Holiday with bonfire', 'answer' => 'Buhe', 'startIndex' => 2, 'endIndex' => 3],
            ['question' => 'Traditional coffee pot', 'answer' => 'Jebena', 'startIndex' => 0, 'endIndex' => 2],
            ['question' => 'Ethiopian honey', 'answer' => 'Mar', 'startIndex' => 0, 'endIndex' => 2],
            ['question' => 'Holiday celebrating finding of the true cross', 'answer' => 'Meskel', 'startIndex' => 0, 'endIndex' => 2],
            ['question' => 'Traditional woven garment', 'answer' => 'Gabi', 'startIndex' => 0, 'endIndex' => 2],
            ['question' => 'Spiced clarified butter', 'answer' => 'Kibbeh', 'startIndex' => 3, 'endIndex' => 5],
        ];

        DB::table('word_puzzles')->insert($puzzles);

    }
}
