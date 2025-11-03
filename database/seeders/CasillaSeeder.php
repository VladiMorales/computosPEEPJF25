<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CasillaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Desactivar temporalmente la verificación de claves foráneas si fuera necesario
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $now = Carbon::now()->toDateTimeString();

        $casillas = [
            ['id' => 1, 'casilla' => '533B', 'seccion' => '533', 'tipo' => 'B', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 2, 'casilla' => '781B', 'seccion' => '781', 'tipo' => 'B', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 3, 'casilla' => '1260B', 'seccion' => '1260', 'tipo' => 'B', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 4, 'casilla' => '1290B', 'seccion' => '1290', 'tipo' => 'B', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 5, 'casilla' => '1313B', 'seccion' => '1313', 'tipo' => 'B', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 6, 'casilla' => '1315B', 'seccion' => '1315', 'tipo' => 'B', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 7, 'casilla' => '1321B', 'seccion' => '1321', 'tipo' => 'B', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 8, 'casilla' => '1369B', 'seccion' => '1369', 'tipo' => 'B', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 9, 'casilla' => '1386B', 'seccion' => '1386', 'tipo' => 'B', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 10, 'casilla' => '1388B', 'seccion' => '1388', 'tipo' => 'B', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 11, 'casilla' => '1586B', 'seccion' => '1586', 'tipo' => 'B', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 12, 'casilla' => '1600B', 'seccion' => '1600', 'tipo' => 'B', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 13, 'casilla' => '1782B', 'seccion' => '1782', 'tipo' => 'B', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 14, 'casilla' => '2000B', 'seccion' => '2000', 'tipo' => 'B', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 15, 'casilla' => '2004B', 'seccion' => '2004', 'tipo' => 'B', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 16, 'casilla' => '2011B', 'seccion' => '2011', 'tipo' => 'B', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 17, 'casilla' => '2143B', 'seccion' => '2143', 'tipo' => 'B', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 18, 'casilla' => '2354B', 'seccion' => '2354', 'tipo' => 'B', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 19, 'casilla' => '2360B', 'seccion' => '2360', 'tipo' => 'B', 'created_at' => $now, 'updated_at' => $now],
        ];

        // Se utiliza insert para una inserción masiva eficiente
        DB::table('casilla')->insert($casillas);

        // Opcional: Para resetear el valor de AUTO_INCREMENT al último ID + 1 después de la inserción.
        // Esto es útil si los IDs se insertan explícitamente.
        // Si no incluyes la columna 'id' en los arreglos de datos, Laravel se encarga de esto.
        // Si la incluyes (como en este caso) y quieres asegurar la secuencia, puedes ejecutar:
        // DB::statement('ALTER TABLE casilla AUTO_INCREMENT = ' . (count($casillas) + 1) . ';');

        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}