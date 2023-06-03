window.addEventListener("load",initEventos)
const $ = id => document.getElementById(id)

function initEventos(){
    $("olvidar").addEventListener("click",()=>{
        $("formulario").style.display="none"
        $("recuperarContrasena").style.display = "inline";
        
    })
    $("volver").addEventListener("click",()=>{
        $("formulario").style.display="inline"
        $("recuperarContrasena").style.display = "none";
    })
}