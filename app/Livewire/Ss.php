<?php

namespace App\Livewire;

use App\Models\Casilla;
use App\Models\Error;
use App\Models\RNU;
use App\Models\SS as ModelsSS;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Ss extends Component
{
    public $form= [
        'V1' => '',
        'V2' => '',
    ];
    public $tipoB;    
    public $casilla;
    public $boletas=0;
    public $capturas = [];
    public $coincide = false;
    public $cap='Nueva Boleta';
    public $isDisabled=false;

    public function capturaSS()
    {
        if($this->tipoB==2){
            /* RNU::create([
                'eleccion' => 'SS',
                'casilla'  => $this->casilla,
            ]); */
            ModelsSS::create([
                'V1' => '-',
                'V2' => '-',
                'user_id' => Auth::user()->id,
                'status' => 'N',
                'casilla' => $this->casilla
            ]);
            $this->tipoB=1;
            $this->dispatch('alerta-exito', ['boletas' => ($this->boletas + 1)]);
        }elseif($this->tipoB==3){
            ModelsSS::create([
                'V1' => '.',
                'V2' => '.',
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
            ];
            $this->cap='Validacion de Captura';
            $this->isDisabled=true;
            if(count($this->capturas)==2)
            {
                $this->cap='Nueva Boleta';                
                if($this->comparar())
                {
                    //Guardar Datos en la tabla de boletas SS
                    ModelsSS::create([
                        'V1' => $this->capturas[0]['V1'],
                        'V2' => $this->capturas[0]['V2'],                    
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
                        'eleccion' => 'SS',
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
        $this->boletas=ModelsSS::where('casilla', $this->casilla)->get()->count();
        return view('livewire.ss');
    }
}
