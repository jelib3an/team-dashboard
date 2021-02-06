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
        ModelsTeam::create(['key' => 'team-a', 'name' => 'Team A']);
        ModelsTeam::create(['key' => 'team-b', 'name' => 'Team B']);
        ModelsTeam::create(['key' => 'team-c', 'name' => 'Team C']);
        ModelsTeam::create(['key' => 'team-d', 'name' => 'Team D']);
    }
}
