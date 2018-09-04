<?php 
/**
 * @package	EB Maga Menu
 * @version	1.0
 * @author	joomdev.com
 * @copyright	Copyright (C) 2008 - 2018 Joomdev.com. All rights reserved
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

$catid  =   $params->get('title');
if($catid != 'all'){
   $posts  =   Mod_jdMegaMenu::getpostAll($catid,$params->get('count'),'id','desc');
}else{
   $posts  =   Mod_jdMegaMenu::getpost('id','desc',$params->get('count'));
}
?>

<div class="row py-3 m-0 article-magamenu style-3">
   <?php foreach($posts  as $post)  {?>
      <div class="col-lg-<?php echo $params->get('column'); ?>">
		<?php  $url = JRoute::_(ContentHelperRoute::getArticleRoute(  $post->id,  $post->catid )); ?><?php  $url = JRoute::_(ContentHelperRoute::getArticleRoute(  $post->id,  $post->catid )); ?>
		<?php  $images =  json_decode($post->images); ?>
		<div class="jd-mega-menu-category-first" style="background-image: url(<?Php echo  $images->image_intro ?>)">
			<div class="jd-mega-menu-category-first-content">
				<div class="jd-mega-menu-category-tag">
					<?php  echo Mod_jdMegaMenu::getcatname($params->get('title'));?>
				</div>
				<div class="jd-mega-menu-category-title my-2">
					<a href="<?php echo $url; ?>">  
						<?php if($params->get('truncate')){
						   echo Mod_jdMegaMenu::limit_text_classic($post->title,$params->get('title_limit'));
						}else{
						   echo   $post->title;
						} ?>
					 </a>
				</div>
				<div class="post-meta">
					<div class="jd-mega-menu-category-author">
						<i class="fa fa-user"></i> <?php $user = JFactory::getUser($post->created_by); echo $user->name; ?>
					</div>
					<div class="jd-mega-menu-category-time">
						<?php echo Mod_jdMegaMenu::convertString($post->created);?>
					</div>
				</div>
			</div>
		</div>
			
      </div>
   <?php } ?>
</div>