<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ItemSeeder extends Seeder
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
            $category = Category::where('name', $section->name)->first();
            foreach ($section->items as $bringItem){
                $item = new Item();
                $item->name = $bringItem->name;
                $filename = strtolower(str_replace('ü', 'ue',str_replace(' ', '_', $bringItem->itemId)));
                Storage::put('public/'.$filename. '.png',file_get_contents("https://web.getbring.com/assets/images/items/$filename.png"));
                $item->icon = Storage::url('public/'.$filename.'.png');
                $item->category()->associate($category);
                $item->save();
            }
        }
    }
}
