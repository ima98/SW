$(document).ready(function (event) {
    $("form input").change(function comprobar() {
        $email = $('#correo');
        $contra = $('#contraseña');
        $("#submit").attr("disabled", true);
        $.ajax({
            url: "ClientVerifyEnrollment.php?correo=" + $email.val(), cache: false, success: function (result) {
                //alert(result);
                //alert(result.localeCompare('SI '));

                if (result.localeCompare('SI ')) {
                    $("#mail").html("Correo No VIP");
                    $("#mail").css('color', 'red');
                    $("#submit").attr("disabled", true);

                } else {
                    $("#mail").html("Correo VIP");
                    $("#mail").css('color', 'green');
                    $ticket = 1010;

                    if ($contra.val().length >= 6) {


                        $.ajax({

                            url: "ClientVerifyPass.php?contrasena=" + $contra.val() + "&ticket=" + $ticket, cache: false, datatype: "html", success: function (resulta) {
                                //alert( $contra.val());
                                //alert(resulta);
                                //alert(resulta.localeCompare('VALIDA'));

                                if (resulta.localeCompare('VALIDA') == 1) {
                                    $("#cont").html("CONTRASEÑA VALIDA");
                                    $("#cont").css('color', 'green');
                                    $("#submit").attr("disabled", false);

                                } else {
                                    $("#cont").html("CONTRASEÑA POCO SEGURA");
                                    $("#cont").css('color', 'red');


                                }
                            }
                        });
                    }

                }
            }
        });
    });
});