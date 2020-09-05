<?php

use Illuminate\Database\Seeder;
use App\Models\Johhan\Cuenta;

class CuentaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cuenta::create([
        	'id_categoria' => '1', 
        	'nombreCuenta' => 'Caja'
        ]);

        Cuenta::create([
        	'id_categoria' => '1', 
        	'nombreCuenta' => 'Bancos'
        ]);

        Cuenta::create([
        	'id_categoria' => '1', 
        	'nombreCuenta' => 'Clientes'
        ]);


        Cuenta::create([
        	'id_categoria' => '2', 
        	'nombreCuenta' => 'Acreedores'
        ]);

        Cuenta::create([
        	'id_categoria' => '2', 
        	'nombreCuenta' => 'Proveedores'
        ]);
    }
}
