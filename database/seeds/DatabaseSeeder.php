<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {//respetar el orden de ejecucion y creacion
        $this->call(EstadoSeeder::class);           //1
        $this->call(RolesAndPermissions::class);    //2
        $this->call(UsersTableSeeder::class);       //3
        
    }
}
