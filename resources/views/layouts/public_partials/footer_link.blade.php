@include('layouts.public_partials.footer')

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('assets/js/jquery-3.1.1.min.js')}}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Bootstrap -->
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<!-- Validation -->
<script src="{{asset('assets/js/jquery.validationEngine.js')}}"></script>
<!-- Validation-en -->
<script src="{{asset('assets/js/jquery.validationEngine-en.js')}}"></script>
<!-- Carousel-min -->
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<!-- Wow-min-js -->
<script src="{{asset('assets/js/wow.min.js')}}"></script>
<!-- Custom1-js -->

<script src="{{asset('assets/js/custom1.js')}}"></script>
<!-- Custom-js -->
<script src="{{asset('assets/js/custom.js')}}"></script>
<script src="{{asset('assets/js/mycustom.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
<script src="{{asset('assets/js/jssocials.js')}}"></script>
<script type="text/javascript">


 
  $(document).ready(function() {

    var CurrentData = '';
    $.ajax({
        url: '/getAffiliatedID',
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
</script>

