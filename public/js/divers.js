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

   const $menu = $(".connexion_menu");
   $(document).mouseup(e => {
    if (!$menu.is(e.target) // if the target of the click isn't the container...
    && $menu.has(e.target).length === 0) // ... nor a descendant of the container
    {
      $menu.removeClass('show');
   }
  });

  $(".dropdown_menu button").click(function dropDown() {
    $(".connexion_menu").toggleClass("show");
    })

});