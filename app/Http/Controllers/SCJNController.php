<?php

namespace App\Http\Controllers;

use App\Models\Casilla;
use App\Models\SCJN;
use App\Models\VotosSCJN;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SCJNController extends Controller
{
    //
    public function index($casilla)
    {        
        return view('elecciones.SCJN', ['casilla' => $casilla]);
    }

    public function resultados()
    {
        $this->validar();
        $casillas=Casilla::orderBy('seccion', 'ASC')->get();
        $mujeres=DB::select('CALL contar_votos_MujeresSCJN()');
        $hombres=DB::select('CALL contar_votos_HombreSCJN()');
        $blanco=DB::select("SELECT COUNT(*) AS blanco FROM VOTOSSCJN WHERE STATUS='B'");      
        $ilegibles=DB::select("SELECT COUNT(*) AS ilegible FROM VOTOSSCJN WHERE STATUS='I'");
        $nulos=DB::select("SELECT COUNT(*) AS nulos FROM VOTOSSCJN WHERE STATUS='N'");
        $bol=DB::select("SELECT COUNT(*) as boletas FROM scjn");
        $bolRNU=DB::select("SELECT COUNT(*) as boletas FROM rnu WHERE eleccion='SCJN'");
        $boletas=$bol[0]->boletas + $bolRNU[0]->boletas;
        $datos = [
            'mujeres'  => $mujeres,
            'hombres'  => $hombres,
            'blanco'   => $blanco[0]->blanco, 
            'ilegibles'=> $ilegibles[0]->ilegible,        
            'nulos'    => $nulos[0]->nulos,
            'bolRNU'   => $bolRNU[0]->boletas,
            'boletas'  => $boletas,
            'casillas' => $casillas,
        ];
        return view('resultados.SCJN', $datos);
    }

    public function validar()
    {
        $votos=SCJN::where('status', 'N')->get()->values();
        //dd($votos);
        if($votos){     
            //Recorrer array de BD       
            for($i=0; $i<count($votos); $i++){                                
                $mujeres=0;
                $hombres=0;
                //Recorre los votos de una boleta
                for($j=1; $j<=9; $j++){
                    $voto=$votos[$i]['V'.$j];
                    $idB=$votos[$i]['id'];
                    $casilla=$votos[$i]['casilla'];                    
                    if($voto=='-'){
                        //Voto en blanco
                        $this->insertVotos($voto, 'B', $idB, $casilla);
                    //Nulo Ilegible
                    }elseif($voto=='.'){
                        $this->insertVotos($voto, 'I', $idB, $casilla);
                        
                    }else{  
                        if($voto<=48){
                            if($mujeres<5){
                                //Insertar Voto de mujer
                                if($this->compararAnteriores($j, $votos[$i], $voto)){
                                    $this->insertVotos($voto, 'V', $idB, $casilla);
                                    $mujeres++;    
                                }else{
                                    //Voto Nulo Repetido
                                    $this->insertVotos($voto, 'N', $idB, $casilla);    
                                }
                            }else{
                                //Nulo rebaso la cuota
                                $this->insertVotos($voto, 'N', $idB, $casilla);
                            }
                        }elseif($voto<=84){                            
                            if($hombres<4){
                                //Insertar Voto Hombre
                                if($this->compararAnteriores($j, $votos[$i], $voto)){
                                    $this->insertVotos($voto, 'V', $idB, $casilla);  
                                    $hombres++;
                                }else{
                                    //Nulo Repetido
                                    $this->insertVotos($voto, 'N', $idB, $casilla);        
                                }
                            }else{
                                //Nulo Rebaso la cuota
                                $this->insertVotos($voto, 'N', $idB, $casilla);
                            }
                        }else{
                            //Nulo no existe en la boleta o es ilegible 999
                            $this->insertVotos($voto, 'N', $idB, $casilla);
                            $mujeres++;
                        }
                    }
                    //Cambiar el estatus de la boleta a validado
                    SCJN::where('id', $votos[$i]['id'])->update(['status'=>'S']);

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
        DB::table('votosscjn')->insert
        ([
            'voto' => $voto,
            'status' => $status,
            'scjn_id' => $idBoleta,   
            'casilla' => $casilla         
        ]);
    }
}
