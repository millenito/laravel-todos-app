<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
	 * 
	 * Panggil file seeder yang lain yang akan menjalankan factory
     * @return void
     */
    public function run()
    {
		$this->call(TodosSeeder::class); // menjalankan method 'run' di class 'TodosSeeder'
    }
}
