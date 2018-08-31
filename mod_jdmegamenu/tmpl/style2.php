<?php 
/**
 * @package	EB Maga Menu
 * @version	1.0
 * @author	joomdev.com
 * @copyright	Copyright (C) 2008 - 2018 Joomdev.com. All rights reserved
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
?>
STYlE 2
<?php 
/**
 * @package	Articles Maga Menu
 * @version	1.0
 * @author	joomdev.com
 * @copyright	Copyright (C) 2008 - 2018 Joomdev.com. All rights reserved
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

$categoies = Mod_jdMegaMenu::getListA();


?>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<!-- Nav tabs -->
<div class="row">
<div class="col-3">
  <div class="nav flex-column nav-pills" id="tab" role="tablist" aria-orientation="vertical">
    <?php $i=1; foreach($categoies as $category) { ?>
        <a class="nav-link <?php echo ($i==1) ? 'active' : '' ?>" data-toggle="pill" href="#tab-<?php echo $category->title; ?>" role="tab" aria-controls="tab" aria-selected="true"><?php echo  $category->title;?></a>
    <?php $i++; } ?>
  </div>
</div>

<!-- Tab panes -->
  <div class="col-9">
    <div id="v-pills-tabContent" class="tab-content">
      <?php $i=1; foreach($categoies as $category) { ?>
        <div class="tab-pane fade <?php echo ($i==1) ? 'show active' : '' ?>"" id="tab-<?php echo  $category->title;?>">
          <div class="row">
              <?php  $datas = Mod_jdMegaMenu::getpostAll($category->id,3,'id','desc');?>
              <?php  foreach($datas as $data) { ?>
               <div class="col-lg-4">
                    <?php echo $data->title; ?>
                    <?php echo $category->title; ?>
                    <?php $user = JFactory::getUser($data->created_by); echo $user->name; ?>
                    <?php echo Mod_jdMegaMenu::convertString($data->created);?>
                    <?php  $images =  json_decode($data->images); echo $images->image_intro;?>
                    <img src="<?Php echo  $images->image_intro ?>">
               </div>     
              <?php } ?>
          </div>
        </div>
      <?php $i++; } ?> 
    </div>
  </div>
</div>
<script>
	(function ($) {
		var docReady = function () {
        $(".nav-tabs a").hover(function(){
          $(this).tab('show');
      });
		};
		$(docReady);
	})(jQuery);
</script>
