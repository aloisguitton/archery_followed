function pass_match(){
  var passwd = document.getElementById('psw').value;
  var pass1 = document.getElementById('psw1').value;

  if(passwd != pass1){
    document.getElementById('passerror').style.display = "inline";
    document.getElementById('login').setAttribute("disabled", "");
  }
  else{
    document.getElementById('passerror').style.display = "none";
    document.getElementById('login').removeAttribute("disabled");
  }
}

function exist(){
  document.getElementById('id_exist').style.display = "inline";
}
