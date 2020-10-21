<!--<section class="ftco-section-parallax">
  <div class="parallax-img d-flex align-items-center">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
          <h2>Subcribe to our Newsletter</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
          <div class="row d-flex justify-content-center mt-4 mb-4">
            <div class="col-md-8">
              <form action="#" class="subscribe-form">
                <div class="form-group d-flex">
                  <input type="text" class="form-control" placeholder="Enter email address">
                  <input type="submit" value="Subscribe" class="submit px-3">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>-->

<footer class="ftco-footer ftco-bg-dark ftco-section" style="background:#edf0ed;color:#7e7e7e;max-height:0px;">
  <div class="container">
  <div class="row mb-5">
      <div class="col-md">
         <div class="ftco-footer-widget mb-4"style="color:#7e7e7e;">
          <h2 class="ftco-heading-2"style="color:#7e7e7e;margin-top:-10%;">About</h2>
          <p style="color:#7e7e7e;">OutplacementHeros is a community of Recruiting Professionals collaborating to help laid off employees.</p>
          <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
            <li class="ftco-animate"><a href="#"><span class="icon-twitter"style="color:#7e7e7e;"></span></a></li>
            <li class="ftco-animate"><a href="https://www.facebook.com/outplacementheros/"><span class="icon-facebook"style="color:#7e7e7e;"></span></a></li>
            <li class="ftco-animate"><a href="https://instagram.com/outplacementheros?igshid=ppg4sguw3ieg"><span class="icon-instagram"style="color:#7e7e7e;"></span></a></li>
            <li class="ftco-animate"><a href="https://www.linkedin.com/company/outplacementheros"><span class="icon-linkedin"style="color:#7e7e7e;"></span></a></li>
          
          </ul>
        </div>
      </div>
      <div class="col-md">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2"style="color:#7e7e7e;margin-top:-10%;">Have any Question?</h2>
          <div class="block-23 mb-3">
            <ul>
              <li><span class="icon icon-map-marker"style="color:#7e7e7e;"></span><span class="text"style="color:#7e7e7e;">Gurgaon, Haryana, India</span></li>
              <li><a href="#"><span class="icon icon-phone"style="color:#7e7e7e;"></span><span class="text"style="color:#7e7e7e;">+91-7838883008</span></a></li>
              <li><a href="#"><span class="icon icon-envelope"style="color:#7e7e7e;"></span><span class="text"style="color:#7e7e7e;">&nbsp;outplacementheros20@gmail.com</span></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center">

        <p style="color:#7e7e7e;margin-top:-5%;">< Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> OuplacementHeros, All rights reserved.
 Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0.</p>
      </div>
    </div>
  </div>
</footer>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
<script src="{{asset('external/js/jquery.min.js')}}"></script>
<script src="{{asset('external/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{asset('external/js/popper.min.js')}}"></script>
<script src="{{asset('external/js/bootstrap.min.js')}}"></script>
<script src="{{asset('external/js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('external/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('external/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('external/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('external/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('external/js/aos.js')}}"></script>
<script src="{{asset('external/js/jquery.animateNumber.min.js')}}"></script>
<script src="{{asset('external/js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('external/js/jquery.timepicker.min.js')}}"></script>
<script src="{{asset('external/js/scrollax.min.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{asset('external/js/google-map.js')}}"></script>
<script src="{{asset('external/js/main.js')}}"></script>

<!--modified here-->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script defer src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<script>
    $( function() {
      $( '.datepicker' ).datepicker({
      dateFormat: 'dd-mm-yy',
      changeMonth: true,
      changeYear: true,
      yearRange: "-70:+0"
      
    });


    $('.datepicker-Y').datepicker( {
    dateFormat: "yy",
    yearRange: "c-100:c",
    changeMonth: false,
    changeYear: true,
    showButtonPanel: false,
    closeText:'Select',
    currentText: 'This year',
    onClose: function(dateText, inst) {
      var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
      $(this).val($.datepicker.formatDate('yy', new Date(year, 1, 1)));
    },
    onChangeMonthYear : function () {
      $(this).datepicker( "hide" );
    }
  }).focus(function () {
    $(".ui-datepicker-month").hide();
    $(".ui-datepicker-calendar").hide();
    $(".ui-datepicker-current").hide();
    $(".ui-datepicker-prev").hide();
    $(".ui-datepicker-next").hide();
    $("#ui-datepicker-div").position({
      my: "left top",
      at: "left bottom",
      of: $(this)
    });
  }).attr("readonly", false);


  $('.datepicker-YM').datepicker( {
    yearRange: "c-100:c",
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
    closeText:'Select',
    currentText: 'This year',
    onClose: function(dateText, inst) {
      var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
      var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
      $(this).val($.datepicker.formatDate('MM yy (M y) (mm/y)', new Date(year, month, 1)));
    }
  }).focus(function () {
    $(".ui-datepicker-calendar").hide();
    $(".ui-datepicker-current").hide();
    $("#ui-datepicker-div").position({
      my: "left top",
      at: "left bottom",
      of: $(this)
    });
  }).attr("readonly", false);

    });

</script>


<!--modified here-->

<!--$(function(){$('.dateTxt').datepicker(); });-->