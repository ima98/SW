$(document).ready(setInterval(function () {
  var email = $("#correo").val();
  var url = "AjaxTableXmlCount.php?email=" + email;
  
  $.ajax({
    type: 'post',
    enctype: 'multipart/form-data',

    url: url,
    processData: false,
    contentType: false,
    cache : false,
    timeout: 8000,
    dataType: "html",

    success: function () {
      $('#numpreg').load(url);
    },
    error: function () {
      $('#numpreg').html('<p class="error"><strong>El servidor parece que no responde</p>');
    }
  });
},
2000));

