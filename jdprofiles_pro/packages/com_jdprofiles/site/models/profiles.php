<?php

/**
 
 * @package    Com_Jdprofiles
 * @author     Joomdev <info@joomdev.com>
 * @copyright  Copyright (C) 2018 Joomdev, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;

jimport('joomla.application.component.modellist');

/**
 * Methods supporting a list of Jdprofiles records.
 *
 * @since  1.6
 */
class JdprofilesModelProfiles extends JModelList
{
	/**
	 * Constructor.
	 *
	 * @param   array  $config  An optional associative array of configuration settings.
	 *
	 * @see        JController
	 * @since      1.6
	 */
	public function __construct($config = array())
	{
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id', 'a.id',
				'name', 'a.name',
				'alias', 'a.alias',
				'state', 'a.state',
				'email', 'a.email',
				'phone', 'a.phone',
				'designation', 'a.designation',
				'image', 'a.image',
				'sbio', 'a.sbio',
				'lbio', 'a.lbio',
				'team', 'a.team',
				'location', 'a.location',
				'social', 'a.social',
				'skills', 'a.skills',
				'details', 'a.details',
				'ordering', 'a.ordering',
				'created_by', 'a.created_by',
				'modified_by', 'a.modified_by',
				'created_on', 'a.created_on',
				'modified_on', 'a.modified_on',
			);
		}

		parent::__construct($config);
	}

	/**
	 * Method to auto-populate the model state.
	 *
	 * Note. Calling getState in this method will result in recursion.
	 *
	 * @param   string  $ordering   Elements order
	 * @param   string  $direction  Order direction
	 *
	 * @return void
	 *
	 * @throws Exception
	 *
	 * @since    1.6
	 */
	protected function populateState($ordering = null, $direction = null)
	{
            $app  = Factory::getApplication();
		$list = $app->getUserState($this->context . '.list');

		$ordering  = isset($list['filter_order'])     ? $list['filter_order']     : null;
		$direction = isset($list['filter_order_Dir']) ? $list['filter_order_Dir'] : null;

		$list['limit']     = (int) Factory::getConfig()->get('list_limit', 20);
		$list['start']     = $app->input->getInt('start', 0);
		$list['ordering']  = $ordering;
		$list['direction'] = $direction;

		$app->setUserState($this->context . '.list', $list);
		$app->input->set('list', null);

            // List state information.
            parent::populateState($ordering, $direction);

            $app = Factory::getApplication();

            $ordering  = $app->getUserStateFromRequest($this->context . '.ordercol', 'filter_order', $ordering);
            $direction = $app->getUserStateFromRequest($this->context . '.orderdirn', 'filter_order_Dir', $ordering);

            $this->setState('list.ordering', $ordering);
            $this->setState('list.direction', $direction);

            $start = $app->getUserStateFromRequest($this->context . '.limitstart', 'limitstart', 0, 'int');
            $limit = $app->getUserStateFromRequest($this->context . '.limit', 'limit', 0, 'int');

            if ($limit == 0)
            {
                $limit = $app->get('list_limit', 0);
            }

            $this->setState('list.limit', $limit);
            $this->setState('list.start', $start);
	}

	/**
	 * Build an SQL query to load the list data.
	 *
	 * @return   JDatabaseQuery
	 *
	 * @since    1.6
	 */
	protected function getListQuery()
	{
            // Create a new query object.
            $db    = $this->getDbo();
            $query = $db->getQuery(true);

            // Select the required fields from the table.
            $query->select(
             $this->getState(
               'list.select', 'DISTINCT a.*'
            )
            );

            $query->from('`#__jdprofiles_profiles` AS a');
            
		// Join over the users for the checked out user.
		$query->select('uc.name AS uEditor');
		$query->join('LEFT', '#__users AS uc ON uc.id=a.checked_out');
		// Join over the tags: skills
		$query->leftJoin($db->quoteName('#__tags', 'tags') . ' ON FIND_IN_SET(tags.id, a.skills)');

		// Join over the created by field 'created_by'
		$query->join('LEFT', '#__users AS created_by ON created_by.id = a.created_by');

		// Join over the created by field 'modified_by'
		$query->join('LEFT', '#__users AS modified_by ON modified_by.id = a.modified_by');
			
		// Join over the user field 'designation'
		$query->select('`designation`.title AS `designation`');
		$query->join('LEFT', '#__jdprofiles_designation AS `designation` ON `designation`.id = a.`designation`');


		// Join over the user field 'team'	
		$query->select('`team`.title AS `team`');
		$query->join('LEFT', '#__jdprofiles_team AS `team` ON `team`.id = a.`team`'); 
		
		if (!Factory::getUser()->authorise('core.edit', 'com_jdprofiles'))
		{
			$query->where('a.state = 1');
		}

            // Filter by search in title
            $search = $this->getState('filter.search');

            if (!empty($search))
            {
                if (stripos($search, 'id:') === 0)
                {
                  $query->where('a.id = ' . (int) substr($search, 3));
                }
                else
                {
               	$search = $db->Quote('%' . $db->escape($search, true) . '%');
						$query->where('( a.name LIKE ' . $search . '  OR  a.email LIKE ' . $search . '  OR  a.phone LIKE ' . $search . ' )');
               }
            }

            // Add the list ordering clause.
            $orderCol  = $this->state->get('list.ordering', "a.id");
            $orderDirn = $this->state->get('list.direction', "ASC");

            if ($orderCol && $orderDirn)
            {
               $query->order($db->escape($orderCol . ' ' . $orderDirn));
            }
            return $query;
	}

	/**
	 * Method to get an array of data items
	 *
	 * @return  mixed An array of data on success, false on failure.
	 */
	public function getItems()
	{
		$items = parent::getItems();
		
		foreach ($items as $item)
		{

			if (isset($item->skills))
			{
				// Catch the item tags (string with ',' coma glue)
				$tags = explode(",", $item->skills);
				$db   = Factory::getDbo();

				// Cleaning and initalization of named tags array
				$namedTags = array();

				// Get the tag names of each tag id
				foreach ($tags as $tag)
				{
					$query = $db->getQuery(true);
					$query->select("title");
					$query->from('`#__tags`');
					$query->where("id=" . intval($tag));

					$db->setQuery($query);
					$row = $db->loadObjectList();

					// Read the row and get the tag name (title)
					if (!is_null($row))
					{
						foreach ($row as $value)
						{
							if ( $value && isset($value->title))
							{
								$namedTags[] = trim($value->title);
							}
						}
					}
				}

				// Finally replace the data object with proper information
				$item->skills = !empty($namedTags) ? implode(', ', $namedTags) : $item->skills;
			}
		}

		return $items;
	}

	/**
	 * Overrides the default function to check Date fields format, identified by
	 * "_dateformat" suffix, and erases the field if it's not correct.
	 *
	 * @return void
	 */
	protected function loadFormData()
	{
		$app              = Factory::getApplication();
		$filters          = $app->getUserState($this->context . '.filter', array());
		$error_dateformat = false;

		foreach ($filters as $key => $value)
		{
			if (strpos($key, '_dateformat') && !empty($value) && $this->isValidDate($value) == null)
			{
				$filters[$key]    = '';
				$error_dateformat = true;
			}
		}

		if ($error_dateformat)
		{
			$app->enqueueMessage(JText::_("COM_JDPROFILES_SEARCH_FILTER_DATE_FORMAT"), "warning");
			$app->setUserState($this->context . '.filter', $filters);
		}

		return parent::loadFormData();
	}

	/**
	 * Checks if a given date is valid and in a specified format (YYYY-MM-DD)
	 *
	 * @param   string  $date  Date to be checked
	 *
	 * @return bool
	 */
	private function isValidDate($date)
	{
		$date = str_replace('/', '-', $date);
		return (date_create($date)) ? Factory::getDate($date)->format("Y-m-d") : null;
	}
}