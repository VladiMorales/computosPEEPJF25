<?php

namespace App\Livewire;
use App\Models\Error;
use App\Models\RNU;
use App\Models\SCJN as ModelsSCJN;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class SCJN extends Component
{    
    
    public $form= [
        'V1' => '',
        'V2' => '',
        'V3' => '',
        'V4' => '',
        'V5' => '',
        'V6' => '',
        'V7' => '',
        'V8' => '',
        'V9' => ''
    ];
    public $tipoB;
    public $casilla;
    public $boletas=0;    
    public $capturas = [];
    public $coincide = false;
    public $cap='Nueva Boleta';
    public $isDisabled=false;
    

    public function capturaSCJN()
    {        
        if($this->tipoB==2){
            /* RNU::create([
                'eleccion' => 'SCJN',
                'casilla'  => $this->casilla,
            ]); */
            ModelsSCJN::create([
                'V1' => '-',
                'V2' => '-',
                'V3' => '-',
                'V4' => '-',
                'V5' => '-',
                'V6' => '-',
                'V7' => '-',
                'V8' => '-',
                'V9' => '-',
                'user_id' => Auth::user()->id,
                'status' => 'N',
                'casilla' => $this->casilla,
            ]);
            $this->tipoB=1;
            
            $this->dispatch('alerta-exito', ['boletas' => ($this->boletas + 1)]);        
        }elseif($this->tipoB==3){
            ModelsSCJN::create([
                'V1' => '.',
                'V2' => '.',
                'V3' => '.',
                'V4' => '.',
                'V5' => '.',
                'V6' => '.',
                'V7' => '.',
                'V8' => '.',
                'V9' => '.',
                'user_id' => Auth::user()->id,
                'status' => 'N',
                'casilla' => $this->casilla,
            ]);
            $this->tipoB=1;
            
            $this->dispatch('alerta-exito', ['boletas' => ($this->boletas + 1)]);  
        }else{
            //Guardar la primera captura
            $this->capturas[] = $this->form;

            //limpiar los datos para segunda captura
            $this->form = [
                'V1' => '',
                'V2' => '',
                'V3' => '',
                'V4' => '',
                'V5' => '',
                'V6' => '',
                'V7' => '',
                'V8' => '',
                'V9' => ''
            ];
            $this->cap='Validacion de Captura';
            $this->isDisabled=true;
            if(count($this->capturas)==2){
                $this->cap='Nueva Boleta';
                if($this->comparar()){                
                    //Guardar Datos en la tabla de boletas SCJN
                    ModelsSCJN::create([
                        'V1' => $this->capturas[0]['V1'],
                        'V2' => $this->capturas[0]['V2'],
                        'V3' => $this->capturas[0]['V3'],
                        'V4' => $this->capturas[0]['V4'],
                        'V5' => $this->capturas[0]['V5'],
                        'V6' => $this->capturas[0]['V6'],
                        'V7' => $this->capturas[0]['V7'],
                        'V8' => $this->capturas[0]['V8'],
                        'V9' => $this->capturas[0]['V9'],
                        'user_id' => Auth::user()->id,
                        'status' => 'N',
                        'casilla' => $this->casilla,
                    ]);
                    //limpiar el arreglo para que no detecte como siguiente captura            
                    $this->capturas = [];
                    $this->isDisabled=false;
                    // Enviar alerta a la vista                
                    $this->dispatch('alerta-exito', ['boletas' => ($this->boletas + 1)]);
                }else{                   
                    Error::create([
                        'eleccion' => 'SCJN',
                        'user_id' => Auth::user()->id
                    ]);
                    //limpiar el arreglo para que no detecte como siguiente captura            
                    $this->capturas = [];
                    $this->isDisabled=false;                    
                    // Enviar alerta a la vista
                    $this->dispatch('alerta-error');             
                }
            }else{
                $this->dispatch('focusV1');
            }
        }                                    
        
    }
    
    public function comparar()
    {        
        return $this->coincide = $this->capturas[0] == $this->capturas[1];        
    }

    public function render()
    {                   
        $this->boletas=ModelsSCJN::where('casilla', $this->casilla)->get()->count();
        return view('livewire.s-c-j-n');        
    }
}
