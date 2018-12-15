<?php
/**

 */

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

class JdtoursshowcaseViewCpanel extends JViewLegacy
{
	protected $_name = 'cpanel';
	
	function display($tpl = null)
	{
		//$model = $this->getModel();
		//$model->performChecks();
		
		JToolBarHelper::title( JText::_('COM_JDTOURSSHOWCASE'));
		JToolBarHelper::preferences('jdtoursshowcase', '450', '900');

		if (class_exists('JHtmlSidebar')){
			$this->sidebar = JHtmlSidebar::render();
		}

		parent::display($tpl);
	}
}


