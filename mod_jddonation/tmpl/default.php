<?php
defined('_JEXEC') or die;
$button_link=$params->get('button_link','#');
?>
<div class="row">
   <div class="col-12">
      
      <?php if(!empty($params->get('discount_title'))){ ?>
         <div class="heading-count"><?php echo $params->get('discount_title','');?></div>
      <?php } ?>

      <?php if(!empty($params->get('summary'))){ ?>
         <p class="count-summary"><?php echo $params->get('summary','');?></p>
      <?php } ?>
		<div class="row time-countdown justify-content-start">
			<div class="col-12 col-lg-12">
				<div id="countdown-<?php echo $module->id;?>" class="countdown">
					<span class="" id="days-<?php echo $module->id;?>"></span>
					<span class="" id="hours-<?php echo $module->id;?>"></span>
					<span class="" id="minutes-<?php echo $module->id;?>"></span>
					<span class="" id="seconds-<?php echo $module->id;?>"></span>
				</div>
			</div>
		</div>
   </div>
</div>
 <?php if(!empty($params->get('button'))){ ?>
	 <a class="btn btn-outline-primary mt-5" href="<?php echo JRoute::_("index.php?Itemid={$button_link}"); ?>"><?php echo $params->get('button','');?></a>
  <?php } ?>

<script>

   (function ($){

      var countdown = function(){
      
         if( $('span').is(':empty') ) {$("#countdown-<?php echo $module->id;?>").addClass("fas fa-spinner fa-pulse"); } 

         // Set the date we're counting down to
         var countDownDate = new Date("<?php echo $params->get('countdown_date','');?>").getTime();

         // Update the count down every 1 second
         var x = setInterval(function() {

         $("#countdown-<?php echo $module->id;?>").removeClass("fas fa-spinner fa-pulse");

         // Get todays date and time
         var now = new Date().getTime();

         // Find the distance between now and the count down date
         var distance = countDownDate - now;

         // Time calculations for days, hours, minutes and seconds
         var days = Math.floor(distance / (1000 * 60 * 60 * 24));
         var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
         var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
         var seconds = Math.floor((distance % (1000 * 60)) / 1000);
		 
         // Display the result in the element with id="demo"
         document.getElementById("days-<?php  echo $module->id;?>").innerHTML = days;
         document.getElementById("hours-<?php echo $module->id;?>").innerHTML = hours;
         document.getElementById("minutes-<?php echo $module->id;?>").innerHTML = minutes;
         document.getElementById("seconds-<?php echo $module->id;?>").innerHTML = seconds;

         // If the count down is finished, write some text 
         if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
         }
         }, 1000);
      }

      $(countdown);
   })(jQuery);

</script>

