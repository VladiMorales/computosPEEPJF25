<div>
    <h3>Casilla: {{$casilla}}</h3>
    <h3>Boletas registradas: {{ $boletas }}</h3>
    <form wire:submit.prevent='capturaJD'>
        <div class="alinear">
            <div class="check">  
                <!-- <input 
                    type="checkbox" 
                    class="box" 
                    id="check" 
                    onclick="desInputJD()"
                    wire:model='check'>              
                <label class="vol" for="check">Boleta con RNU</label><br> -->
                <label for="opciones">Tipo de Boleta:</label>
                
                <select id="tipoBoleta" onchange="desInputJD()" class="opciones tamaño" name="opciones" wire:model='tipoB' @if($isDisabled) disabled @endif>
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
                    <input          
                        class="input-text mujeres"
                        maxlength='2'
                        type="text" 
                        id="vote3" 
                        inputmode="decimal"
                        pattern="[0-9\-\.]*"
                        wire:model='form.V3'
                        required
                    >
                    <input          
                        class="input-text mujeres"
                        maxlength='2'
                        type="text" 
                        id="vote4" 
                        inputmode="decimal"
                        pattern="[0-9\-\.]*"
                        wire:model='form.V4'
                        required
                    >
                    <input          
                        class="input-text mujeres"
                        maxlength='2'
                        type="text" 
                        id="vote5" 
                        inputmode="decimal"
                        pattern="[0-9\-\.]*"
                        wire:model='form.V5'
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
                        id="vote6" 
                        inputmode="decimal"
                        pattern="[0-9\-\.]*"
                        wire:model='form.V6'
                        required
                    >  

                    <input          
                        class="input-text hombres"
                        maxlength='2'
                        type="text" 
                        id="vote7" 
                        inputmode="decimal"
                        pattern="[0-9\-\.]*"
                        wire:model='form.V7'
                        required
                    >
                    <input          
                        class="input-text hombres"
                        maxlength='2'
                        type="text" 
                        id="vote8" 
                        inputmode="decimal"
                        pattern="[0-9\-\.]*"
                        wire:model='form.V8'
                        required
                    > 
                    <input          
                        class="input-text hombres"
                        maxlength='2' 
                        type="text" 
                        id="vote9" 
                        inputmode="decimal"
                        pattern="[0-9\-\.]*"
                        wire:model='form.V9'
                        required
                    >
                    <input          
                        class="input-text hombres"
                        maxlength='2' 
                        type="text" 
                        id="vote10" 
                        inputmode="decimal"
                        pattern="[0-9\-\.]*"
                        wire:model='form.V10'
                        required
                    >   
                    
                </div>
            </div>   
        <div class="alinear flex">
            <input class="boton" type="submit" value="Registrar Boleta">
        </div>
    </form>
</div>