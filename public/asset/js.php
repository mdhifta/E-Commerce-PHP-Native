<script type="text/javascript" language="javascript">
$(document).ready(function(){
  $('#province').change(function(){
    var prov = $('#province').val();
    $.ajax({
      type : 'POST',
      url : 'backend/rajaongkir/getCity.php',
      data :  'prov_id=' + prov,
      success: function (data) {
        $("#city").html(data);
        $("#city").niceSelect('update');
      }
    });
  });

  $("#courir").change(function(){
    var from = "255";
    var city = $('#city').val();
    var courir = $('#courir').val();
    $.ajax({
      type : 'POST',
      url : 'backend/rajaongkir/getPrice.php',
      data :  {'city_id' : city, 'courir' : courir, 'from' : from},
      success: function (data) {
        $("#type").html(data);
        $("#type").niceSelect('update');
      }
    });
  });

  $("#type").change(function(){
    var array = $('#type').val();
    $.ajax({
      type : 'POST',
      url : 'backend/rajaongkir/setPrice.php',
      data :  'array=' + array,
      success: function (data) {
        $("#price_ongkir").html(data);
        $("#price_ongkir").niceSelect('update');
      }
    });
  });
});
</script>

<!-- Including Jquery -->
<script src="../vendor/assets/js/vendor/jquery-3.3.1.min.js"></script>
<script src="../vendor/assets/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="../vendor/assets/js/vendor/jquery.cookie.js"></script>
<script src="../vendor/assets/js/vendor/wow.min.js"></script>
<!-- Including Javascript -->
<script src="../vendor/assets/js/bootstrap.min.js"></script>
<script src="../vendor/assets/js/plugins.js"></script>
<script src="../vendor/assets/js/popper.min.js"></script>
<script src="../vendor/assets/js/lazysizes.js"></script>
<script src="../vendor/assets/js/main.js"></script>
<script src="asset/chat/script.js"></script>

<!--For Newsletter Popup-->
<script>
jQuery(document).ready(function(){
 jQuery('.closepopup').on('click', function () {
   jQuery('#popup-container').fadeOut();
   jQuery('#modalOverly').fadeOut();
 });

 var visits = jQuery.cookie('visits') || 0;
 visits++;
 jQuery.cookie('visits', visits, { expires: 1, path: '/' });
 console.debug(jQuery.cookie('visits'));
 if ( jQuery.cookie('visits') > 1 ) {
 jQuery('#modalOverly').hide();
 jQuery('#popup-container').hide();
 } else {
   var pageHeight = jQuery(document).height();
   jQuery('<div id="modalOverly"></div>').insertBefore('body');
   jQuery('#modalOverly').css("height", pageHeight);
   jQuery('#popup-container').show();
 }
 if (jQuery.cookie('noShowWelcome')) { jQuery('#popup-container').hide(); jQuery('#active-popup').hide(); }
});

jQuery(document).mouseup(function(e){
 var container = jQuery('#popup-container');
 if( !container.is(e.target)&& container.has(e.target).length === 0)
 {
 container.fadeOut();
 jQuery('#modalOverly').fadeIn(200);
 jQuery('#modalOverly').hide();
 }
});
</script>
<!--End For Newsletter Popup-->
