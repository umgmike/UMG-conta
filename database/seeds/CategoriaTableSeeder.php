<?php

use Illuminate\Database\Seeder;
use App\Models\Johhan\Categoria;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
        	'codigo' => '1', 
        	'nombre' => 'Activo'
        ]);

        Categoria::create([
        	'codigo' => '2', 
        	'nombre' => 'Pasivo'
        ]);

        Categoria::create([
        	'codigo' => '3', 
        	'nombre' => 'Patrimonio'
        ]);
    }
}
