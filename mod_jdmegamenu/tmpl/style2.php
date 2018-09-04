<?php 
/**
 * @package	EB Maga Menu
 * @version	1.0
 * @author	joomdev.com
 * @copyright	Copyright (C) 2008 - 2018 Joomdev.com. All rights reserved
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
?>
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

$children = $cat->getChildren()

?>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<!-- Nav tabs -->
<div class="row py-3 m-0 article-magamenu style-2">
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
							<?php  $datas = Mod_jdMegaMenu::getpostAll($child->id,3,'id','desc');?>
							<?php  foreach($datas as $data) { ?>
							   <div class="col-lg-4">
									<?php  $url = JRoute::_(ContentHelperRoute::getArticleRoute(  $data->id,  $data->catid )); ?><?php  $url = JRoute::_(ContentHelperRoute::getArticleRoute(  $data->id,  $data->catid )); ?>
									<?php  $images =  json_decode($data->images); ?>
								   <div class="jd-mega-menu-category-first" style="background-image: url(<?Php echo  $images->image_intro ?>)">
									   <div class="jd-mega-menu-category-first-content">
											<div class="jd-mega-menu-category-tag">
												<?php echo $child->title; ?>
											</div>
											<div class="jd-mega-menu-category-title my-2">
											 <a href="<?php echo $url; ?>">  
												<?php echo $data->title; ?>
											  </a>
											</div>
											<div class="post-meta">
												<div class="jd-mega-menu-category-author">
													<i class="fa fa-user"></i> <?php $user = JFactory::getUser($data->created_by); echo $user->name; ?>
												</div>
												<div class="jd-mega-menu-category-time">
													<?php echo Mod_jdMegaMenu::convertString($data->created);?>
												</div>
											</div>
										</div>
									</div>
								</div>
						  <?php } ?>
					</div>
				</div>
			<?php $i++; } ?>
			<div class="tab-pane fade active show" id="tab-all">
				<div class="row">
						<?php  $datas = Mod_jdMegaMenu::getpostAll($params->get('title'),3,'title','asc');?>
						<?php  foreach($datas as $data) { ?>
						   <div class="col-lg-4">
								<?php  $url = JRoute::_(ContentHelperRoute::getArticleRoute(  $data->id,  $data->catid )); ?>
								<?php  $images =  json_decode($data->images); ?>
							   <div class="jd-mega-menu-category-first" style="background-image: url(<?Php echo  $images->image_intro ?>)">
								   <div class="jd-mega-menu-category-first-content">
										<div class="jd-mega-menu-category-tag">
											<?php  echo Mod_jdMegaMenu::getcatname($params->get('title'));?>
										</div>
										<div class="jd-mega-menu-category-title my-2">
										 <a href="<?php echo $url; ?>">  
											<?php echo $data->title; ?>
										  </a>
										</div>
										<div class="post-meta">
											<div class="jd-mega-menu-category-author">
												<i class="fa fa-user"></i> <?php $user = JFactory::getUser($data->created_by); echo $user->name; ?>
											</div>
											<div class="jd-mega-menu-category-time">
												<?php echo Mod_jdMegaMenu::convertString($data->created);?>
											</div>
										</div>
									</div>
								</div>
							</div>   
						<?php } ?>
				</div>
			</div>
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
