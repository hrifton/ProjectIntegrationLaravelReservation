<?php

use Illuminate\Database\Seeder;

class artistesAddTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call ('artistes');
        $this->command->info('ajouter a la table artistes');
    }
}

class ArtisteSeeder extends Seeder {


}