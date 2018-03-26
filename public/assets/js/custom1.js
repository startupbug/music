
// $(document).ready(function() {
//   $("#nav1 li").click(
//     function() {
//       $(this).find('ul').delay(250).slideDown();
//     // },
//     // function() {
//     //   $(this).find('ul').delay(250).slideUp();
//     });
// });
// $(document.body).click( function(e) {
//   $("#nav1 li").find('ul').delay(250).slideUp();
// });

$("#nav1 li").click(function() {
    $("#nav1 li").find('ul').delay(250).slideUp();
    $(this).find('ul').delay(250).slideDown();
});
