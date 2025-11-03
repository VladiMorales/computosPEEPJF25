<?php

namespace App\Livewire;

use App\Models\Casilla;
use App\Models\Error;
use App\Models\RNU;
use App\Models\TDJ as ModelsTDJ;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Tdj extends Component
{

    public $form= [
        'V1' => '',
        'V2' => '',
        'V3' => '',
        'V4' => '',
        'V5' => '',               
    ];
    public $tipoB;
    public $casilla;
    public $boletas;
    public $capturas = [];
    public $coincide = false;
    public $cap='Nueva Boleta';
    public $isDisabled=false;
    
    public function capturaTDJ()
    {
        if($this->tipoB==2){
            /* RNU::create([
                'eleccion' => 'TDJ',
                'casilla'  => $this->casilla,
            ]); */
            ModelsTDJ::create([
                'V1' => '-',
                'V2' => '-',
                'V3' => '-',
                'V4' => '-',
                'V5' => '-',
                'user_id' => Auth::user()->id,
                'status' => 'N',
                'casilla' => $this->casilla
            ]);
            $this->tipoB=1;
            $this->dispatch('alerta-exito', ['boletas' => ($this->boletas + 1)]);
        }elseif($this->tipoB==3){
            ModelsTDJ::create([
                'V1' => '.',
                'V2' => '.',
                'V3' => '.',
                'V4' => '.',
                'V5' => '.',
                'user_id' => Auth::user()->id,
                'status' => 'N',
                'casilla' => $this->casilla
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
            ];
            $this->cap='Validacion de Captura';
            $this->isDisabled=true;
            if(count($this->capturas)==2)
            {
                $this->cap='Nueva Boleta';
                if($this->comparar())
                {
                    ModelsTDJ::create([
                        'V1' => $this->capturas[0]['V1'],
                        'V2' => $this->capturas[0]['V2'],
                        'V3' => $this->capturas[0]['V3'],
                        'V4' => $this->capturas[0]['V4'],
                        'V5' => $this->capturas[0]['V5'],
                        'user_id' => Auth::user()->id,
                        'status' => 'N',
                        'casilla' => $this->casilla
                    ]);
                    //limpiar el arreglo para que no detecte como siguiente captura            
                    $this->capturas = [];
                    $this->isDisabled=false;
                    // Enviar alerta a la vista                
                    $this->dispatch('alerta-exito', ['boletas' => ($this->boletas + 1)]);
                }else{                        
                    Error::create([
                        'eleccion' => 'TDJ',
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
        $this->boletas=ModelsTDJ::where('casilla', $this->casilla)->get()->count();
        return view('livewire.tdj');
    }
}
