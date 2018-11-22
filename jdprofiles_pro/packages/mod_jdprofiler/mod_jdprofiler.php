<?php

/**
 * @package    Com_Jdprofiler 
 * @author     JoomDev
 * @copyright  Copyright (C) 2018 Joomdev, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access
defined('_JEXEC') or die;
// Include the syndicate functions only once
require_once dirname(__FILE__) . '/helper.php';

if($params->get('template') == 'grid_layout'){
    $layout=$params->get('grid_template');
}elseif($params->get('template') == 'carousel_layout'){
    $layout=$params->get('carousel_template');
}else{
    $layout=$params->get('template');
}
$display_all = $params->get('display_all');
$team = $params->get('team');
$designation = $params->get('designation');
$gutter_space = $params->get('gutter_space'); 
$margin = $params->get('margin'); 
if($display_all){
    $limit = 100;
}else{
   
    $limit = $params->get('limit', 100);
}

$profilerClass  = new modJdprofilerHelper();
$profiles = $profilerClass->profiles($team,$limit,$designation);
         
require JModuleHelper::getLayoutPath('mod_jdprofiler', $layout);
