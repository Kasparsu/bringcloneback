<?php

namespace Database\Seeders;

use App\Models\Icon;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class IconSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!Cache::has('catalog')){

            $json = Http::get('https://web.getbring.com/locale/catalog.en-US.json')->body();
            Cache::put('catalog', $json, now()->addDays(30));
        } else {
            $json = Cache::get('catalog');
        }
        $values = json_decode($json);
        foreach ($values->catalog->sections as $section) {

            foreach ($section->items as $bringItem) {
                $icon = new Icon();
                $icon->name = $bringItem->name;
                $filename = str_replace(' ', '_', $bringItem->itemId);
                $filename = str_replace('-', '_',  $filename);
                $filename = str_replace('!', '', $filename);
                $filename = strtolower(str_replace('Ü', 'ü', $filename));
                $filename = strtolower(str_replace('Ä', 'ä', $filename));
                $filename = strtolower(str_replace('Ö', 'ö', $filename));
                $filename = strtolower(str_replace('ü', 'ue', $filename));
                $filename = strtolower(str_replace('ä', 'ae', $filename));
                $filename = strtolower(str_replace('ö', 'oe', $filename));
                $filename = strtolower(str_replace('é', 'e', $filename));
                if(!Cache::has($filename)){
                    $image = $this->getImage("https://web.getbring.com/assets/images/items/$filename.png");
                    Cache::put($filename, $image, now()->addDays(30));
                } else {
                    $image = Cache::get($filename);
                }

                if ($image) {
                    Storage::put("public/$filename.png", $image);
                    $icon->image = Storage::url('public/' . $filename . '.png', $image);
                    $icon->save();
                }
            }
        }
        $alphabet = range('a', 'z');
        foreach($alphabet as $letter){
            $icon = new Icon();
            $icon->name = $letter;
            if(!Cache::has($letter)){
                $image = Storage::put("public/$letter.png",$this->getImage("https://web.getbring.com/assets/images/items/$letter.png"));
                Cache::put($letter, $image, now()->addDays(30));
            }
            $icon->image = Storage::url('public/' . $letter . '.png');
            $icon->save();
        }

    }
    public function getImage(string $url){
        $image = null;
        while(!$image){

            try{
                $res = Http::get($url);
                if($res->headers()["Content-Type"][0] === 'image/png'){
                    $image = $res->body();

                } else {

                    return false;
                }
            } catch(Exception $e){
                $image = false;
            }
        }
        return $image;
    }
}
