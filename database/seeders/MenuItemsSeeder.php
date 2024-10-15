<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuItem;

class MenuItemsSeeder extends Seeder
{
    public function run(): void
    {
        MenuItem::create(['name' => 'Home', 'url' => '/']);
        MenuItem::create(['name' => 'About Us', 'url' => '/about']);
        MenuItem::create(['name' => 'Services', 'url' => '/services']);
        MenuItem::create(['name' => 'Web Development', 'url' => '/services/web-development', 'parent_id' => 3]);
        MenuItem::create(['name' => 'SEO', 'url' => '/services/seo', 'parent_id' => 3]);
        MenuItem::create(['name' => 'Contact Us', 'url' => '/contact']);
    }
}
