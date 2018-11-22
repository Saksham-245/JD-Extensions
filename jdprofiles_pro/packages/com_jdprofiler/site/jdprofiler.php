<?php
/**
 
 * @package    Com_Jdprofiler
 * @author     Joomdev <info@joomdev.com>
 * @copyright  Copyright (C) 2018 Joomdev, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Include dependancies
jimport('joomla.application.component.controller');

JLoader::registerPrefix('Jdprofiler', JPATH_COMPONENT);
JLoader::register('JdprofilerController', JPATH_COMPONENT . '/controller.php');

$doc = JFactory::getDocument();
// Style Sheet
$doc->addStyleSheet(JURI::root().'media/com_jdprofiler/css/jd-profile-style.css');

// Execute the task.
$controller = JControllerLegacy::getInstance('Jdprofiler');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
