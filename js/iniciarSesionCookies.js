window.addEventListener("load",initEventos)
const $ = id => document.getElementById(id)
function initEventos(){

    let cookies = document.cookie
    if (cookies.length>0) {
        $("aviso-cookies").style.display="none"
        $("fondo-aviso-cookies").style.display="none"
        //----------------------------------------------
        $("navConCookies").style.display="block"
        $("navSinCookies").style.display="none"

    }
    
    $("btn-aceptar-cookies").addEventListener("click",()=>{
        $("aviso-cookies").style.display="none"
        $("fondo-aviso-cookies").style.display="none"
        document.cookie = "username=user; max-age=31536000; path=/"
    })
    

}