$(document).ready(function(){
    $("#btnBajaUser").click(mostrarGrilla);
    $("#btnAltaOtros").click(altaForm);
    $("#btnGrilla").click(mostrarGrillaConteiner);
    
});

function btnSend(){
        if($("#btnSend").val() == 'add')
            alta();
            
    };
/**
 * Envia los datos del formulario al servidor y redirige al index.
 */
var alta = function alta(){
    $.ajax({
            url:'./php/administracion.php',
            type:'POST',
            cache: false,
            contentType: false,
            processData: false,
            data:form()
        }).done(function(data){
            windows.location.replace("index.html");
        }).fail().always();
}



 function mostrarGrillaConteiner(){
   $.ajax({
            'url':'./php/ListadoConteiner.php',
            'type':'POST'
        }).done(function(data){
            $("#miDiv").html(data);
        }
        ).fail().always();
}








/**
 * Redibe un id a dar de baja y lo envia al servidor, luego muestra la grilla
 *  
 */
function baja(obj){
    $.ajax({
            'url':'./php/administracion.php',
            'type':'POST',
             data:{'baja':123}
        }).done(function(data){
           mostrarGrilla();
        }
        ).fail().always();
}

/* 
*Agrega un formulario de alta a la pagina
*/
var altaForm = function(){
    $.ajax({
            'url':'./php/formConteiner.php',
            'type':'POST'
        }).done(function(data){
            $("#miDiv").html(data);
        }
        ).fail().always();
    }


/**
 * Mustra la grilla pedida al servidor
 */
var mostrarGrilla = function (){
   $.ajax({
            'url':'./php/Listado.php',
            'type':'POST'
        }).done(function(data){
            $("#miDiv").html(data);
        }
        ).fail().always();
}

/**
 * Obtiene los datos del formulario y devuelve un obj formdata
 */
function form(){
    var formData = new FormData();
    formData.append('altaConteiner',$("#btnSend").val());
    formData.append('descripcion',$("#descripcion").val());
    formData.append('pais',$("#pais").val());
    formData.append('numero',$("#numero").val());

    formData.append('file',document.getElementById('file').files[0]);
    return formData;
}