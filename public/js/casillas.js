function seccionS(seccion){
    var seccion=seccion;
    var selectTipo = document.getElementById('tipo');
    var inGrupo = document.getElementById('grupo');
    var opciones=[];

    inGrupo.innerHTML = '';
    selectTipo.innerHTML = '';
    if(seccion==163 || seccion==164 || seccion==184 || seccion==536 || seccion==2354){
        opciones = [
            { texto: '--Selecciona Casilla--', valor: '' },
            { texto: 'B', valor: 'B' },
            { texto: 'C1', valor: 'C1' },
        ];
    }else{
        opciones = [
            { texto: '--Selecciona Casilla--', valor: '' },
            { texto: 'B', valor: 'B' },        
        ];
    }

    opciones.forEach(opcion => {
        const optionElement = document.createElement('option');
        optionElement.text = opcion.texto;
        optionElement.value = opcion.valor;
        selectTipo.add(optionElement);
    });


}
