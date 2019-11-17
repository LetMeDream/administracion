<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Trabajo;

class TrabajosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $trabajo = new Trabajo;

        $trabajo->insert([
            array(
                'name' => 'Trámite',
                'user_id' => '1',
                'duration' => '12',
                'created_at' => Carbon::now()
            ),
            array(
                'name' => 'Hipoteca',
                'user_id' => '1',
                'duration' => '16',
                'created_at' => Carbon::now()
            ),
            array(
                'name' => 'Planilla 17',
                'user_id' => '2',
                'duration' => '4',
                'created_at' => Carbon::now()
            ),
            array(
                'name' => 'Damage control',
                'user_id' => '2',
                'duration' => '66',
                'created_at' => Carbon::now()
            ),
            array(
                'name' => 'Planeación',
                'user_id' => '3',
                'duration' => '45',
                'created_at' => Carbon::now()
            ),
            array(
                'name' => 'Derivación',
                'user_id' => '3',
                'duration' => '23',
                'created_at' => Carbon::now()
            ),
            array(
                'name' => 'Planeación',
                'user_id' => '3',
                'duration' => '24',
                'created_at' => Carbon::now()->addMonth()
            ),
            array(
                'name' => 'Derivación',
                'user_id' => '3',
                'duration' => '35',
                'created_at' => Carbon::now()->addMonth()
            ),
            array(
                'name' => 'Planeación',
                'user_id' => '3',
                'duration' => '24',
                'created_at' => Carbon::now()->subMonth()
            ),
            array(
                'name' => 'Derivación',
                'user_id' => '3',
                'duration' => '35',
                'created_at' => Carbon::now()->subMonth()
            ),
            array(
                'name' => 'Planeación',
                'user_id' => '2',
                'duration' => '24',
                'created_at' => Carbon::now()->addMonth()
            ),
            array(
                'name' => 'Archivación de documentos',
                'user_id' => '2',
                'duration' => '35',
                'created_at' => Carbon::now()->addMonth()
            ),
            array(
                'name' => 'Pensiones',
                'user_id' => '2',
                'duration' => '24',
                'created_at' => Carbon::now()->subMonth()
            ),
            array(
                'name' => 'Hipotecas',
                'user_id' => '2',
                'duration' => '35',
                'created_at' => Carbon::now()->subMonth()
            )
        ]);

    }
}
