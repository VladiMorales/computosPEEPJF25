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

function tipoC(){
    var selectTipo = document.getElementById('tipo');
    var seccion = document.getElementById('seccion');
    var casilla = document.getElementById('casilla');

    var c=seccion.value+selectTipo.value;

    var inGrupo = document.getElementById('grupo');

    //Asignar valor de casilla
    casilla.value=c;
    inGrupo.innerHTML = '';
    //Grupo 1
    if(c=='163B' || c=='163C1' || c=='164B' || c=='164C1' || c=='165B' || c=='166B' || c=='167B' || c=='168B' || c=='169B' || c=='170B'){
        opciones = [            
            { texto: '1', valor: '1' },            
        ];
        
        opciones.forEach(opcion => {
            const optionElement = document.createElement('option');
            optionElement.text = opcion.texto;
            optionElement.value = opcion.valor;
            inGrupo.add(optionElement);
        });        
        inGrupo.disabled=true;
    }

    //Grupo 2
    if(c=='171B' || c=='172B' || c=='173B' || c=='174B' || c=='175B' || c=='176B' || c=='177B' || c=='178B' || c=='179B' || c=='180B'){
        opciones = [            
            { texto: '2', valor: '2' },            
        ];
        
        opciones.forEach(opcion => {
            const optionElement = document.createElement('option');
            optionElement.text = opcion.texto;
            optionElement.value = opcion.valor;
            inGrupo.add(optionElement);
        });        
        inGrupo.disabled=true;
    }
    
    //Grupo 3
    if(c=='181B' || c=='182B' || c=='183B' || c=='184B' || c=='184C1' || c=='185B' || c=='533B' || c=='534B' || c=='535B' || c=='536B'){
        opciones = [            
            { texto: '3', valor: '3' },            
        ];
        
        opciones.forEach(opcion => {
            const optionElement = document.createElement('option');
            optionElement.text = opcion.texto;
            optionElement.value = opcion.valor;
            inGrupo.add(optionElement);
        });        
        inGrupo.disabled=true;
    }
    
    //grupo 4
    if(c=='536C1' || c=='781B' || c=='1247B' || c=='1248B' || c=='1249B' || c=='1251B' || c=='1252B' || c=='1253B' || c=='1254B' || c=='1255B'){
        opciones = [            
            { texto: '4', valor: '4' },            
        ];
        
        opciones.forEach(opcion => {
            const optionElement = document.createElement('option');
            optionElement.text = opcion.texto;
            optionElement.value = opcion.valor;
            inGrupo.add(optionElement);
        });        
        inGrupo.disabled=true;
    }
    

    //Grupo 5
    if(c=='1256B' || c=='1257B' || c=='1258B' || c=='1259B' || c=='2139B' || c=='2140B' || c=='2141B' || c=='2354B' || c=='2354C1' || c=='2355B'){
        opciones = [            
            { texto: '5', valor: '5' },            
        ];
        
        opciones.forEach(opcion => {
            const optionElement = document.createElement('option');
            optionElement.text = opcion.texto;
            optionElement.value = opcion.valor;
            inGrupo.add(optionElement);
        });        
        inGrupo.disabled=true;
    }
    

    

}