<?php

namespace Database\Seeders;

use App\Models\Actividad;
use App\Models\Reconocimiento;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReconocimientosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reconocimiento::truncate();
        $actividades = Actividad::all();

        $users = User::all();

        foreach ($users as $user) {

            $numRegistros = rand(0, 2);

            for ($i = 0; $i < $numRegistros; $i++) {
                $reconocimiento = new Reconocimiento();
                $reconocimiento->estudiante_id = $user->id;
                $reconocimiento->actividad_id = $actividades->random()->id;
                $reconocimiento->docente_validador = $users->random()->id;
                $reconocimiento->documento = 'https://drive.google.com/document/d/' . substr(md5(rand()), 0, 10);
                $reconocimiento->save();
            }
        }

        foreach ($actividades as $actividad) {
            $numReconocimientos = rand(0, 2);
            for ($i = 0; $i < $numReconocimientos; $i++) {
                $recon = new Reconocimiento;
                $recon->estudiante_id = rand(1, 10);
                $recon->actividad_id = $actividad->id;
                $recon->documento = 'https://drive.google.com/document/d/' . rand(100000000000, 999999999999);
                $recon->docente_validador = rand(1, 10);
                try {
                    $recon->save();
                } catch (\Exception $e) {
                    $this->command->error('Error al insertar reconocimiento ' . $recon->id);
                }
            }

        }

    }
    private static $arrayReconocimientos = [
        [
            'estudiante_id' => 1,
            'actividad_id' => 2,
            'documento' => 'https://drive.google.com/document/d/KPkTFrB1nub',
            'fecha' => '05/12/2022',
            'docente_validador' => 2
        ],
        [
            'estudiante_id' => 2,
            'actividad_id' => 3,
            'documento' => 'https://drive.google.com/document/d/Cov6riILdN0',
            'fecha' => '10/10/2022',
            'docente_validador' => 3
        ],
        [
            'estudiante_id' => 3,
            'actividad_id' => 4,
            'documento' => 'https://drive.google.com/document/d/H5LzJpVKnR9',
            'fecha' => '15/11/2022',
            'docente_validador' => 4
        ],
        [
            'estudiante_id' => 4,
            'actividad_id' => 5,
            'documento' => 'https://drive.google.com/document/d/Z1lNhHOFru6',
            'fecha' => '20/01/2023',
            'docente_validador' => 5
        ],
        [
            'estudiante_id' => 5,
            'actividad_id' => 6,
            'documento' => 'https://drive.google.com/document/d/sV7S5dTPgpN',
            'fecha' => '25/02/2023',
            'docente_validador' => 6
        ],
        [
            'estudiante_id' => 6,
            'actividad_id' => 7,
            'documento' => 'https://drive.google.com/document/d/od4HPCv58Um',
            'fecha' => '03/04/2023',
            'docente_validador' => 7
        ],
        [
            'estudiante_id' => 7,
            'actividad_id' => 8,
            'documento' => 'https://drive.google.com/document/d/IKGrcD4NOAU',
            'fecha' => '08/05/2023',
            'docente_validador' => 8
        ],
        [
            'estudiante_id' => 8,
            'actividad_id' => 9,
            'documento' => 'https://drive.google.com/document/d/SLf3GPgs1CN',
            'fecha' => '13/06/2023',
            'docente_validador' => 9
        ],
        [
            'estudiante_id' => 9,
            'actividad_id' => 10,
            'documento' => 'https://drive.google.com/document/d/EUV2MlPzwZ0',
            'fecha' => '18/07/2023',
            'docente_validador' => 10
        ],
        [
            'estudiante_id' => 10,
            'actividad_id' => 1,
            'documento' => 'https://drive.google.com/document/d/bDO6iEqkWuK',
            'fecha' => '23/08/2023',
            'docente_validador' => 1
        ],
    ];

}

