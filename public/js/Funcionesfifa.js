/**
 * Created by INIFAP on 07/02/2016.
 */
function EscogerPosicion(Forma){
    alert("HOLA");
    alert(Forma);
    var Seleccion=document.getElementById("PosicionSelect").value;
    document.Forma.PosicionInput.value=Seleccion.value;
    alert(Seleccion);
    alert(document.Forma.PosicionInput.value);
    submit();
}