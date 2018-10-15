<?php
   /**
    
    * @package    Com_JdProfiles
    * @author     Joomdev <info@joomdev.com>
    * @copyright  Copyright (C) 2018 Joomdev, Inc. All rights reserved.
    * @license    GNU General Public License version 2 or later; see LICENSE.txt
    */
   // No direct access
   defined('_JEXEC') or die;
   
   JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
   JHtml::_('bootstrap.tooltip');
   JHtml::_('behavior.multiselect');
   JHtml::_('formbehavior.chosen', 'select');
   
   $user       = JFactory::getUser();
   $userId     = $user->get('id');
   $listOrder  = $this->state->get('list.ordering');
   $listDirn   = $this->state->get('list.direction');
   $canCreate  = $user->authorise('core.create', 'com_jditems') && file_exists(JPATH_COMPONENT . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'forms' . DIRECTORY_SEPARATOR . 'itemform.xml');
   $canEdit    = $user->authorise('core.edit', 'com_jditems') && file_exists(JPATH_COMPONENT . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'forms' . DIRECTORY_SEPARATOR . 'itemform.xml');
   $canCheckin = $user->authorise('core.manage', 'com_jditems');
   $canChange  = $user->authorise('core.edit.state', 'com_jditems');
   $canDelete  = $user->authorise('core.delete', 'com_jditems');
   $view  = $this->params->get('layout');
   
   $layout = new JLayoutFile($view, null);
   echo $layout->render($this);
   ?>