$(document).ready(function(){
    $("#btnLogin").click(function(){
        var datosLogin = {email: $("#email").val(),password:$("#passwd").val()};
        $.ajax({
            url:'./php/administracion.php',
            type:'POST',
            cache: false,
            async:true,
            data:{login:JSON.stringify(datosLogin)}
        }).done(function(obj){
            obj = JSON.parse(obj);
            if(obj.auth)
                window.location.replace("index.html");
            else
                alert(obj.msg);
});
    });


$("#createUser").click(function(){
        $.ajax({
            url:'./php/formUser.php',
            type:'POST',
            cache: false,
            async:true,
        }).done(function(obj){
            $("#form").html(obj);
});
    });
});




 function signUp(){
    if($("#password").val() == $("#confirm").val())
    {
        if($("#age").val() > 0)
        {
            $.ajax({
                url:'./php/administracion.php',
                type:'POST',
                cache: false,
                contentType: false,
                processData: false,
                data:form()
            }).done(function(data){
                obj = JSON.parse(data);
                if(obj.add)
                {
                    alert("Usuario Agregado");
                    window.location="./login.html";
                }
                else
                    alert("Usuario Existente");
            }).fail().always();
        }
        else
            $("#age").attr('class',"form-control alert alert-danger");
    }
    else
        $("#password").attr('class',"form-control alert alert-danger");
 }


 /**
 * Obtiene los datos del formulario y devuelve un obj formdata
 */
function form(){
    var formData = new FormData();
    formData.append('signUp',true);
    formData.append('name',$("#name").val());
    formData.append('age',$("#age").val());
    formData.append('email',$("#email").val());
    formData.append('password',$("#password").val());
    return formData;
}