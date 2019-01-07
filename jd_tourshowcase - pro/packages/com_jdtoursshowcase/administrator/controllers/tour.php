<?php
/**
 
 * @package    Com_Jdtoursshowcase
 * @author     JoomDev <info@gmail.com>
 * @copyright   2019 
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Tour controller class.
 *
 * @since  1.6
 */
class JdtoursshowcaseControllerTour extends JControllerForm
{
	/**
	 * Constructor
	 *
	 * @throws Exception
	 */
	public function __construct()
	{
		$this->view_list = 'tours';
		parent::__construct();
	}
}
