
function validarCampoVacio() {
  var k = true;
  $("form :input").each(function () {
    var emp = $(this).val();

    if ($(this).attr('name') == 'imgInp') {
      k = true;
    } else {
      if (emp.length == 0) {
        alert("El campo " + "\' " + $(this).attr('name') + "\'" + " esta vacio.");
        k = false;
      }
    }


  })
  return k;
}

function validarPregunta(preg) {
  if (preg.length < 10) {
    alert("La pregunta tiene que contener al menos 10 caracteres");
    return false;
  }
  return true;
}

function validarCorreo(email) {
  var exprAlu = /^[a-zA-Z]+(([0-9]{3})+@ikasle\.ehu\.(eus|es))$/;
  var exprPro = /^[a-zA-Z]+(\.[a-zA-Z]+@ehu\.(eus|es)|@ehu\.(eus|es))$/;

  if (exprAlu.test(email) || exprPro.test(email)) {
    return true;
  }

  alert("El correo electronico introducido no es valido.");
  return false;
}