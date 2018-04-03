//
// $(".image_thumbnail").click(function(){
//     var audio = $(this).siblings();
//     var audioplayer = "."+audio[0].className;
//     console.log(audioplayer);
//     if ($(audioplayer)[0].paused == false) {
//        $(audioplayer)[0].pause();
//      } else {
//         $(audioplayer)[0].play();
//      }
// })


  $(".image_thumbnail").click(function(){
      if ($(this).siblings()[0].paused == false) {
         $(this).siblings()[0].pause();
       } else {
          $(this).siblings()[0].play();
       }
  })


$(document).ready(function () {
    new WOW().init();
    $(window).scroll(function () {
        if ($(document).scrollTop() > 50) {
            $('nav').addClass('shrink');
        } else {
            $('nav').removeClass('shrink');
        }
    });

    //Player jaquery here
    $('.mask span').on('click', function () {
        var btn_Class = $(this).find('i').attr('class');
        // alert(btn_Class);
        if (btn_Class == 'fa fa-play fa-5x') {
            $(this).find('i').attr('class', 'fa fa-pause-circle-o fa-5x');
        }
        if (btn_Class == 'fa fa-pause-circle-o fa-5x') {
            $(this).find('i').attr('class', 'fa fa-play fa-5x');
        } else {
            // $(this).attr('class', 'fa fa-play fa-5x');
        }
        var data_img = $(this).find('span').attr('data-img');
        var data_track = $(this).find('span').attr('data-tname');
        var data_album = $(this).find('span').attr('data-album');
        var data_artis = $(this).find('span').attr('data-artis');
        var data_rating = $(this).find('span').attr('data-rating');

        $('.player_left_side a img').attr('src', data_img);
        $('.player_body p span.track_name').text(data_track);
        $('.player_body p span.album').text(data_album);
        $('.player_body p span.artist').text(data_artis);
        // $('.player_body p span.rating').text(data_rating);

    });
});
