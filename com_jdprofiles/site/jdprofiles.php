<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Jdprofiles
 * @author     Team Joomdev <info@joomdev.com>
 * @copyright  Copyright (C) 2018 Joomdev, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Include dependancies
jimport('joomla.application.component.controller');

JLoader::registerPrefix('Jdprofiles', JPATH_COMPONENT);
JLoader::register('JdprofilesController', JPATH_COMPONENT . '/controller.php');

$doc = JFactory::getDocument();
// Style Sheet
$doc->addStyleSheet(JURI::root().'media/com_jdprofiles/css/jd-profile-style.css');
$doc->addStyleSheet(JURI::root().'media/com_jdprofiles/css/jd-profile-style.css.map');

// Execute the task.
$controller = JControllerLegacy::getInstance('Jdprofiles');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
