
<?php
/**
 * @package	JD profile Showcase
 * @subpackage  mod_jdprofileshowcase
 * @version	1.0.0
 * @author	Joomdev.com
 * @copyright	Copyright (C) 2008 - 2018 Joomdev.com. All rights reserved
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;
$doc = JFactory::getDocument();
// Style Sheet
$doc->addStyleSheet(JURI::root().'media/mod_jdprofileshowcase/assets/css/jd-profile-style.css');

class modJdprofileShowcaseHelper {
    public function  profiles($limit,$designations){
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);
        $query->select('*');
        $query->from('#__jdprofiles_profiles');
        foreach($designations as $designation){
            $query->Where($db->quoteName('designation') . ' LIKE '. $db->quote($designation),'or');
        }
        $query->setLimit($limit);
        $db->setQuery($query);
        $results = $db->loadObjectList();
        return $results;
    }
}
