
$('#pass2').keyup(function() {

    var pass1 = $('#pass1').val();
    var pass2 = $('#pass2').val();

    if ( pass1 == pass2 ) {
        $('#error2').text("Coinciden ✔️").css("color","black");
    } else {
        $('#error2').text("No coinciden ❌").css("color","black");
    }

});

