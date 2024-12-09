<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'CategoryName' => 'Healthcare'

        ]);

        Category::create([
            'CategoryName' => 'Construction'
            
        ]);

        Category::create([
            'CategoryName' => 'Entertainment'
            
        ]);

        Category::create([
            'CategoryName' => 'Education'
            
        ]);

        Category::create([
            'CategoryName' => 'Business'
            
        ]);

    }
}
