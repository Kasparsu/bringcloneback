<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Icon;
use App\Models\ItemTemplate;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class ItemTemplateSeeder extends Seeder
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
                $template = new ItemTemplate();
                $template->name = $bringItem->name;
                $icon = Icon::where('name', $template->name)->first();
                if(!$icon) {
                    $icon = Icon::where('name', substr(strtolower($template->name),0,1))->first();

                }
                $template->icon()->associate($icon);
                $template->category()->associate($category);
                $template->save();
            }
        }
    }
}
