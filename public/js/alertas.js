
    function ponleFocus(){        
        document.getElementById("vote1").focus();
    }
    
    window.addEventListener('focusV1', event => {        
        ponleFocus();
    });

    window.addEventListener('alerta-exito', (event) => {                
        const boletas = event.detail[0].boletas;                   
        Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: 'Boleta ' + boletas,
            confirmButtonText: "ACEPTAR",
            customClass: {
                title: 'swal-tittle-lg',
                htmlContainer: 'swal-text-lg',
                confirmButton: 'swal-btn-lg'                
            },
            didClose: () => {
                Livewire.dispatch('focusV1');
            }
        });  
        
    });

    window.addEventListener('alerta-exito2', (event) => {                
        const boletas = event.detail[0].boletas;
        console.log(boletas);
        //ponleFocus();
        Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: 'Boleta '+boletas+'',                        
        }).then(() => {            
            //ponleFocus();            
        });        
        
    });

    window.addEventListener('alerta-error', event => {
        ponleFocus();
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Los datos no coinciden, intenta nuevamente.',
            confirmButtonText: "Aceptar",
            customClass: {
                title: 'swal-tittle-lg',
                htmlContainer: 'swal-text-lg',
                confirmButton: 'swal-btn-lg'                
            },
        }).then(() => {            
            ponleFocus();            
        });        
    }); 
    
    /* function ajustarTamanio(input){
        const largo = input.value.length;

        if (largo === 3 || largo === 4 || largo ===5) {
            input.classList.add('input-pequeno');
        } else {
            input.classList.remove('input-pequeno');
        }
    }
     */

    