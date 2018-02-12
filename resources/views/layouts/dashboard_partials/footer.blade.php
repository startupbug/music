<footer>
    <div class="container-fluid footer_color">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="footer_last">All rights Reserved © 2017 <span>Music Voting</span>, Designed & Developed by <span>Startupbug.net</span></h3>
                </div>
            </div>
        </div>
    </div>
</footer>




<!-- Template Js Links -->
<!--./End Container Fulid --->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<script src="{{asset('dashboard/js/jquery-3.1.1.min.js')}}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Bootstrap -->
<script src="{{asset('dashboard/js/bootstrap.min.js')}}"></script>
<script src="{{asset('dashboard/js/custom.js')}}"></script>
<script src="{{asset('dashboard/js/jquery.canvasjs.min.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>

<!-- Custom-js -->

<!-- SideBar Javascript -->
<script type="text/javascript">
  $(".dashboard_name").on("click",".upload-image",function(e){
    $(this).parents("form").ajaxForm(options);
  });
  var options = { 
    complete: function(response) 
    {
        if($.isEmptyObject(response.responseJSON.error)){
            $("input[name='title']").val('');
            alert('Image Upload Successfully.');
        }else{
            printErrorMsg(response.responseJSON.error);
        }
    }
  };
  function printErrorMsg (msg) {
    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display','block');
    $.each( msg, function( key, value ) {
        $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
    });
  }
</script>

<!-- Sheheryar Javascript -->
<script type="text/javascript">
          window.onload = function () {
            CanvasJS.addColorSet("greenShades",
            [
              "#D31725",
              "#D31725",
              "#D31725",
              "#D31725",
              "#D31725",
              "#D31725",
              "#D31725",
              "#D31725",
              "#D31725",
              "#D31725",
              "#D31725",
              "#D31725"
            ]);
            var options = {
                  backgroundColor: "#212121",
                  colorSet: "greenShades",
                  animationEnabled: true,
                  dataPointMaxWidth: 25,
                  title: {
                    text: "2017",
                    fontColor: "white",
                    fontWeight: "normal"
                  },
                  axisY: {
                    title: "POINTS",
                    titleFontColor: "red",
                    includeZero: false,
                    labelFontColor: "red",
                    labelFontWeight: "bold",
                    labelFontFamily: "monospace",
                    labelFontSize: 16
                  },
                  axisX: {
                    // title: "Countries",
                    labelFontColor: "red",
                    labelFontWeight: "bold",
                    labelFontFamily: "monospace",
                    labelFontSize: 14
                  },
                  data: [{
                    type: "column",
                    yValueFormatString: "#,##0.0#"%"",
                    dataPoints: [
                      { label: "JAN", y: 200 },
                      { label: "FEB", y: 400 },
                      { label: "MAR", y: 359 },
                      { label: "APR", y: 570 },
                      { label: "MAY", y: 380 },
                      { label: "JUN", y: 456 },
                      { label: "JUL", y: 420 },
                      { label: "AUG", y: 451 },
                      { label: "SEP", y: 321 },
                      { label: "OCT", y: 451 },
                      { label: "NOV", y: 600 },
                      { label: "DEC", y: 341 }

                    ]
                  }]
                };
                $("#chartContainer").CanvasJSChart(options);
            }
          //sheheryar
          $('.middle').click(function(){
               $(this).siblings('.dropdown-content').toggle();
             });

          // album/track multi select videos by sheheryar
           $(document).ready(function() {
                     $('#example-getting-started').multiselect();
                 });
</script>


  