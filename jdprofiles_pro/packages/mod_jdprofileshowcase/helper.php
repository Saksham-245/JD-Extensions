
<?php
/**
 * @package	JD profile Showcase
 * @subpackage  mod_jdprofileshowcase
 * @author	Joomdev.com
 * @copyright	Copyright (C) 2008 - 2018 Joomdev.com. All rights reserved
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;
$doc = JFactory::getDocument();
// Style Sheet
$doc->addStyleSheet(JURI::root().'media/mod_jdprofileshowcase/assets/css/jd-profile-style.css');
// Style Sheet
if($params->get('load_bootstrap', 1)){
	$doc->addStyleSheet('https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css');
}
if($params->get('load_fontawesome', 1)){
	$doc->addStyleSheet('https://use.fontawesome.com/releases/v5.3.1/css/all.css');
}
class modJdprofileShowcaseHelper {
    public function profiles($team,$limit,$designation){
        // Get a db connection.
        $db = JFactory::getDbo();

        // Create a new query object.
        $query = $db->getQuery(true);

        //  query

        $query
            ->select(array('a.*', 'b.title'))
            ->from($db->quoteName('#__jdprofiles_profiles', 'a'))
            ->join('INNER', $db->quoteName('#__jdprofiles_designation', 'b') . ' ON (' . $db->quoteName('a.designation') . ' = ' . $db->quoteName('b.id') . ')')
            ->Where($db->quoteName('a.state') . ' = '. $db->quote(1))
            ->Where($db->quoteName('a.team') . ' = '. $db->quote($team))
            ->Where($db->quoteName('a.designation') . ' = '. $db->quote($designation))
            ->order('id DESC')
            ->setLimit($limit);
            // Reset the query using our newly populated query object.
            $db->setQuery($query);

             // Load the results as a list of stdClass objects (see later for more options on retrieving data).
            $results = $db->loadObjectList();
        return $results;
    }
}
