var req = new XMLHttpRequest();
function Ajax(url,method,func,dates)
{
    req.open(method,url,true);
    req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");//POST
    req.onreadystatechange = func;
    req.send(dates);
}


function baja(legajo)
{
    var obj ={'legajo':legajo};
    var json = JSON.stringify(obj);
    Ajax("http://localhost/clasesProg3/Tp/AB_POST_JSON/php/mostrar.php","POST",testState,"baja="+json);
    function testState(){
        if(req.readyState == 4 && req.status == 200)
            document.getElementById('miDiv').innerHTML = req.responseText+"baja";
        else
             document.getElementById('miDiv').innerHTML = "Cargando";
    }
}

window.onload = function load()
{
    Ajax("http://localhost/clasesProg3/Tp/AB_POST_JSON/php/mostrar.php","POST",testState);
    function testState(){
        if(req.readyState == 4 && req.status == 200)
            document.getElementById('miDiv').innerHTML = req.responseText;
        else
             document.getElementById('miDiv').innerHTML = "Cargando";
    }
}