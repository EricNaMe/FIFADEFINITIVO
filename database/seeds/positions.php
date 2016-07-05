<?php

use Illuminate\Database\Seeder;

class positions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('match_positions')->insertGetId([

            'name' => 'PORTERO',
            'short_name' => 'PO',

        ]);

        DB::table('match_positions')->insertGetId([

            'name' => 'DEFENSA',
            'short_name' => 'DFC',

        ]);

        DB::table('match_positions')->insertGetId([

            'name' => 'DEFENSA',
            'short_name' => 'DFC2',

        ]);

        DB::table('match_positions')->insertGetId([

            'name' => 'DEFENSA',
            'short_name' => 'DFC3',

        ]);

        DB::table('match_positions')->insertGetId([

            'name' => 'DEFENSA',
            'short_name' => 'LTI',

        ]);

        DB::table('match_positions')->insertGetId([

            'name' => 'DEFENSA',
            'short_name' => 'LTD',

        ]);

        DB::table('match_positions')->insertGetId([

            'name' => 'MEDIO',
            'short_name' => 'MCD',

        ]);

        DB::table('match_positions')->insertGetId([

            'name' => 'MEDIO',
            'short_name' => 'MCD2',

        ]);

        DB::table('match_positions')->insertGetId([

            'name' => 'MEDIO',
            'short_name' => 'MC',

        ]);

        DB::table('match_positions')->insertGetId([

            'name' => 'MEDIO',
            'short_name' => 'MC2',

        ]);

        DB::table('match_positions')->insertGetId([

            'name' => 'MEDIO',
            'short_name' => 'MI',

        ]);

        DB::table('match_positions')->insertGetId([

            'name' => 'MEDIO',
            'short_name' => 'MD',

        ]);

        DB::table('match_positions')->insertGetId([

            'name' => 'MEDIO',
            'short_name' => 'MVI',

        ]);

        DB::table('match_positions')->insertGetId([

            'name' => 'MEDIO',
            'short_name' => 'MVD',

        ]);

        DB::table('match_positions')->insertGetId([

            'name' => 'MEDIO',
            'short_name' => 'MCO',

        ]);

        DB::table('match_positions')->insertGetId([

            'name' => 'MEDIO',
            'short_name' => 'MCO2',

        ]);

        DB::table('match_positions')->insertGetId([

            'name' => 'DELANTERO',
            'short_name' => 'EI',

        ]);

        DB::table('match_positions')->insertGetId([

            'name' => 'DELANTERO',
            'short_name' => 'ED',

        ]);

        DB::table('match_positions')->insertGetId([

            'name' => 'DELANTERO',
            'short_name' => 'DI',

        ]);

        DB::table('match_positions')->insertGetId([

            'name' => 'DELANTERO',
            'short_name' => 'DD',

        ]);

        DB::table('match_positions')->insertGetId([

            'name' => 'DELANTERO',
            'short_name' => 'DC',

        ]);


    }
}
