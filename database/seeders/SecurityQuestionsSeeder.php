<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SecurityQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   
     
         public function run()
         {
             DB::table('security_questions')->insert([
                 ['question' => '¿Cuál es el nombre de tu primera mascota?'],
                 ['question' => '¿En qué ciudad naciste?'],
                 ['question' => '¿Cuál es el nombre de tu escuela primaria?'],
                 ['question' => '¿Cuál es el nombre de tu mejor amigo de la infancia?'],
                 ['question' => '¿Cuál es tu comida favorita?'],
                 ['question' => '¿Cuál es el nombre de tu autor favorito?'],
                 ['question' => '¿Cuál es tu película favorita?'],
                 ['question' => '¿Cuál es tu libro favorito?'],
                 ['question' => '¿En qué año te graduaste de la escuela secundaria?'],
                 ['question' => '¿Cuál es tu deporte favorito?'],
                 ['question' => '¿Cuál era tu materia favorita en la escuela?'],
                 ['question' => '¿Cuál es tu color favorito?'],
             ]);
         }
     
     

}
