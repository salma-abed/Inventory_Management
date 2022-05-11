<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\navbarwm;

class navbarwmSeeder extends Seeder
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
                'route' => 'dashboardwm',
                'ordering' => 1,
            ],
            [
                'name' => 'My Profile',
                'route' => 'profilePage',
                'ordering' => 2,
            ],
            [
                'name' => 'Warehouses',
                'route' => 'warehouse',
                'ordering' => 3,
            ],
            [
                'name' => 'Logout',
                'route' => 'logout',
                'ordering' => 4,
            ],
        ];

        foreach ($links as $key => $navbarwm) {
            navbarwm::create($navbarwm);
        }
    }
    
}