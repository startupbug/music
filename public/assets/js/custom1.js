
// $(document).ready(function() {
//   $("#nav1 li").click(
//     function() {
//       $(this).find('ul').delay(250).slideDown();
//     // },
//     // function() {
//     //   $(this).find('ul').delay(250).slideUp();
//     });
// });
$(".nav1 li").click(function() {
  if($(this).find('ul').is(':visible')){
    $(this).children('ul').slideToggle(250);
  }
  else{
    $(".nav1 li").find('ul').delay(250).slideUp().not(jQuery(this));
    $(this).find('ul').delay(250).slideDown();
  }
});
