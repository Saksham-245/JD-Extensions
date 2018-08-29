<?php
/**
 * @package DJ-Events
 * @copyright Copyright (C) DJ-Extensions.com, All rights reserved.
 * @license http://www.gnu.org/licenses GNU/GPL
 * @author url: http://dj-extensions.com
 * @author email contact@dj-extensions.com
 * @developer Szymon Woronowski - szymon.woronowski@design-joomla.eu
 *
 */

defined ('_JEXEC') or die('Restricted access');
?>
<div class="djev_gallery">
	<?php $image = $this->images[0]; ?>
	<div class="djev_poster">
		<?php if(!empty($image->video)) { ?> 
			<a class="djev_media_link mfp-iframe" href="<?php echo $image->video; ?>">
				<img alt="<?php echo $image->title; ?>" src="<?php echo $image->thumb; ?>" />
				<i class="fa fa-play"></i>
			</a>
		<?php } else if(!empty($this->item->thumb)) { ?>
			<a class="djev_media_link" data-title="<?php echo $image->title; ?>" href="<?php echo $image->image; ?>">
				<img alt="<?php echo $image->title; ?>" src="<?php echo $this->item->thumb; ?>" />
			</a>
		<?php } ?>
	</div>

	<?php if (count($this->images) > 1) { ?>
		<div class="djev_thumbnails">
			<div class="row-fluid">
			<?php for($i = 0; $i < count($this->images) - 1; $i++) { 
				if($i && $i % 3 == 0) { ?>
					</div><div class="row-fluid">
				<?php } 
				$image = $this->images[$i+1];
				?>
				<div class="djev_thumb span4">
					<?php if(!empty($image->video)) { ?> 
						<a class="djev_media_link mfp-iframe" href="<?php echo $image->video; ?>">
							<img alt="<?php echo $image->title; ?>" src="<?php echo $image->small; ?>" />
							<i class="fa fa-play"></i>
						</a>
					<?php } else { ?>
						<a class="djev_media_link" data-title="<?php echo $image->title; ?>" href="<?php echo $image->image; ?>">
							<img alt="<?php echo $image->title; ?>" src="<?php echo $image->small; ?>" />
						</a>
					<?php } ?>
				</div>
				<?php } ?>
			</div>
		</div>
	<?php } ?>
</div>