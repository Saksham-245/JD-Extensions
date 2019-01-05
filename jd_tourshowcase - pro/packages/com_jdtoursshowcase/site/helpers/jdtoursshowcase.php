<?php

/**
 * @package    Com_Jdtoursshowcase
 * @author     JoomDev <info@gmail.com>
 * @copyright  2018 
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

JLoader::register('JdtoursshowcaseHelper', JPATH_ADMINISTRATOR . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'com_jdtoursshowcase' . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'jdtoursshowcase.php');

/**
 * Class JdtoursshowcaseFrontendHelper
 *
 * @since  1.6
 */
class JdtoursshowcaseHelpersJdtoursshowcase
{
	/**
	 * Get an instance of the named model
	 *
	 * @param   string  $name  Model name
	 *
	 * @return null|object
	 */
	public static function getModel($name)
	{
		$model = null;

		// If the file exists, let's
		if (file_exists(JPATH_SITE . '/components/com_jdtoursshowcase/models/' . strtolower($name) . '.php'))
		{
			require_once JPATH_SITE . '/components/com_jdtoursshowcase/models/' . strtolower($name) . '.php';
			$model = JModelLegacy::getInstance($name, 'JdtoursshowcaseModel');
		}

		return $model;
	}

	/**
	 * Gets the files attached to an item
	 *
	 * @param   int     $pk     The item's id
	 *
	 * @param   string  $table  The table's name
	 *
	 * @param   string  $field  The field's name
	 *
	 * @return  array  The files
	 */
	public static function getFiles($pk, $table, $field)
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query
			->select($field)
			->from($table)
			->where('id = ' . (int) $pk);

		$db->setQuery($query);

		return explode(',', $db->loadResult());
	}

    /**
     * Gets the edit permission for an user
     *
     * @param   mixed  $item  The item
     *
     * @return  bool
     */
    public static function canUserEdit($item)
    {
        $permission = false;
        $user       = JFactory::getUser();

        if ($user->authorise('core.edit', 'com_jdtoursshowcase'))
        {
            $permission = true;
        }
        else
        {
            if (isset($item->created_by))
            {
                if ($user->authorise('core.edit.own', 'com_jdtoursshowcase') && $item->created_by == $user->id)
                {
                    $permission = true;
                }
            }
            else
            {
                $permission = true;
            }
        }

        return $permission;
	}
	


	function hits($hits,$id){
		$db = JFactory::getDbo();

		$query = $db->getQuery(true);

		// Fields to update.
		$fields = array(
			$db->quoteName('hits') . ' = ' . $db->quote($hits)
		);

		// Conditions for which records should be updated.
		$conditions = array(
			$db->quoteName('id') . ' = '.$id, 
		);

		$query->update($db->quoteName('#__jdtoursshowcase_tours'))->set($fields)->where($conditions);

		$db->setQuery($query);

		$result = $db->execute();
	}
	function tour_type($id){
		// Get a db connection.
		$db = JFactory::getDbo();

		// Create a new query object.
		$query = $db->getQuery(true);


		$query->select($db->quoteName(array('title')));
		$query->from($db->quoteName('#__jdtoursshowcase_tour_type'));
		$query->where($db->quoteName('id') . ' = '. $db->quote($id));
		$query->order('ordering ASC');

		// Reset the query using our newly populated query object.
		$db->setQuery($query);

		
		return $result = $db->loadResult();
		 

	}
	function get_reviwes($id){
		$state = 1;
		// Get a db connection.
		$db = JFactory::getDbo();

		// Create a new query object.
		$query = $db->getQuery(true);


		$query->select("*");
		$query->from($db->quoteName('#__jdtoursshowcase_reviews'));
		$query->where($db->quoteName('tour_id') . ' = '. $db->quote($id));
		$query->where($db->quoteName('state') . ' = '. $db->quote($state));
		$query->order('id DESC');


		$db->setQuery($query);

		 $result = $db->loadObjectList();
		 return $result;

	}	
	
	function getReviewAvg($id){
		$state=1;
		// Get a db connection.
		$db = JFactory::getDbo();

		// Create a new query object.
		$query = $db->getQuery(true);


		$query->select("avg(stars) as avg");
		$query->from($db->quoteName('#__jdtoursshowcase_reviews'));
		$query->where($db->quoteName('tour_id') . ' = '. $db->quote($id));
		$query->where($db->quoteName('state') . ' = '. $db->quote($state));

		$db->setQuery($query);

		 $result = $db->loadResult();
		 return $result;

	}function getReviewCount($id){
		$state=1;
		// Get a db connection.
		$db = JFactory::getDbo();

		// Create a new query object.
		$query = $db->getQuery(true);


		$query->select("count(*) as count");
		$query->from($db->quoteName('#__jdtoursshowcase_reviews'));
		$query->where($db->quoteName('tour_id') . ' = '. $db->quote($id));
		$query->where($db->quoteName('state') . ' = '. $db->quote($state));

		$db->setQuery($query);

		$result = $db->loadResult();
		return $result;

	}
	function getReviewCountOnly(){
		$state=1;
		// Get a db connection.
		$db = JFactory::getDbo();

		// Create a new query object.
		$query = $db->getQuery(true);


		$query->select("count(*) as count");
		$query->from($db->quoteName('#__jdtoursshowcase_reviews'));
		$query->where($db->quoteName('state') . ' = '. $db->quote($state));

		$db->setQuery($query);

		$result = $db->loadResult();
		return $result;

	}
	
	function SaveReview(){
		$data = JFactory::getApplication()->input->getArray($_POST);
		print_r($data);
		
		
		
		// Create and populate an object.
		$reviews = new stdClass();
		$reviews->id = '';
		if (array_key_exists("review_name",$data))
		  {
			$reviews->name = $data['review_name'] ;				
		  }
		  if (array_key_exists("review_content",$data))
		  {
			$reviews->reivew = $data['review_content'] ;				
		  }	
		  if (array_key_exists("review_email",$data))
		  {
			$reviews->email = $data['review_email'] ;				
		  }
		  if (array_key_exists("review_tourname",$data))
		  {
			$reviews->packagename = $data['review_tourname'] ;				
		  }
		  if (array_key_exists("review_tourid",$data))
		  {
			$reviews->tour_id = $data['review_tourid'] ;				
		  }
		  if (array_key_exists("review_tourdate",$data))
		  {
			$reviews->tour_date = $data['review_tourdate'] ;				
		  }
		  if (array_key_exists("review_tourdate",$data))
		  {
			$reviews->stars = 5;				
		  }
		
		if (array_key_exists("review_name",$data)){
		
			// Insert the object into the user reviews table.
			$result = JFactory::getDbo()->insertObject('#__jdtoursshowcase_reviews', $reviews);				
		  
		}
	}

}
