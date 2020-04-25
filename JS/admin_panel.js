const xhr = new XMLHttpRequest();

function change_info(){
   let change = document.getElementById("form");
   change.innerHTML='<label>Логин</label><br>'+
                '<input id="login" type="text" name="login" class="form-control" placeholder="Введите логин"><br>'+
                '<label>Пароль</label><br>'+
                '<input id="pass" type="password" name="password" class="form-control" placeholder="Введите пароь"><br>'+
                '<label>Email</label><br>'+
                '<input id="email" type="email" name="email" class="form-control" placeholder="Введите email"><br>'+
                '<label>Аватар</label><br>'+
                '<input id="avatar" type="file" name="avatar"><br>'+
                '<button onclick="update()" class="btn-reg">Register</button>';
show_select();
}

function show_select(){
    
    xhr.open("POST","php/ajax_select.php");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function(){
    if(xhr.status===200){
      // console.log(xhr.response);
        let res = JSON.parse(xhr.response);
        let out = "";
        for(let i in res){
            out += '<option value="'+res[i].id+'">'+res[i].login+"</option>";
        }
        let change = document.getElementById("output");
        change.innerHTML="<select id='select' onchange=''>"+out+"</select>";
        
    }
}
xhr.send();
}
function update(){
    let id = document.getElementById("select").value;
    let login = document.getElementById("login").value;
    let password = document.getElementById("pass").value;
    let email = document.getElementById("email").value;
    //let img = document.getElementById("avatar").value;
    //alert(id + login + password + email);
    if(login.trim() == '') {
        alert("input login");
    }else{
    xhr.open("POST","php/update_account.php");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function(){
    if(xhr.status===200){
            console.log(xhr.responseText);
        }
    }
    xhr.send("id="+id+"&login="+login+"&pass="+password+"&email="+email);
    alert("Data update");
}
}

function clear(){
    let element = document.getElementById("form");
    element.innerHTML='';
    
}
function delete_account(){
    show_select();
    clear();  
    
    let button=document.getElementById("form");
    button.innerHTML='<button onclick="realise_del()">OK</button>';


}
function realise_del(){
    let id_account = document.getElementById("select").value; 
    xhr.open("POST","php/del_account.php");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function(){
        if(xhr.status === 200){
            alert("OK");
        }
    }
    xhr.send("id="+id_account);
    //alert(id_account);
    
}

 function change_rec()
{
    var curDate = new Date();
    dateText=curDate.getFullYear()+'-';
    if(curDate.getMonth()<10){ dateText+='0';}
    dateText+=(curDate.getMonth()+1)+'-';
    if(curDate.getDate()<10){ dateText+='0';}
    dateText+=curDate.getDate();
    clear();   
    xhr.open("POST","php/ajax_select.php");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function()
    {
        if(xhr.status===200)
        {
            let res = JSON.parse(xhr.response);
            let out = "";
            for(let i in res)
            {out += '<option value="'+res[i].id+'">'+res[i].login+"</option>";}
            let change = document.getElementById("output");
            change.innerHTML="<br><select id='select' onchange='load_schedules()'>"+out+"</select>"+
            '<br><br><input id=\'date\' type="date" value='+dateText+' onchange=\'load_schedules()\'></input>';;
        }
    }
    xhr.send();
}

function load_schedules()
{
    let date = document.getElementById('date').value;
    let id = document.getElementById('select').value;
    clear();
    xhr.open("POST","php/ajax_select_schedules.php");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function()
    {
        if(xhr.status===200)
        {document.getElementById('form').innerHTML=xhr.responseText;}
    }
     xhr.send('date='+date+'&id='+id);
}

function onOffSmen(date,time,doctor)
{
    let id = document.getElementById('select').value;
    xhr.open("POST","php/onOffSmen.php");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onloadstart= function()
    {document.getElementById(time).innerHTML="<span>загрузка</span>";}
    xhr.onload = function()
    {if(xhr.status===200){document.getElementById('date').onchange();}}
     xhr.send('date='+date+'&id='+id+'&time='+time);
}

////BEGIN
//DECLARE uid INT;
//SET foreign_key_checks = 0;
//DELETE FROM users WHERE users.id=id;
//DELETE FROM doctors WHERE doctors.id=id;
//DELETE FROM schedules WHERE schedules.iddoctor=id;
//UPDATE schedules SET schedules.idpatient=NULL WHERE schedules.idpatient=id;
//SET foreign_key_checks = 1;
//END