<?php

use Illuminate\Database\Seeder;

class TodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// factory('App/Todos')->create(); sama saja
		factory(App\Todos::class, 10)->create(); // menjalankan factory Todos 10 kali
    }
}
