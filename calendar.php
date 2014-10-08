
<?php
/**
 * PHP Calendar
 */

class Calendar
{

	private $data;

	/**
	 * 
	 */
	public function __construct($config = false)
	{

	}

	public function create($year = false)
	{
		if (false === $year) {
			$now = new DateTime('now');
			$year = $now->format('Y');
		}

		$range = range(1, 12);
		$this->data = array_combine($range, $range);
		foreach ($this->data as $m) {
			$date = DateTime::createFromFormat('m::Y', $m.'::'.$year);
			$range = range(1, $date->format('t'));
			$this->data[$m] = array_combine($range, $range);
			foreach ($this->data[$m] as $d) {
				$date = DateTime::createFromFormat('m-d::Y', $m.'-'.$d.'::'.$year);
				$this->data[$m][$d] = $date->format('w');
			}
		}
	}

	public function render()
	{
		return $this->data;
	}
}
