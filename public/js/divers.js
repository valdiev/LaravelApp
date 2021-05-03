$(document).ready(function() {
    //MODIF OVERVIEW
    $("#overviewForm button").hide();
    $(".overview p").on('input', function() {
        $("#overviewForm button").show();
    });

    $("#overviewForm").submit(function(e) {
        e.target.elements['overview'].value = $(".overview p").html();
    });

    $(".overview p").keydown(function(e) {
        if(e.keyCode === 13) {
            document.execCommand('insertHTML', false, '<br><br>');
            return false;
        }
    });
    $(".no_photo").hide();

    if ( $('.user_photo').children().length == 0 ) {
        $(".no_photo").show();
   }
});