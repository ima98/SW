$(document).ready(function () {
  $('#submit').click(function (event) {
    var email = $("#correo").val();
    var url = "AddQuestionWithImage.php?email="+email;
    var formData = new FormData(fquestion);

    $.ajax({
      type: 'post',
      enctype: 'multipart/form-data',

      url: url,
      data: formData, 
      processData: false,
      contentType: false,
      cache : false,
      timeout: 8000,
      dataType: "html",


      success:function(){
        $('#resultado').load("../php/AjaxtableXml.php");
      },
      error:function(){
        $('#resultado').html('<p class="error"><strong>El servidor no responde :(</p>');
      }
    });
  }
  );
}
);