<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Management;

class ManagementTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Management::create([
            'name'    => 'management',
            'email'    => 'management@gmail.com',
            'password'   =>  Hash::make('password'),
        ]);
    }
}
