<?php

/**
 * Helper class for Jd CountDown! module
 * @package     JD CountDown
 * @copyright   Copyright (C) 2018 Joomdev, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */
// No direct access
defined('_JEXEC') or die;
// Include the syndicate functions only once
require_once dirname(__FILE__) . '/helper.php';
$layout = $params->get('layout', 'default');
require JModuleHelper::getLayoutPath('mod_jdcountdown', $layout);
