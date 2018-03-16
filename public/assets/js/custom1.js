
$(document).ready(function() {
  $("#nav1 li").hover(
    function() {
      $(this).find('ul').delay(250).slideDown();
    },
    function() {
      $(this).find('ul').delay(250).slideUp();
    });
});


/*AUDIO*/

