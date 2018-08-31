<?php 
/**
 * @package	Articles Maga Menu
 * @version	1.0
 * @author	joomdev.com
 * @copyright	Copyright (C) 2008 - 2018 Joomdev.com. All rights reserved
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

$categoies = Mod_jdMegaMenu::getListA();
$category = JCategories::getInstance('Content');
$cat = $category->get($params->get('title'));

$children = $cat->getChildren();


?>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<!-- Nav tabs -->
<<<<<<< HEAD
=======
<div class="row article-magamenu-style-1">
>>>>>>> a3d00b9430ff96e80e134d49cfded995dc8adadb
<div class="col-3">
  <div class="nav flex-column nav-pills" id="tab" role="tablist" aria-orientation="vertical">
    <a class="nav-link active" data-toggle="pill" href="#tab-all" role="tab" aria-controls="tab" aria-selected="true">All</a>
    <?php $i=1; foreach($children as $child) { ?>
        <a class="nav-link" data-toggle="pill" href="#tab-<?php echo $child->title; ?>" role="tab" aria-controls="tab" aria-selected="true"><?php echo  $child->title;?></a>
    <?php $i++; } ?>
  </div>
</div>

<!-- Tab panes -->
  <div class="col-9">
    <div id="v-pills-tabContent" class="tab-content">
      <?php $i=1; foreach($children as $child) { ?>
        <div class="tab-pane fade" id="tab-<?php echo  $child->title;?>">
          <div class="row">
            <div class="col-lg-8">
              <?php  $datas = Mod_jdMegaMenu::getpostAll($child->id,1,'id','desc');?>
              <?php  foreach($datas as $data) { ?>
<<<<<<< HEAD
                <?php  $url = JRoute::_(ContentHelperRoute::getArticleRoute(  $data->id,  $data->catid )); ?>
                  <a href="<?php echo $url; ?>">  
                    <?php echo $data->title; ?>
                  </a>
                    <?php echo $child->title; ?>
                    <?php $user = JFactory::getUser($data->created_by); echo $user->name; ?>
                    <?php echo Mod_jdMegaMenu::convertString($data->created);?>
                    <?php  $images =  json_decode($data->images); echo $images->image_intro;?>
                    <img src="<?Php echo  $images->image_intro ?>">
=======
					<div class="jd-mega-menu-category-first">
						<?php  $images =  json_decode($data->images); ?><img src="<?Php echo  $images->image_intro ?>">
					</div>
					<div class="jd-mega-menu-category-first-content">
						<?php echo $data->title; ?>
						<div class="post-meta">
							<div class="jd-mega-menu-category-author">
								<?php echo $category->title; ?>
							</div>
							<div class="jd-mega-menu-category-time">
								<?php $user = JFactory::getUser($data->created_by); echo $user->name; ?>
								<?php echo Mod_jdMegaMenu::convertString($data->created);?>
							</div>
						</div>
					</div>
>>>>>>> 01eb321db6510b6ded5100fafe38e2a7fe438ca9
              <?php } ?>
            </div>
            <div class="col-lg-4"> 
              <?php  $datas = Mod_jdMegaMenu::getpostAll($child->id,5,'id','desc');?>
              <?php $i=1; foreach($datas as $data) { ?>
                <?php if($i == 1) { ?>
                <?php }else { ?>
                  <?php  $url = JRoute::_(ContentHelperRoute::getArticleRoute(  $data->id,  $data->catid )); ?>
                  <a href="<?php echo $url; ?>">  
                    <?php echo $data->title; ?>
                  </a>
                  <?php echo $child->title; ?>
                  <?php $user = JFactory::getUser($data->created_by); echo $user->name; ?>
                  <?php echo Mod_jdMegaMenu::convertString($data->created);?>
                  <?php  $images =  json_decode($data->images); echo $images->image_intro;?>
                  <a href="<?php echo $url; ?>"> 
                    <img src="<?Php echo  $images->image_intro ?>">
                  </a>
                <?php } ?>  
              <?php $i++; } ?>
            </div>
          </div>
        </div>
      <?php $i++; } ?>
      <div class="tab-pane fade active show" id="tab-all">
        <?php  $datas = Mod_jdMegaMenu::getpostAll($params->get('title'),3,'id','desc');?>
        <?php $i=1; foreach($datas as $data) { ?>
                   <?php  $url = JRoute::_(ContentHelperRoute::getArticleRoute(  $data->id,  $data->catid )); ?>
                  <a href="<?php echo $url; ?>">  
                    <?php echo $data->title; ?>
                  </a>
                  <?php echo  Mod_jdMegaMenu::getcatname($params->get('title'));?>
                  <?php $user = JFactory::getUser($data->created_by); echo $user->name; ?>
                  <?php echo Mod_jdMegaMenu::convertString($data->created);?>
                  <?php  $images =  json_decode($data->images); echo $images->image_intro;?>
                  <a href="<?php echo $url; ?>"> 
                    <img src="<?Php echo  $images->image_intro ?>">
                  </a>
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
