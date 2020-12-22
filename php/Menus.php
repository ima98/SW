<div id='page-wrap'>
  <header class='main' id='h1'>
    <span id="registro" class="right"><a href="SignUp.php">Registro</a></span>
    <span id="login" class="right"><a href="Login.php">LogIn</a></span>
    <span id="logout" class="right" style="display:none;"><a href="LogOut.php">LogOut</a></span>
    <div id="google" class="g-signin2" data-onsuccess="onSignIn"></div>
    
    

  </header>
 
  <nav class='main' id='n1' role='navigation'>

    <span><a href='Layout.php'>Inicio</a></span>
    <span id='preguntas' style='display:none'><a href='HandlingQuizesAjax.php'>Insertar Preguntas</a></span>
    <span id='usuarios' style='display:none'><a href='HandlingAccounts.php'>Gestionar Usuarios</a></span>
    <span id='cambiarContra'><a href='ResetPass.php'>Cambiar contraseña</a></span>
    <span><a href='Credits.php'>Creditos</a></span>





  </nav>

  <script src='../js/jquery-3.4.1.min.js'></script>
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <script src="https://apis.google.com/js/platform.js" async defer></script>
<meta name="google-signin-client_id" content="73688124008-biaqq5hnt1vqfbg3ght6d94su449in3g.apps.googleusercontent.com">





  <script>

  var email;
  function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  //console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  //console.log('Name: ' + profile.getName());
  //console.log('Image URL: ' + profile.getImageUrl());
  //console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
  var email=profile.getEmail();
  //var imagen=profile.getImageUrl();
  //var url = "LoginGoogle.php?email="+email;
  var url = "LoginGoogle.php";
  /*$.ajax({
      type: 'POST',
      enctype: 'multipart/form-data',

      url: url,
      data: {email},
      processData: false,
      contentType: false,
      cache: false,
      timeout: 8000,
      dataType: "html",


      /*success: function () {
        alert("Iniciando sesión con cuenta de google");
      },
      error: function () {
       alert("Error al iniciar sesión con cuenta de google");
      }
      
    });*/



    var http = new XMLHttpRequest();
  var params = 'email='+email;
http.open('POST', url, true);

//Send the proper header information along with the request
//http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

http.onreadystatechange = function() {//Call a function when the state changes.
    if(http.readyState == 4 && http.status == 200) {
        alert("aaa");
    }
}
http.send(params);
  }

</script>

  <?php
  if (isset($_SESSION['email'])) {

    $email = $_SESSION['email'];
    if ($_SESSION['email'] == "admin@ehu.es") {

      echo "<script>

      $('#registro').hide();
      $('#login').hide();
      $('#logout').show();
      $('#usuarios').show();
      $('#cambiarContra').hide();
      $('#h1').append('<p>$email </p>');
      $('#h1').append('<img width=\'50\' height=\'60\' src=\'data:image/*;base64," . getImagenDeBD($email) . "\' alt=\'Imagen\'/>');
    </script>";
    } else {


      echo "<script type='text/javascript'>
            
            $('#preguntas').show();
            $('#registro').hide();
            $('#login').hide();
            $('#logout').show();
            
            $('#h1').append('<p>$email </p>');
            $('#h1').append('<img width=\'50\' height=\'60\' src=\'data:image/*;base64," . getImagenDeBD($email) . "\' alt=\'Imagen\'/>');
        

        </script>";
    }
  } else {
    $email = "";
    echo "<script> function cierreSesion(){
            $('#registro').show();
            $('#login').show();
            $('#logout').hide();
            $('#preguntas').hide();
            $('#usuarios').hide();

        }</script>";
  }
  function getImagenDeBD($email)
  {
    include 'DbConfig.php';
    $mysqli = mysqli_connect($server, $user, $pass, $basededatos);
    $sql = "SELECT foto FROM usuarios WHERE email=\"" . $email . "\";";
    $resul = mysqli_query($mysqli, $sql, MYSQLI_USE_RESULT);
    $img = mysqli_fetch_array($resul);
    return $img['foto'];
  }
  ?>