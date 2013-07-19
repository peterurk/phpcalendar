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
	}

	/**
	 * Returns the calendar array
	 * 
	 * @return array calendar array
	 */
	public function get() 
	{
		return $this->_data;
	}
}