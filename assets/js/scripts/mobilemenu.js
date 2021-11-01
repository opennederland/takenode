import $ from "jquery";

export function mobilemenu() {
  $(".js-menu").on("click", function() {
    $("body").toggleClass("menuopen");
    $("body").toggleClass("opensidemenu");
    $(".js-mobilemenu").toggleClass("open");
  });
  
  $( window ).resize(function() {
    $("body").removeClass("menuopen").removeClass("opensidemenu");
  });

  $(document).mouseup(function(e) 
  {
    var container = $(".mod-mobilemenu, .menuopen .btn-menu");

    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0) 
    {
      $("body").removeClass("menuopen");
      $("body").removeClass("opensidemenu");
      $(".js-mobilemenu").removeClass("open");
    }
  });
}