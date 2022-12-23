<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Http::get('https://web.getbring.com/locale/catalog.en-US.json')->body();
        $values = json_decode($json);
        foreach($values->catalog->sections as $section){
            $category = new Category();
            $category->name = $section->name;
            $category->save();
        }
    }
}
