<?php

namespace Database\Seeders;

use App\Models\Team as ModelsTeam;
use Illuminate\Database\Seeder;

class Team extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsTeam::create(['slug' => 'product-team', 'name' => 'Product Team']);
        ModelsTeam::create(['slug' => 'dev-team', 'name' => 'Development Team']);
        ModelsTeam::create(['slug' => 'qa-team', 'name' => 'Quality Assurance Team']);
    }
}
