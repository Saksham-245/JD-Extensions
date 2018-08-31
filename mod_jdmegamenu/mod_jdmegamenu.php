<?php
defined('_JEXEC') or die('Unauthorized Access');
	// Include the helper functions only once
    JLoader::register('mod_jdmegamenu', __DIR__ . '/helper.php');
    require(JModuleHelper::getLayoutPath('mod_jdmegamenu'));
?>