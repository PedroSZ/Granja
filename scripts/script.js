window.onload = function(){
  var fecha = new Date(); //Fecha actual
  var mes = fecha.getMonth()+1; //obteniendo mes
  var dia = fecha.getDate(); //obteniendo dia
  var ano = fecha.getFullYear(); //obteniendo año
  if(dia<10)
    dia='0'+dia; //agrega cero si el menor de 10
  if(mes<10)
    mes='0'+mes //agrega cero si el menor de 10



  document.getElementById('fechaactual').value =  ano+mes+dia;//ponemos la fecha actual
  document.getElementById('lotehoy').value =  ano+"-"+mes+"-"+dia;//ponemos la fecha actual del lote
  


//cambiamos formato de hora a AM. pm
  const formatAMPM = (date) => { let hours = date.getHours();
  let minutes = date.getMinutes();
  let ampm = hours >= 12 ? 'P.M.' : 'A. M.';
  hours = hours % 12;
   hours = hours ? hours : 12;
  minutes = minutes.toString().padStart(2, '0');
  let strTime = hours + ':' + minutes + ' ' + ampm; return strTime;
   }

   console.log(formatAMPM(new Date()));//imprimimos en consola la hora con formato am pm
   document.getElementById('hora').value =  (formatAMPM(new Date())); //seteamos la hora en el campo con id hora

   var tmpDate = new Date(); // obtenemos la fecha actual con la funcion

   const opciones = { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric' };
   console.log(addDaysToDate(tmpDate, 10).toLocaleDateString('en-us', opciones));
   document.getElementById('caducidad').value =  addDaysToDate(tmpDate, 10).toLocaleDateString('en-us', opciones); //seteamos la fecha con 10 dias mas para la caducidad

   //console.log(addDaysToDate(tmpDate, 10));//le agregamos 10 dias a la fecha actual
  //  document.getElementById('caducidad').value =  addDaysToDate(tmpDate, 10); //seteamos la fecha con 10 dias mas para la caducidad





//codigo de barras
//  JsBarcode("#codigo", addDaysToDate(tmpDate, 10));


/*document.addEventListener('keydown', (event) => {
  if (event.ctrlKey) {
     if (event.keyCode === 73) {
         console.log("Enviado");
     }
  }
}, false);

*/

                          


}

function obterpeso(){
var pe = document.getElementById('peso').value;
console.log("aest");
}

//variables globales


function ShowSelected()
{

  
/* Para obtener el valor */
var parte0 = document.getElementById('fechaactual').value;
var parte1 = document.getElementById("productoSelec").value;
var parte2 = document.getElementById('kilos').value;
var parte3 = document.getElementById('caducidad').value;
var crearCodigo = parte0 + "-" + parte1 + "-" + parte2;
JsBarcode("#codigo", crearCodigo);
document.getElementById('stringCodigo').value = crearCodigo;
}




function addDaysToDate(date, days){
    var res = new Date(date);
    res.setDate(res.getDate() + days);
    return res;


console.log(formatDate(date));


}


