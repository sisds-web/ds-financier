<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\DSFinancier\User::class,1)
            ->states('admin')
            ->create([
                'name'=>'Douglas Silva',
                'email'=>'douglas@sisds.com.br'
            ]);

        factory(\DSFinancier\User::class,1)
            ->create([
                'name'=>'Douglas Filho',
                'email'=>'douglasfilho@sisds.com.br'
            ]);
    }
}
