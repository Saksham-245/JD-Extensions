<?php
/**
 * @package	Article Maga Menu
 * @version	1.0
 * @author	joomdev.com
 * @copyright	Copyright (C) 2008 - 2018 Joomdev.com. All rights reserved
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die('Unauthorized Access');
class Mod_jdMegaMenu
{
    public static function getListA(){
			$db = JFactory::getDbo();
			$query = $db->getQuery(true)
				->select('id, title')
				->from('#__categories')->where('#__categories.extension = "com_content" AND title != "Uncategorised"');
			$db->setQuery($query);
			$items = $db->loadObjectList();
			return $items;
		}
	
		public static function getpost($order,$sorting,$limit) {
				$db = JFactory::getDbo();
				$tag_query = "SELECT * FROM `#__content` ORDER BY ".$order." ".$sorting." LIMIT ".$limit."";
				$db->setQuery($tag_query);
				$posts = $db->loadObjectList();
				return $posts;
		}
	
		public static function getpostAll($catid,$limit,$ordering,$sort)
		  {
			$db = JFactory::getDbo();
			$tag_query = "SELECT * FROM `#__content` where catid=".$catid."  ORDER BY ".$ordering." ".$sort." LIMIT ".$limit."";
			$db->setQuery($tag_query);
			$posts = $db->loadObjectList();
			return $posts;
		} 
	
		public static function getcatname($id)
		{
			$db = JFactory::getDbo();
			$tag_query = "SELECT * FROM `#__categories` WHERE extension = 'com_content' and id = ".$id."" ;
			$db->setQuery($tag_query);
			$result = $db->loadObjectList();
			return $result;
		}	
	
		//title word limit
		public static function limit_text_classic($text, $limit) {
			if (str_word_count($text, 0) > $limit) {
			  $words = str_word_count($text, 2);
			  $pos = array_keys($words);
			  $text = substr($text, 0, $pos[$limit]) . '...';
		  }
		  return $text;
		}

		 // function to convert string and print
		 public static function convertString ($date)
		 {
				 // convert date and time to seconds
				 $sec = strtotime($date);
	
				 // convert seconds into a specific format
				 $date = date("M d ,Y", $sec);
	
				 // print final date and time
				 return  $date;
		 }
		
}