<?php

namespace Database\Seeders;

use App\Models\Icon;
use Exception;
use Illuminate\Database\Seeder;
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
        $json = Http::get('https://web.getbring.com/locale/catalog.en-US.json')->body();
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
                $image = $this->getImage("https://web.getbring.com/assets/images/items/$filename.png");
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
            $image = Storage::put("public/$letter.png",$this->getImage("https://web.getbring.com/assets/images/items/$letter.png"));
            $icon->image = Storage::url('public/' . $letter . '.png', $image);
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
