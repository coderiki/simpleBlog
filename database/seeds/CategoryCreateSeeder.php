<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryCreateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(
            [
                "title" => "Category-1",
                "explanation" => "Category-1 comment field",
                "queue" => 1,
                "parent_id" => 0
            ]
        );
        Category::create(
            [
                "title" => "Category-2",
                "explanation" => "Category-2 comment field",
                "queue" => 2,
                "parent_id" => 0
            ]
        );
        Category::create(
            [
                "title" => "Category-3",
                "explanation" => "Category-3 comment field",
                "queue" => 3,
                "parent_id" => 0
            ]
        );
        Category::create(
            [
                "title" => "Category-4",
                "explanation" => "Category-4 comment field",
                "queue" => 4,
                "parent_id" => 0
            ]
        );
        Category::create(
            [
                "title" => "Category-1/3",
                "explanation" => "Category-1/3 comment field",
                "queue" => 1,
                "parent_id" => 3
            ]
        );
        Category::create(
            [
                "title" => "Category-2/3",
                "explanation" => "Category-2/3 comment field",
                "queue" => 2,
                "parent_id" => 3
            ]
        );
    }
}
