
$(function() {

  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });

  // We can watch for our custom `fileselect` event like this
  $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {

          var input = $(this).parents('.input-group').find(':text'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;

          if( input.length ) {
              input.val(log);
          } else {
              if( log ) alert(log);
          }

      });
  });

});

$(function() {
  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });

  // We can watch for our custom `fileselect` event like this
  // $(document).ready( function() {
  //     $(':file').on('fileselect', function(event, numFiles, label) {

  //         var input = $(this).parents('.input-group').find(':text'),
  //             log = numFiles > 1 ? numFiles + ' files selected' : label;

  //         if( input.length ) {
  //             input.val(log);
  //         } else {
  //             if( log ) alert(log);
  //         }

  //     });
  // });

});
 //on form submit change picture
    $('#change_profile').change(function(e){
        e.preventDefault();
        var form = new FormData(this);
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: form,
            processData: false,
            contentType: false,
            success: function(response){
              console.log(response);
                if(response.code === 200){

                    $('.image-box > img').attr('src', response.img);


                }
                if(response.code === 202){
                    // alert(response.error);
                    //alert(response.img);
                }
                if(response.code === 202){
                    //alert(response.error);
                }
            },
            error: function(){
                alert('Image uploading failed');
            }
        });
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


        $(".image_thumbnail").click(function(){
            if ($(this).siblings()[0].paused == false) {
               $(this).siblings()[0].pause();
             } else {
                $(this).siblings()[0].play();
             }
        })
