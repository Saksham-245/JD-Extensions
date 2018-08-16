
<?php
/**
 * @package	JD profile Showcase
 * @subpackage  mod_jdprofileshowcase
 * @version	1.0
 * @author	Joomdev.com
 * @copyright	Copyright (C) 2008 - 2018 Joomdev.com. All rights reserved
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;
$doc = JFactory::getDocument();
// Style Sheet
$doc->addStyleSheet(JURI::root().'media/mod_jdprofileshowcase/assets/css/jd-profile-style.css');
$doc->addStyleSheet(JURI::root().'media/mod_jdprofileshowcase/assets/css/jd-profile-style.css.map');

class modJdprofileShowcaseHelper {
    public function  profiles(){
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);
        $query->select('*');
        $query->from('#__jdprofiles_profiles');
        $query->where('state = 1');
        $query->order('ordering desc');
        $db->setQuery($query);
        $results = $db->loadObjectList();
        return $results;
    }
}
