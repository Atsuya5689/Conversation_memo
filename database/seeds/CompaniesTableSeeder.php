<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'Name' => '会社A',
        ]);
        DB::table('companies')->insert([
            'Name' => '会社B',
        ]);
        DB::table('companies')->insert([
            'Name' => '会社C',
        ]);
        DB::table('companies')->insert([
            'Name' => '会社D',
        ]);
    }
}
