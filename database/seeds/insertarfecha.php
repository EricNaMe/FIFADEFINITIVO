<?php

use Illuminate\Database\Seeder;

class insertarfecha extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jornada_editar')->insertGetId([

            'fecha_jornada' => '00/00/00',

        ]);
    }
}
