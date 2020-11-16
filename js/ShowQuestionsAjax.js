function mostramemedioxmlaunquesea() {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById("resultado").innerHTML=this.responseText;
      }
    }
    xhr.open("GET",'AjaxTableXml.php');

    xhr.send();
    
  }
