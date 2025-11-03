
function desInputsSCJN(){
    var tipoBoleta=document.getElementById("tipoBoleta");
    var tipo=tipoBoleta.value;

    var hm=document.getElementById("hm");
    var vm=document.getElementById("vm");
    var hh=document.getElementById("hh");
    var vh=document.getElementById("vh");

    v1=document.getElementById("vote1");
    v2=document.getElementById("vote2");
    v3=document.getElementById("vote3");
    v4=document.getElementById("vote4");
    v5=document.getElementById("vote5");
    v6=document.getElementById("vote6");
    v7=document.getElementById("vote7");
    v8=document.getElementById("vote8");
    v9=document.getElementById("vote9");

        if(tipo!=1){
            v1.value="";
            v2.value="";            
            v3.value="";
            v4.value="";
            v5.value="";
            v6.value="";
            v7.value="";
            v8.value="";
            v9.value="";

            v1.disabled=true;
            v2.disabled=true;
            v3.disabled=true;
            v4.disabled=true;
            v5.disabled=true;
            v6.disabled=true;
            v7.disabled=true;
            v8.disabled=true;
            v9.disabled=true;

            hm.classList.add('disp-none');
            vm.classList.add('disp-none');
            hh.classList.add('disp-none');
            vh.classList.add('disp-none');

        }else{
            v1.disabled=false;
            v2.disabled=false;
            v3.disabled=false;
            v4.disabled=false;
            v5.disabled=false;
            v6.disabled=false;
            v7.disabled=false;            
            v8.disabled=false;
            v9.disabled=false;
            
            hm.classList.remove('disp-none');
            vm.classList.remove('disp-none');
            hh.classList.remove('disp-none');
            vh.classList.remove('disp-none');
        }
}

function desInputTDJ(){
    var tipoBoleta=document.getElementById("tipoBoleta");
    var tipo=tipoBoleta.value;    

    var hm=document.getElementById("hm");
    var vm=document.getElementById("vm");
    var hh=document.getElementById("hh");
    var vh=document.getElementById("vh");

    v1=document.getElementById("vote1");
    v2=document.getElementById("vote2");
    v3=document.getElementById("vote3");
    v4=document.getElementById("vote4");
    v5=document.getElementById("vote5");
    
        
        if(tipo!=1){
            v1.value="";
            v2.value="";            
            v3.value="";
            v4.value="";
            v5.value="";

            v1.disabled=true;
            v2.disabled=true;
            v3.disabled=true;
            v4.disabled=true;
            v5.disabled=true;

            hm.classList.add('disp-none');
            vm.classList.add('disp-none');
            hh.classList.add('disp-none');
            vh.classList.add('disp-none');
        }else{
            v1.disabled=false;
            v2.disabled=false;
            v3.disabled=false;
            v4.disabled=false;
            v5.disabled=false;

            hm.classList.remove('disp-none');
            vm.classList.remove('disp-none');
            hh.classList.remove('disp-none');
            vh.classList.remove('disp-none');
        }
}

function desInputSS(){
    var tipoBoleta=document.getElementById("tipoBoleta");
    var tipo=tipoBoleta.value;  

    var hm=document.getElementById("hm");
    var vm=document.getElementById("vm");
    var hh=document.getElementById("hh");
    var vh=document.getElementById("vh");

    v1=document.getElementById("vote1");
    v2=document.getElementById("vote2");        
        
        if(tipo!=1){
            v1.value="";
            v2.value="";                        

            v1.disabled=true;
            v2.disabled=true;

            hm.classList.add('disp-none');
            vm.classList.add('disp-none');
            hh.classList.add('disp-none');
            vh.classList.add('disp-none');
        }else{
            v1.disabled=false;
            v2.disabled=false;

            hm.classList.remove('disp-none');
            vm.classList.remove('disp-none');
            hh.classList.remove('disp-none');
            vh.classList.remove('disp-none');
        }
}

function desInputSR(){
    var tipoBoleta=document.getElementById("tipoBoleta");
    var tipo=tipoBoleta.value;

    var hm=document.getElementById("hm");
    var vm=document.getElementById("vm");
    var hh=document.getElementById("hh");
    var vh=document.getElementById("vh");


    v1=document.getElementById("vote1");
    v2=document.getElementById("vote2");
    v3=document.getElementById("vote3");
        

        if(tipo!=1){
            v1.value="";
            v2.value="";            
            v3.value="";            

            v1.disabled=true;
            v2.disabled=true;
            v3.disabled=true;

            hm.classList.add('disp-none');
            vm.classList.add('disp-none');
            hh.classList.add('disp-none');
            vh.classList.add('disp-none');
        }else{
            v1.disabled=false;
            v2.disabled=false;
            v3.disabled=true;

            hm.classList.remove('disp-none');
            vm.classList.remove('disp-none');
            hh.classList.remove('disp-none');
            vh.classList.remove('disp-none');
        }
}

function desInputMC(){
    var tipoBoleta=document.getElementById("tipoBoleta");
    var tipo=tipoBoleta.value;

    var hm=document.getElementById("hm");
    var vm=document.getElementById("vm");
    var hh=document.getElementById("hh");
    var vh=document.getElementById("vh");


    v1=document.getElementById("vote1");
    v2=document.getElementById("vote2");
    v3=document.getElementById("vote3");
    v4=document.getElementById("vote4");
    v5=document.getElementById("vote5");
    v6=document.getElementById("vote6");
    v7=document.getElementById("vote7");
    v8=document.getElementById("vote8");
    v9=document.getElementById("vote9");
    
        
        if(tipo!=1){
            v1.value="";
            v2.value="";            
            v3.value="";
            v4.value="";
            v5.value="";
            v6.value="";
            v7.value="";
            v8.value="";
            v9.value="";

            v1.disabled=true;
            v2.disabled=true;
            v3.disabled=true;
            v4.disabled=true;
            v5.disabled=true;
            v6.disabled=true;
            v7.disabled=true;
            v8.disabled=true;
            v9.disabled=true;

            hm.classList.add('disp-none');
            vm.classList.add('disp-none');
            hh.classList.add('disp-none');
            vh.classList.add('disp-none');
        }else{
            v1.disabled=false;
            v2.disabled=false;
            v3.disabled=false;
            v4.disabled=false;
            v5.disabled=false;
            v6.disabled=false;
            v7.disabled=false;
            v8.disabled=false;
            v9.disabled=false;

            hm.classList.remove('disp-none');
            vm.classList.remove('disp-none');
            hh.classList.remove('disp-none');
            vh.classList.remove('disp-none');
        }
}

function desInputJD(){
    var tipoBoleta=document.getElementById("tipoBoleta");
    var tipo=tipoBoleta.value;

    var hm=document.getElementById("hm");
    var vm=document.getElementById("vm");
    var hh=document.getElementById("hh");
    var vh=document.getElementById("vh");


    v1=document.getElementById("vote1");
    v2=document.getElementById("vote2");
    v3=document.getElementById("vote3");
    v4=document.getElementById("vote4");
    v5=document.getElementById("vote5");
    v6=document.getElementById("vote6");
    v7=document.getElementById("vote7");
    v8=document.getElementById("vote8");
    v9=document.getElementById("vote9");
    v10=document.getElementById("vote10");   
    
        
        if(tipo!=1){
            v1.value="";
            v2.value="";            
            v3.value="";
            v4.value="";
            v5.value="";
            v6.value="";
            v7.value="";
            v8.value="";
            v9.value="";
            v10.value="";           

            v1.disabled=true;
            v2.disabled=true;
            v3.disabled=true;
            v4.disabled=true;
            v5.disabled=true;
            v6.disabled=true;
            v7.disabled=true;
            v8.disabled=true;
            v9.disabled=true;
            v10.disabled=true;            

            hm.classList.add('disp-none');
            vm.classList.add('disp-none');
            hh.classList.add('disp-none');
            vh.classList.add('disp-none');
        }else{
            v1.disabled=false;
            v2.disabled=false;
            v3.disabled=false;
            v4.disabled=false;
            v5.disabled=false;
            v6.disabled=false;
            v7.disabled=false;
            v8.disabled=false;
            v9.disabled=false;
            v10.disabled=false;           

            hm.classList.remove('disp-none');
            vm.classList.remove('disp-none');
            hh.classList.remove('disp-none');
            vh.classList.remove('disp-none');
        }
}