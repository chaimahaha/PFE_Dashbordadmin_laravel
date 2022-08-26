<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'nom'=>'Admin',
        'prenom'=>'Admin',
        'cin'=>'--',
        'numpassport'=>'--',
        'cnrps'=>'--',
        'gender'=>'',
        'grade'=>'',
        'email'=>'admin@gmail.com',
        'password'=>bcrypt('123456'),
        'photo'=>'--',
        'specialite'=>'--',
        'diplome'=>'--',
        'date'=>'',
        'fctadmin'=>'--',
        'scopus'=>'--',
        'orcid'=>'--',
        'tel'=>'--',
        'telfax'=>'--',
        'datediplome'=>'',
        'is_admin'=>'1',
            ],
            [
               
        'nom'=>'USer',
        'prenom'=>'User',
        'cin'=>'--',
        'numpassport'=>'--',
        'cnrps'=>'--',
        'gender'=>'',
        'grade'=>'',
        'email'=>'user@user.com',
        'password'=>bcrypt('123456'),
        'photo'=>'--',
        'specialite'=>'--',
        'diplome'=>'--',
        'date'=>'',
        'fctadmin'=>'--',
        'scopus'=>'--',
        'orcid'=>'--',
        'tel'=>'--',
        'telfax'=>'--',
        'datediplome'=>'',
        'is_admin'=>'0',

            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
    }

