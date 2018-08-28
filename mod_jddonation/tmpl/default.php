<?php
defined('_JEXEC') or die;
$paypalaccount = $params->get('paypalaccount', '');
$currency = $params->get('currency', []);
$buttontext = $params->get('buttontext','Donate Now');
$campaign = $params->get('campaign','Demo Campaign');

$currencies=explode(",", $currency);
?>

<form action="https://www.paypal.com/cgi-bin/webscr"  target="_blank" method="post">
      <input type="hidden" name="business"
      value="demo@demo.org">

      <!-- Specify a Donate button. -->
      <input type="hidden" name="cmd" value="_donations">

      <!-- Specify details about the contribution -->
      <input type="hidden" name="item_name" value="">
      <input type="hidden" name="item_number" value="<?php echo $campaign;  ?>">
      <input type="hidden" name="currency_code" value="<?php echo $currencies[0]; ?>">
   <div class="row no-gutters input-section pt-5 pb-7">
      <h4 class="title-heading-two col-12 text-center mb-4"><?php echo  $module->title;  ?></h4>
      <div class="col-md-3"></div>
<<<<<<< HEAD
      <div class="col-md-12 col-lg-4 py-1">
         <input class="form-control rounded-control"  name="amount" value="25.00" placeholder="" type="text">
=======
      <div class="col-md-4 py-1">
         <input class="form-control rounded-control"  name="amount" value="" placeholder="<?php echo $currencies[1]?>25.0" type="text">
>>>>>>> fac5266d1f504b7de65eb23b65b1531f39f9603f
      </div>
      <div class="col-md-12 col-lg-3 py-1 offset-btn">
            <button class="btn btn-primary" type="submit" name="submit"><?php echo $buttontext; ?></button>
      </div>
      <div class="col-md-3"></div>
   </div>
</form>
