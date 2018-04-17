@include('layouts.public_partials.footer')

<script type="text/javascript">
  var APP_URL = "{!! asset('') !!}";
  console.log(APP_URL);
</script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('public/assets/js/jquery-3.1.1.min.js')}}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Bootstrap -->
<script src="{{asset('public/assets/js/bootstrap.min.js')}}"></script>
<!-- Validation -->
<script src="{{asset('public/assets/js/jquery.validationEngine.js')}}"></script>
<!-- Validation-en -->
<script src="{{asset('public/assets/js/jquery.validationEngine-en.js')}}"></script>
<!-- Carousel-min -->
<script src="{{asset('public/assets/js/owl.carousel.min.js')}}"></script>
<!-- Wow-min-js -->
<script src="{{asset('public/assets/js/wow.min.js')}}"></script>
<!-- Custom1-js -->

<script src="{{asset('public/assets/js/custom1.js')}}"></script>
<!-- Custom-js -->
<script src="{{asset('public/assets/js/custom.js')}}"></script>
<script src="{{asset('public/assets/js/mycustom.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
<script src="{{asset('public/assets/js/jssocials.js')}}"></script>
<script type="text/javascript">
  
  $(document).ready(function() {

    var CurrentData = '';
    $.ajax({
        url: APP_URL + '/getAffiliatedID',
        type: 'get',
        success: function(res){
          CurrentData = res;
          console.log(CurrentData);
          var linkurl = window.location.href+'/'+CurrentData;
          $("#social").jsSocials({
            url : linkurl,
            showLabel: false,
            showCount: "inside",
            shareIn: "popup",
            shares: ["twitter","facebook"]
          });
        },
        error: function(){
          var linkurl = window.location.href;
          $("#social").jsSocials({
            url : linkurl,
            showLabel: false,
            showCount: "inside",
            shareIn: "popup",
            shares: ["twitter","facebook"]
          });
        }
      });  
  });
$(document).ready(function(){


  // $("#loginForm").submit(function(e){
  //   e.preventDefault();
  //   var form = $(this).serialize();
  //   var APP_URL = "{!! asset('') !!}";
  
  //   console.log(form);

  //   //validation error handling
  //   $('span.validationEmail').hide();
  //   $('span.validationPassword').hide();
    
  //   $.ajax({
  //     url: $(this).attr('action'),
  //     type: $(this).attr('method'),
  //     data: form,
  //     success: function(r){
  //       console.log(r);
  //       window.location = APP_URL + "redirectDashboard";
  //     },
  //     error: function(e){
  //       var error = e.responseJSON;
  //       if(error.email){
  //         $('span.validationEmail').show();
  //         $('span.validationEmail strong').text(error.email);
  //       }
  //       if(error.password){
  //         $('span.validationPassword').show();
  //         $('span.validationPassword strong').text(error.password);
  //       }
  //     }
  //   })
  // });
});
</script>


<script type="text/javascript">
 // $( document ).ready(function() {
   var vid = document.getElementById("videoz");
   vid.onended = function() { 
      var track_ID = $('#track_id').val();    
      var user_ID = $('#user_id').val();      
      $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
      });      
      $.ajax({
        url:  '/submit_points',
        type: 'post',        
        data: { 'user_id' : user_ID, 'tr_id' : track_ID },           
        success: function (data){          
          console.log(data);
          if(data.success == true){
           toastr.success(data.msg);
         }else if(data.success == false){
           toastr.error(data.msg);
         }         
       },   
    });
  };
</script>



