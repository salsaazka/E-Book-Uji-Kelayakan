<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\CreateBook;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        CreateBook::create([
            'id' => 1,
            'title' => 'The Lord of the Rings',
            'writer' => 'J.R.R. Tolkien',
            'publisher' => 'Allen & Unwin',
            'category' => 'Fantasy',
            'synopsis' => 'The Lord',
            'no' => '8627562752',
            'image' => 'https://img.freepik.com/premium-photo/crop-hand-taking-book-from-shelf_23-2147845909.jpg',
            'count_download' => 20,
        ],
        [
            'id' => 2,
            'title' => 'The Lord',
            'writer' => 'J.R.R. Tolkien',
            'publisher' => 'Allen & Unwin',
            'category' => 'Fantasy',
            'synopsis' => 'The Lord',
            'no' => '8627562752',
            'image' => 'https://img.freepik.com/premium-photo/crop-hand-taking-book-from-shelf_23-2147845909.jpg',
            'count_download' => 30,
        ],
        [
            'id' => 3,
            'title' => 'The Lord of the Rings',
            'writer' => 'J.R.R. Tolkien',
            'publisher' => 'Allen & Unwin',
            'category' => 'Fantasy',
            'synopsis' => 'The Lord',
            'no' => '8627562752',
            'image' => 'https://img.freepik.com/premium-photo/crop-hand-taking-book-from-shelf_23-2147845909.jpg',
            'count_download' => 40,
        ],
        [
            'id' => 4,
            'title' => 'The Lord of the Rings',
            'writer' => 'J.R.R. Tolkien',
            'publisher' => 'Allen & Unwin',
            'category' => 'Fantasy',
            'synopsis' => 'The Lord',
            'no' => '8627562752',
            'image' => 'https://img.freepik.com/premium-photo/crop-hand-taking-book-from-shelf_23-2147845909.jpg',
            'count_download' => 10,
        ]
    );

        Category::create([
            'name' => 'Fantasy',
        ]);

    }
}
