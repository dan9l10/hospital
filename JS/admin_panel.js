const xhr = new XMLHttpRequest();

function change_info(){
   let change = document.getElementById("form");
   let checkbox = document.getElementById("change_info_checkbox");
   let checkbox_delete = document.getElementById("delete_acc_checkbox");
   let checkbox_record = document.getElementById("record_checkbox");
   document.getElementById("Graphic_checkbox").checked=false;;
   checkbox_delete.checked=false;
   checkbox_record.checked=false;
   if (checkbox.checked){
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
   }else{clear(); }
   
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
    let change_select = document.getElementById("output");
    element.innerHTML='';
    change_select.innerHTML='';
}
function delete_account(){
    
    clear(); 
    let checkbox=document.getElementById("delete_acc_checkbox");
    let checkbox_change_info = document.getElementById("change_info_checkbox");
    let checkbox_record = document.getElementById("record_checkbox");
    document.getElementById("Graphic_checkbox").checked=false;;
    checkbox_record.checked=false;
    checkbox_change_info.checked=false;
    if(checkbox.checked){
        show_select();
        let button=document.getElementById("form");
        button.innerHTML='<button onclick="realise_del()">OK</button>';
    }else{clear();}
    


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
    let checkbox = document.getElementById("record_checkbox");
    let checkbox_change_info = document.getElementById("change_info_checkbox");
    let checkbox_del_acc = document.getElementById("delete_acc_checkbox");
    document.getElementById("Graphic_checkbox").checked=false;;
    checkbox_change_info.checked=false;
    checkbox_del_acc.checked=false;
    if(checkbox.checked){
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
    }//else{//clear();}
    
}

function load_schedules()
{
    let date = document.getElementById('date').value;
    let id = document.getElementById('select').value;
    //clear();
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


function Graphic()
{
  
    document.getElementById("form").innerHTML='';
    document.getElementById("output").innerHTML='';
    document.getElementById("change_info_checkbox").checked=false;;
    document.getElementById("record_checkbox").checked=false;;
    document.getElementById("delete_acc_checkbox").checked=false;;
    document.getElementById("output").innerHTML="<br><input type=\"month\" id=\"date\"></input>"+
    "<button onclick=\"CreateGraphic()\">Сформировать</button>";
}

function CreateGraphic()
{
    let date = document.getElementById('date').value;
    xhr.open("POST","php/ajax_create_Graphic.php");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onloadstart= function()
    {document.getElementById("form").innerHTML="<span>загрузка</span>";}
    xhr.onload = function()
    {if(xhr.status===200){document.getElementById("form").innerHTML="<span>Выполненно</span>";}}
     xhr.send('month='+date.substr(5)+'&year='+date.substr(0, 4));
}