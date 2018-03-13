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
                if(response.code === 200){
                    $('.image-box > img').attr('src', response.img);
                    alert(response.img);
                }
                if(response.code === 202){
                    alert(response.error);
                }
            },
            error: function(){
                alert('Image uploading failed');
            }
        });
    });
var $star_rating = $('.rating .fa');

var SetRatingStar = function() {
  return $star_rating.each(function() {
    if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
      return $(this).removeClass('fa-star-o').addClass('fa-star');
    } else {
      return $(this).removeClass('fa-star').addClass('fa-star-o');
    }
  });
};

$star_rating.on('click', function() {
  $star_rating.siblings('input.rating-value').val($(this).data('rating'));
  return SetRatingStar();
});

SetRatingStar();
$(document).ready(function() {

}); 

$("#star_rating_submit").on('click', function(e){
      
      var track_ID = $('#track_id').val();    
      var rating_ID = $('#rating_no').val();      
      var promoter_id = $('#promoter_id').val();
      var musician_id = $('#musician_id').val();
      console.log(musician_id);     
      $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
      });      
      $.ajax({
        url:  APP_URL + '/submit_rating',
        type: 'post',        
        data: { 'rate_id' : rating_ID, 'tr_id' : track_ID, 'promoter_id' : promoter_id, 'musician_id' : musician_id },           
        success: function (data){    
          alert(data);

          console.log(data);
          if(data.success == true){
           toastr.success(data.msg);
         }else if(data.success == false){
           toastr.error(data.msg);
         }         
       },   
    });
});

