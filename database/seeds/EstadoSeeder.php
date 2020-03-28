<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados')->truncate();

        DB::table('estados')->insert([
            'nombre' => 'Iniciado',
        ]);
        DB::table('estados')->insert([
            'nombre' => 'Pendiente',
        ]);
        DB::table('estados')->insert([
            'nombre' => 'Finalizado',
        ]);
    }
}
