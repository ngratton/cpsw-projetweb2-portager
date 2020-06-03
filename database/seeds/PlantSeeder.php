<?php

use Illuminate\Database\Seeder;

class PlantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
           
        $row = 1;
        if (($handle = fopen("DB-plants.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                
                $row++;
                                                        
                    DB::table('plants')->insert([
                        'type' => $data[0],
                        'nom' => $data[1],
                        'description' => $data[2],
                        'cm_entre_plants' => $data[3],
                        'cm_entre_rangs' => $data[3],
                        'jours_maturation' => $data[5],
                        'voisinage_fav' => $data[6],
                        'remarques' => $data[7],
                        'images' => $data[8],
                    ]);
            
             }
        
        }
        
        fclose($handle);
    }
    }

