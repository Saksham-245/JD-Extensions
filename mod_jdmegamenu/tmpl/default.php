<?php
/**
 * @package	EB Maga Menu
 * @version	1.0
 * @author	joomdev.com
 * @copyright	Copyright (C) 2008 - 2018 Joomdev.com. All rights reserved
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
	defined('_JEXEC') or die('Unauthorized Access');

	$design =  $params->get('design'); 
	require(JModuleHelper::getLayoutPath('mod_jdmegamenu',$design));

?>
