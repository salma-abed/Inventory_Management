<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Navbar;

class NavbarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $links = [
            [
                'name' => 'Dashboard',
                'route' => 'dashboard',
                'ordering' => 1,
            ],
            [
                'name' => 'My Profile',
                'route' => 'profilePage',
                'ordering' => 2,
            ],
            [
                'name' => 'Products',
                'route' => 'products.index',
                'ordering' => 3,
            ],
            [
                'name' => 'Places',
                'route' => 'places.index',
                'ordering' => 4,
            ],
            [
                'name' => 'Users',
                'route' => 'users.view',
                'ordering' => 5,
            ],
            [
                'name' => 'History',
                'route' => 'history.index',
                'ordering' => 6,
            ]
        ];

        foreach ($links as $key => $navbar) {
            Navbar::create($navbar);
        }
    }
}