<?php
namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 



class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $provincia = array();
        $i = 0;

        $i++;
        $provincia[$i][0]= 1;
        $provincia[$i][1]= 'BUENOS AIRES';
        $i++;
        $provincia[$i][0]= 10;
        $provincia[$i][1]= 'JUJUY';
        $i++;
        $provincia[$i][0]= 6;
        $provincia[$i][1]= 'CORDOBA';
        $i++;
        $provincia[$i][0]= 15;
        $provincia[$i][1]= 'NEUQUEN';
        $i++;
        $provincia[$i][0]= 21;
        $provincia[$i][1]= 'SANTA FE';
        $i++;
        $provincia[$i][0]= 3;
        $provincia[$i][1]= 'CATAMARCA';
        $i++;
        $provincia[$i][0]= 8;
        $provincia[$i][1]= 'ENTRE RIOS';
        $i++;
        $provincia[$i][0]= 14;
        $provincia[$i][1]= 'MISIONES';
        $i++;
        $provincia[$i][0]= 13;
        $provincia[$i][1]= 'MENDOZA';
        $i++;
        $provincia[$i][0]= 16;
        $provincia[$i][1]= 'RIO NEGRO';
        $i++;
        $provincia[$i][0]= 19;
        $provincia[$i][1]= 'SAN LUIS';
        $i++;
        $provincia[$i][0]= 20;
        $provincia[$i][1]= 'SANTA CRUZ';
        $i++;
        $provincia[$i][0]= 7;
        $provincia[$i][1]= 'CORRIENTES';
        $i++;
        $provincia[$i][0]= 4;
        $provincia[$i][1]= 'CHACO';
        $i++;
        $provincia[$i][0]= 11;
        $provincia[$i][1]= 'LA PAMPA';
        $i++;
        $provincia[$i][0]= 12;
        $provincia[$i][1]= 'LA RIOJA';
        $i++;
        $provincia[$i][0]= 5;
        $provincia[$i][1]= 'CHUBUT';
        $i++;
        $provincia[$i][0]= 18;
        $provincia[$i][1]= 'SAN JUAN';
        $i++;
        $provincia[$i][0]= 17;
        $provincia[$i][1]= 'SALTA';
        $i++;
        $provincia[$i][0]= 22;
        $provincia[$i][1]= 'SANTIAGO DEL ESTERO';
        $i++;
        $provincia[$i][0]= 24;
        $provincia[$i][1]= 'TUCUMAN';
        $i++;
        $provincia[$i][0]= 9;
        $provincia[$i][1]= 'FORMOSA';
        $i++;
        $provincia[$i][0]= 23;
        $provincia[$i][1]= 'TIERRA DEL FUEGO';
        $i++;
        $provincia[$i][0]= 2;
        $provincia[$i][1]= 'CAPITAL FEDERAL';


        $cantidad=$i;

        for($i=1;$i<=$cantidad;$i++){

            DB::table('provincias')->insert([
                'id' => $provincia[$i][0],
                'nombre' => $provincia[$i][1]
            ]);

        }
 
    }
}
