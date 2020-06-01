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
        $file = fopen("DB-plants.csv","r");
           
        $row = 1;
        if (($handle = fopen("DB-plants.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                
                $row++;
                                                        
                    DB::table('plants')->insert([
                        'type' => $data[1],
                        'nom' => $data[2],
                        'description' => $data[3],
                        'cm_entre_plants' => $data[4],
                        'cm_entre_rangs' => $data[5],
                        'jours_maturation' => $data[6],
                        'voisinage_fav' => $data[6],
                        'remarques' => $data[8],
                        'images' => $data[9],
                    ]);
            
             }
        
        }
        
        fclose($handle);
    }
    }

