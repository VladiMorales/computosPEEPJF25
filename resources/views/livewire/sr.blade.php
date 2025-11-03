<div>
    <h3>Casilla: {{$casilla}}</h3>
    <h3>Boletas registradas: {{ $boletas }}</h3>
    <form wire:submit.prevent='capturaSR'>
        <div class="alinear">
            <div class="check">  
                <label for="opciones">Tipo de Boleta:</label>    
            
                <select id="tipoBoleta" onchange="desInputSR()" class="opciones tamaño" name="opciones" wire:model='tipoB' @if($isDisabled) disabled @endif>
                    <option value="1">Boleta Capturable</option>
                    <option value="2">Boleta con RNU</option>
                    <option value="3">Boleta Nula</option>
                </select>                       
            </div>
            <p class="nueva">{{$cap}}</p>
        </div>               
            <h2 id="hm" class="bg-m">MUJERES</h2>
            <div id="vm" class="votos">
                <div class="row">
                    <input          
                        class="input-text mujeres"
                        maxlength='2'  
                        type="text" 
                        id="vote1" 
                        inputmode="decimal"
                        pattern="[0-9\-\.]*"
                        wire:model='form.V1'
                        required
                    >
                    <input          
                        class="input-text mujeres"
                        maxlength='2'
                        type="text" 
                        id="vote2" 
                        inputmode="decimal"
                        pattern="[0-9\-\.]*"
                        wire:model='form.V2'
                        required
                    >                
                </div>
            </div>
            <h2 id="hh" class="bg-h">HOMBRES</h2>
            <div id="vh" class="votos">
                <div class="row">
                    <input          
                        class="input-text hombres"
                        maxlength='2'
                        type="text" 
                        id="vote3" 
                        inputmode="decimal"
                        pattern="[0-9\-\.]*"
                        wire:model='form.V3'
                        required
                    >                       
                </div>
            </div>   
        <div class="alinear flex">
            <input class="boton" type="submit" value="Registrar Boleta">
        </div>
    </form>
</div>