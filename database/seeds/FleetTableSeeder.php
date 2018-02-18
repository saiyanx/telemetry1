<?php
use Illuminate\Database\Seeder;
use App\fleet;

class FleetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new Fleet();
        $user['Fleet Number'] = 'CP-D-8-004';

    }
}
