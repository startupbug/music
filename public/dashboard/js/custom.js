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
                    // alert(response.img);
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

     $(document).ready(function() {
        $('#example').DataTable();
    } );


   

  
