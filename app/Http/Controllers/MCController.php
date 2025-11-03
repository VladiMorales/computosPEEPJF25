<?php

namespace App\Http\Controllers;

use App\Models\Mc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MCController extends Controller
{
    //
    public function index($casilla)
    {
        return view('elecciones.MC', ['casilla' => $casilla]);
    }

    public function resultados()
    {
        $this->validar();
        $mujeres=DB::select('CALL votos_MujeresMC()');
        $hombres=DB::select('CALL votos_HombresMC()');
        $blanco=DB::select("SELECT COUNT(*) AS blanco FROM VOTOSMC WHERE STATUS='B'");
        $ilegibles=DB::select("SELECT COUNT(*) AS ilegible FROM VOTOSMC WHERE STATUS='I'");
        $nulos=DB::select("SELECT COUNT(*) AS nulos FROM VOTOSMC WHERE STATUS='N'");
        $bol=DB::select("SELECT COUNT(*) as boletas from mc");
        $bolRNU=DB::select("SELECT COUNT(*) as boletas FROM rnu WHERE eleccion='MC'");
        $boletas=$bol[0]->boletas + $bolRNU[0]->boletas;
        $datos = [
            'mujeres'  => $mujeres,
            'hombres'  => $hombres,
            'blanco'   => $blanco[0]->blanco, 
            'ilegibles'=> $ilegibles[0]->ilegible,        
            'nulos'    => $nulos[0]->nulos,
            'bolRNU'   => $bolRNU[0]->boletas,
            'boletas'  => $boletas
        ];
        return view('resultados.MC', $datos);
    }

    public function validar()
    {
        $votos=Mc::where('status', 'N')->get()->values();
        //dd($votos);
        if($votos){     
            //Recorrer array de BD       
            for($i=0; $i<count($votos); $i++){                                
                $mujeres=0;
                $hombres=0;
                //Recorre los votos de una boleta
                for($j=1; $j<=8; $j++){
                    $voto=$votos[$i]['V'.$j];
                    $idB=$votos[$i]['id'];
                    $casilla=$votos[$i]['casilla'];
                    
                    if($voto=='-'){
                        $this->insertVotos($voto, 'B', $idB, $casilla);
                    }elseif($voto=='.'){
                        $this->insertVotos($voto, 'I', $idB, $casilla);
                    }else{
                        
                        if($voto<=21){
                            if($mujeres<4){
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
                        }elseif($voto<=42){
                            if($hombres<4){
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
                    Mc::where('id', $votos[$i]['id'])->update(['status'=>'S']);

                }
            }
        }          
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
        DB::table('votosmc')->insert
        ([
            'voto' => $voto,
            'status' => $status,
            'mc_id' => $idBoleta, 
            'casilla' => $casilla,           
        ]);
    }
}
