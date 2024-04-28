<?php

namespace Database\Seeders;

use App\Models\NavItem;
use App\Models\User;
use App\Models\Color;
use App\Models\DesignSymbol;
use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::firstOrCreate([
            'name' => 'shopadmin',
            'password' => Hash::make('asdf'),
        ]);

        $navItems = [
            [
                'name' => 'Home',
                'link' => '/',
                'order' => 1
            ],
            [
                'name' => 'Cart',
                'link' => route('cart.index'),
                'order' => 2
            ],
            [
                'name' => 'Design Symbols',
                'link' => '#',
                'order' => 3
            ],
            [
                'name' => 'T-shirts',
                'link' => '#',
                'order' => 4
            ],
            [
                'name' => 'Assessories',
                'link' => '#',
                'order' => 5
            ],
            [
                'name' => 'Admin Area',
                'link' => route('admin-area.index'),
                'order' => 6
            ],
        ];

        $colors = [
            [
                'name' => 'White',
                'color_code' => '#fff'
            ],
            [
                'name' => 'Yellow',
                'color_code' => '#BFC278'
            ],
            [
                'name' => 'Blue',
                'color_code' => '#8ABFBE'
            ]
        ];

        $products = [
            [
                'name' => 'T-shirt',
                'price' => 25,
                'image' => '/imgs/products/tshirt-{color}.png',
                'description' => 'This is a very nice T-shirt of very high quality. The fabric will feel very nice on your skin because of the 100% cotton that it\'s made of. The design will be printed on the first in extremely high quality.'
            ],
            [
                'name' => 'Cup',
                'price' => 12,
                'image' => '/imgs/products/cup-{color}.png',
                'description' => 'This cup is the most cuppy of all. It will hold liquid and look cooler then ever because of the plenty of cool design\'s that are available'
            ]
        ];

        $designSymbols = [
            [
                'name' => 'American footbal',
                'image' => asset('/storage/design-symbols/iconmonstr-american-football-2-240.png'),
                'active' => true,
            ],
            [
                'name' => 'Basketball',
                'image' => asset('/storage/design-symbols/iconmonstr-basketball-2-240.png'),
                'active' => true,
            ],
            [
                'name' => 'Candy',
                'image' => asset('/storage/design-symbols/iconmonstr-candy-24-240.png'),
                'active' => true,
            ],
            [
                'name' => 'Construction 1',
                'image' => asset('/storage/design-symbols/iconmonstr-construction-14-240.png'),
                'active' => true,
            ],
            [
                'name' => 'Construction 2',
                'image' => asset('/storage/design-symbols/iconmonstr-construction-17-240.png'),
                'active' => true,
            ],
            [
                'name' => 'Control panel',
                'image' => asset('/storage/design-symbols/iconmonstr-control-panel-23-240.png'),
                'active' => true,
            ],
            [
                'name' => 'Crown',
                'image' => asset('/storage/design-symbols/iconmonstr-crown-19-240.png'),
                'active' => true,
            ],
            [
                'name' => 'Fast food',
                'image' => asset('/storage/design-symbols/iconmonstr-fast-food-18-240.png'),
                'active' => true,
            ],
            [
                'name' => 'Keyboard',
                'image' => asset('/storage/design-symbols/iconmonstr-keyboard-15-240.png'),
                'active' => true,
            ],
            [
                'name' => 'Marketing',
                'image' => asset('/storage/design-symbols/iconmonstr-marketing-4-240.png'),
                'active' => true,
            ],
            [
                'name' => 'Trashcan',
                'image' => asset('/storage/design-symbols/iconmonstr-trash-can-28-240.png'),
                'active' => true,
            ],
            [
                'name' => 'Umbrella',
                'image' => asset('/storage/design-symbols/iconmonstr-umbrella-15-240.png'),
                'active' => true,
            ]
        ];

        foreach ($navItems as $navItem) {
            NavItem::firstOrCreate($navItem);
        }

        foreach ($colors as $color) {
            Color::firstOrCreate($color);
        }

        foreach ($products as $product) {
            Product::firstOrCreate($product);
        }

        foreach($designSymbols as $designSymbol){
            DesignSymbol::firstOrCreate($designSymbol);
        }
    }
}
