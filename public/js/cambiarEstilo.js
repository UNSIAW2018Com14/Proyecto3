var estilo;

$(function(){
    
    var recuperarEstilo = recuperarEstiloDesdeLocalStorage();
    
    if (recuperarEstilo == undefined)
        setEstilo(0);
    else 
        estilo = recuperarEstilo;

    $("#btnEstilo").click(function() {
       guardarEstiloEnLocalStorage(estilo);
       estilo = setEstilo(estilo);
    });

});


function setEstilo(estilo){
    if(estilo==0){ 
        $("link[href='css/estilo.css']").attr("href", "css/estilo2.css");
        estilo = 1;
    }
    else{
        $("link[href='css/estilo2.css']").attr("href", "css/estilo.css");
        estilo=0;
    }
    return estilo;
}


function guardarEstiloEnLocalStorage(estilo) {
    localStorage.setItem("estilo", estilo);        
}

function recuperarEstiloDesdeLocalStorage(){
    var toReturn = window.localStorage.getItem("estilo");
    return toReturn;
}

