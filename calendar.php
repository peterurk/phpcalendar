<?php
/**
 * Calendar Class
 */
Class calendar
{

	/**
	 * Holds all calendar data
	 * @var array
	 */
	private $_data;

	/**
	 * Constructor
	 */
	public function __construct() 
	{
		$this->_data = array();
	}

	/**
	 * Returns the calendar array
	 * 
	 * @return array calendar array
	 */
	public function getCurrent() 
	{
		// Fill data array with month numbers
		for ($m = 1;$m < 13;$m++) {
			$this->_data[$m] = array();
		}

		// Fill month array with days
		foreach ($this->_data as $key => $month) {
			// Fill array with blanks until we have the correct day of the week
			for ($blanks = 0;$blanks != date('w', mktime(0, 0, 0, $key, 1, date('Y')));$blanks++) {
				$this->_data[$key][] = " ";
			}

			// Add days to month array
			for ($day = 1;$day != (date("t", mktime(0, 0, 0, $key, 1, date('Y')))+1);$day++) {
				$this->_data[$key][] = $day;
			}

			// Fill gap at the end with blanks as well
			$ceil = ((ceil((count($this->_data[$key])/7))*7)-count($this->_data[$key]));
			for ($blanks = 0;$blanks != $ceil;$blanks++) {
				$this->_data[$key][] = " ";	
			}
		}		
		return $this->_data;
	}

	/**
	 * Get a specific month
	 * 
	 * @param  string $month Month you want to select
	 * @param  string $year  Year you want to select the month from
	 * @return array         The Calendar array
	 */
	public function getMonth($month = date('n'), $year = date('Y'))
	{
		if (!is_numeric($month) || $month < 1 || $month > 12) {
			throw new Exception("Error Processing Request", 1);
		}

		if (!is_numeric($year) || $year < 0 || $year > 2050) {
			throw new Exception("Error Processing Request", 1);
		}

		// Fill month array with days

		// Fill array with blanks until we have the correct day of the week
		for ($blanks = 0;$blanks != date('w', mktime(0, 0, 0, $month, 1, $year));$blanks++) {
			$this->_data[] = " ";
		}

		// Add days to month array
		for ($day = 1;$day != (date("t", mktime(0, 0, 0, $month, 1, $year))+1);$day++) {
			$this->_data[] = $day;
		}

		// Fill gap at the end with blanks as well
		$ceil = ((ceil((count($this->_data)/7))*7)-count($this->_data));
		for ($blanks = 0;$blanks != $ceil;$blanks++) {
			$this->_data[] = " ";	
		}

		return $this->_data;
	}

	/**
	 * Get calendar by a specific year
	 * 
	 * @param string $year Year you want to get
	 * @return array       The Calendar array
	 */
	public function getYear($year = date('Y'))
	{
		if (!is_numeric($year) || $year < 0 || $year > 2050) {
			throw new Exception("Error Processing Request", 1);
		}

		// Fill data array with month numbers
		for ($m = 1;$m < 13;$m++) {
			$this->_data[$m] = array();
		}

		// Fill month array with days
		foreach ($this->_data as $key => $month) {
			// Fill array with blanks until we have the correct day of the week
			for ($blanks = 0;$blanks != date('w', mktime(0, 0, 0, $key, 1, $year));$blanks++) {
				$this->_data[$key][] = " ";
			}

			// Add days to month array
			for ($day = 1;$day != (date("t", mktime(0, 0, 0, $key, 1, $year))+1);$day++) {
				$this->_data[$key][] = $day;
			}

			// Fill gap at the end with blanks as well
			$ceil = ((ceil((count($this->_data[$key])/7))*7)-count($this->_data[$key]));
			for ($blanks = 0;$blanks != $ceil;$blanks++) {
				$this->_data[$key][] = " ";	
			}
		}

		return $this->_data;
	}
}