<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class RegenerateImagesCommand extends Command
{
    protected $signature = 'images:regenerate';

    protected $description = 'Regenerate images';

    const IMAGE_EXT = ['png', 'jpg'];

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $restaurants = Restaurant::query()
                                 ->where('image', '=', 'null')
                                 ->orWhereNull('image')
                                 ->orWhere('image', '=', '')
                                 ->get();

        foreach ($restaurants as $restaurant) {
            $this->info('Looking picture for restaurant ' . $restaurant->name);
            foreach (self::IMAGE_EXT as $ext) {
                $this->info('Look for ' . $ext . ' images');
                if (Storage::exists('public/restaurants/'.$restaurant->name.'.'.$ext)) {
                    $this->info('Found ' . $restaurant->name . '.' . $ext);
                    $restaurant->image = $restaurant->name . '.' . $ext;
                    $restaurant->save();
                }
            }
        }

        $products = Product::query()
                           ->where('image', '=', 'null')
                           ->orWhereNull('image')
                           ->orWhere('image', '=', '')
                           ->get();

        foreach ($products as $product) {
            $this->info('Looking picture for product ' . $restaurant->name);
            foreach (self::IMAGE_EXT as $ext) {
                $this->info('Look for ' . $ext . ' images');
                if (Storage::exists('public/restaurants/'.$restaurant->name.'/products/' . $product->name . '.' .$ext)) {
                    $this->info('Found ' . $restaurant->name.'/products/' . $product->name . '.' .$ext);
                    $product->image = $product->name . '.' . $ext;
                    $product->save();
                }
            }
            if ($product->image === null || $product->image === '') {
                $product->image = 'null';
                $product->save();
            }
        }

        return 0;
    }
}
