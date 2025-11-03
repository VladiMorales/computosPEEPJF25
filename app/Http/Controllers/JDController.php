<?php

namespace App\Http\Controllers;

use App\Models\JD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JDController extends Controller
{
    public function index($casilla)
    {
        return view('elecciones.JD',  ['casilla' => $casilla]);
    }

    public function resultados()
    {
        $this->validar();
        $mujeres=DB::select('CALL votos_MujeresJD()');
        $hombres=DB::select('CALL votos_HombresJD()');
        $blanco=DB::select("SELECT COUNT(*) AS blanco FROM VOTOSJD WHERE STATUS='0'");
        $ilegibles=DB::select("SELECT COUNT(*) AS ilegible FROM VOTOSJD WHERE STATUS='I'");
        $nulos=DB::select("SELECT COUNT(*) AS nulos FROM VOTOSJD WHERE STATUS='N'");
        $bol=DB::select("SELECT COUNT(*) as boletas from jd");
        $bolRNU=DB::select("SELECT COUNT(*) as boletas FROM rnu WHERE eleccion='JD'");
        $boletas=$bol[0]->boletas + $bolRNU[0]->boletas;
        $datos = [
            'mujeres' => $mujeres,
            'hombres' => $hombres,
            'blanco'   => $blanco[0]->blanco, 
            'ilegibles'=> $ilegibles[0]->ilegible,        
            'nulos'    => $nulos[0]->nulos,
            'bolRNU'   => $bolRNU[0]->boletas,
            'boletas'  => $boletas,
        ];
        return view('resultados.JD', $datos);
    }    

    public function validar()
    {
        $votos=JD::where('status', 'N')->get()->values();
        //dd($votos);
        if($votos){     
            //Recorrer array de BD       
            for($i=0; $i<count($votos); $i++){                                
                $mujeres=0;
                $hombres=0;
                //Recorre los votos de una boleta
                for($j=1; $j<=10; $j++){
                    $voto=$votos[$i]['V'.$j];
                    $idB=$votos[$i]['id'];
                    $casilla = $votos[$i]['casilla'];
                    if($voto=='-'){
                        $this->insertVotos($voto, 'B', $idB, $casilla);
                    }elseif($voto=='.'){
                        $this->insertVotos($voto, 'I', $idB, $casilla);
                    }else
                    {
                        
                        if($voto<=35){
                            if($mujeres<5){
                                //Insertar Voto de mujer
                                if($this->compararAnteriores($j, $votos[$i], $voto)){
                                    $this->insertVotos($voto, 'V', $idB, $casilla);
                                    $mujeres++;    
                                }else{
                                    $this->insertVotos($voto, 'N', $idB, $casilla);    
                                }
                            }else{
                                $this->insertVotos($voto, 'N', $idB, $casilla);
                            }
                        }elseif($voto<=70){
                            if($hombres<5){
                                //Insertar Voto Hombre
                                if($this->compararAnteriores($j, $votos[$i], $voto)){
                                    $this->insertVotos($voto, 'V', $idB, $casilla);  
                                    $hombres++;
                                }else{
                                    $this->insertVotos($voto, 'N', $idB, $casilla);        
                                }
                            }else{
                                $this->insertVotos($voto, 'N', $idB, $casilla);
                            }
                        }else{
                            $this->insertVotos($voto, 'N', $idB, $casilla);
                        }
                    }
                    //Cambiar el estatus de la boleta a validado
                    JD::where('id', $votos[$i]['id'])->update(['status'=>'S']);

                }
            }
        }  
        //echo('Se termino el proceso');      
    }

    public function compararAnteriores($j, $votos, $voto){
        if($j==1){
            return true;
        }else{
            $c=1;
            for($i=1; $i<$j && $c<$j; $i++){
                if($votos['V'.$i]!=$voto){
                    $c++;
                }else{
                    return false;
                }
                
                if($c==$j){
                    return true;
                }
            }
        }
    }

    public function insertVotos($voto, $status, $idBoleta, $casilla)
    {        
        DB::table('votosjd')->insert
        ([
            'voto' => $voto,
            'status' => $status,
            'jd_id' => $idBoleta,     
            'casilla' => $casilla,       
        ]);
    }
}
