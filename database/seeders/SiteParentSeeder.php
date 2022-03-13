<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SiteParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\SiteParent::factory(22)->create();
    }
}
