<?php

class SK_Nyko_Areas_Helper {
	
	private static $m_areas = array();


	private function __construct() {

	}

	/**
	 * 
	 * Adds a area to the collection of areas
	 * 
	 * @param SK_Nyko_Area $area the area to add
	 */
	public static function add_area($area) {
		self::$m_areas[] = $area;
	}

	/**
	 * 
	 * Lookups the area based on the provided nykoid
	 * 
	 * @param  string $nykoId the id to lookup
	 * @return string name of the area
	 */
	public static function area_id_to_display_name($nykoId) {

		switch ($nykoId) {
		    case "1":
		        return "Sundsvalls tätort";
		    case "2":
		        return "Alnö";
		    case "3":
		        return "Sättna";
		    case "4":
		        return "Njurunda tätort";
		    case "5":
		        return "Njurunda glesbygd";
		    case "6":
		        return "Matfors";
		    case "7":
		        return "Stöde";
		    case "8":
		        return "Indal-Liden";
		    default:
		        return null;
		}
	}

	/**
	 * 
	 * Lookups the area based on the provided nykoid
	 * 
	 * @param  string $nykoId the id to lookup
	 * @return string name of the area
	 */
	public static function display_name_to_area_id($nykoId) {

		switch ($nykoId) {
		    case "Sundsvalls tätort":
		        return "1";
		    case "Alnö":
		        return "2";
		    case "Sättna":
		        return "3";
		    case "Njurunda tätort":
		        return "4";
		    case "Njurunda glesbygd":
		        return "5";
		    case "Matfors":
		        return "6";
		    case "Stöde":
		        return "7";
		    case "Indal-Liden":
		        return "8";
		    default:
		        return null;
		}
	}


	private static function init_areas() {
		self::add_area(new SK_Nyko_Area('0', 'Alla')); 
		self::add_area(new SK_Nyko_Area('1', 'Sundsvalls tätort')); 
		self::add_area(new SK_Nyko_Area('2', 'Alnö')); 
		self::add_area(new SK_Nyko_Area('3', 'Sättna')); 
		self::add_area(new SK_Nyko_Area('4', 'Njurunda tätort')); 
		self::add_area(new SK_Nyko_Area('5', 'Njurunda glesbygd')); 
		self::add_area(new SK_Nyko_Area('6', 'Matfors')); 
		self::add_area(new SK_Nyko_Area('7', 'Stöde')); 
		self::add_area(new SK_Nyko_Area('8', 'Indal-Liden')); 
	}

	/*
	 * get areas from post type ?
	 */
	public static function get_areas() {

		if (empty($m_areas)) {
			self::init_areas();
		}
		
		return self::$m_areas;
	}
}