<?php
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       //inicializamos Faker en modo Español
      $faker = Faker\Factory::create('es_ES');
      
            DB::table('usuarios')->insert([
                  'nombre'     => 'Jacqueline',
                  'ape_paterno'  => 'Farías',
                  'ape_materno'  => 'López',
                  'fecha_nac'  => $faker->date($format = 'Y-m-d', $max = 'now'),
                  'email' =>      $faker->userName.'@gmail.com',
                  'password' =>   Str::random(6),
                  'rut' =>        '15.371.275-1',
                  'imagen' =>        'imagen1.jpg',
                  'created_at' => date('Y-m-d H:m:s'),
                  'updated_at' => date('Y-m-d H:m:s'),
            ]);
            DB::table('usuarios')->insert([
                  'nombre'     => 'Luis Alfredo',
                  'ape_paterno'  => 'Arce',
                  'ape_materno'  => 'Contreras',
                  'fecha_nac'  => $faker->date($format = 'Y-m-d', $max = 'now'),
                  'email' =>      $faker->userName.'@gmail.com',
                  'password' =>   Str::random(6),
                  'rut' =>        '07.904.448-2',
                  'imagen' =>        'imagen2.jpg',
                  'created_at' => date('Y-m-d H:m:s'),
                  'updated_at' => date('Y-m-d H:m:s'),
            ]);
            DB::table('usuarios')->insert([
                  'nombre'     => 'Luis',
                  'ape_paterno'  => 'Rodríguez',
                  'ape_materno'  => 'Alcina',
                  'fecha_nac'  => $faker->date($format = 'Y-m-d', $max = 'now'),
                  'email' =>      $faker->userName.'@gmail.com',
                  'password' =>   Str::random(6),
                  'rut' =>        '05.542.409-8',
                  'imagen' =>        'imagen3.jpg',
                  'created_at' => date('Y-m-d H:m:s'),
                  'updated_at' => date('Y-m-d H:m:s'),
            ]);
            DB::table('usuarios')->insert([
                  'nombre'     => 'Eduardo Javier',
                  'ape_paterno'  => 'Farías',
                  'ape_materno'  => 'López',
                  'fecha_nac'  => $faker->date($format = 'Y-m-d', $max = 'now'),
                  'email' =>      $faker->userName.'@gmail.com',
                  'password' =>   Str::random(6),
                  'rut' =>        '10.211.277-6',
                  'imagen' =>        'imagen4.jpg',
                  'created_at' => date('Y-m-d H:m:s'),
                  'updated_at' => date('Y-m-d H:m:s'),
            ]);
            DB::table('usuarios')->insert([
                  'nombre'     => 'Ramón',
                  'ape_paterno'  => 'Velásquez',
                  'ape_materno'  => 'Cayupe',
                  'fecha_nac'  => $faker->date($format = 'Y-m-d', $max = 'now'),
                  'email' =>      $faker->userName.'@gmail.com',
                  'password' =>   Str::random(6),
                  'rut' =>        '05.834.225-1',
                  'imagen' =>        'imagen5.jpg',
                  'created_at' => date('Y-m-d H:m:s'),
                  'updated_at' => date('Y-m-d H:m:s'),
            ]);
          
       
      }     
}