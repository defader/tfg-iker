window.addEventListener("load",initEventos)
const $ = id => document.getElementById(id)



function initEventos(){
    $("upload").addEventListener("click",()=>{
        $("PGNfile").style.opacity="1"
        let input = document.getElementById('PGNfile');
        let file = input.files[0];
        let reader = new FileReader();
        console.log("d ")
        reader.onload = function(e) {
          let fileContent = e.target.result;
          let fileContentDiv = document.getElementById('pgn');
          fileContentDiv.innerText = fileContent;
        };
      
        reader.readAsText(file);
    })

    
}
function readFile(input) {
    let file = input.files[0]; 
    let fileReader = new FileReader(); 
    fileReader.readAsText(file); 
    fileReader.onload = function() {
      document.getElementById("pgn").innerText = fileReader.result
    }; 
    fileReader.onerror = function() {
      alert(fileReader.error);
    }; 
  }

function download(){
    const link = document.createElement("a");
    const pgn = document.querySelector("#pgn").value;
    link.setAttribute("href","data:text/plain;charset=utf-8,"+encodeURIComponent(pgn));
    link.setAttribute("download","partida.pgn");
    link.click();
}