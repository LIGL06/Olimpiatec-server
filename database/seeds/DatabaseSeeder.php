<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Categoria;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('users')->delete();
        DB::table('categorias')->delete();

        $users = array(
    		['name' => 'Alberto Ortega', 'email' => 'admin@email.com', 'password' => Hash::make('secret')]
    	);

        $categorias = array(
            ['name' => 'Futbol Varonil', 'tipo' => '0'],
            ['name' => 'Ping Pong', 'tipo' => '1'],
            ['name' => '100 Metros Planos', 'tipo' => '1'],
            ['name' => 'Ajedrez', 'tipo' => '1']
        );

    	foreach($users as $user){
			user::create($user);
    	}

        foreach($categorias as $categoria){
            categoria::create($categoria);
        }

    	Model::reguard();
    }
}
