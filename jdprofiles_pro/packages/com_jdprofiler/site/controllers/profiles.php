<?php
/**
 
 * @package    Com_Jdprofiler
 * @author     Joomdev <info@joomdev.com>
 * @copyright  Copyright (C) 2018 Joomdev, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

/**
 * Profiles list controller class.
 *
 * @since  1.6
 */
class JdprofilerControllerProfiles extends JdprofilerController
{
	/**
	 * Proxy for getModel.
	 *
	 * @param   string  $name    The model name. Optional.
	 * @param   string  $prefix  The class prefix. Optional
	 * @param   array   $config  Configuration array for model. Optional
	 *
	 * @return object	The model
	 *
	 * @since	1.6
	 */
	public function &getModel($name = 'Profiles', $prefix = 'JdprofilerModel', $config = array())
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));

		return $model;
	}
}