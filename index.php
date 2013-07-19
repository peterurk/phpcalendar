<?php
/**
 * PHP Calendar
 *
 * @author Peter Post <peterurk@gmail.com>
 */
<style>
body {
	font-family: Arial;
}

.tab {
	width: 200px;
	height: 320px;
	border: 1px solid #000000;
	padding: 10px;
}

.tab td {
	padding: 5px;
	border: 1px solid #000000;
}
</style>
<?php

echo "<table>\n\t<tr>\n";
for ($m = 1;$m < 13;$m++) {
	echo "\t\t<td>\n\t\t\t<table border='0' cellpadding='2' cellspacing='1' class='tab'>\n";
	echo "\t\t\t\t<tr>\n\t\t\t\t\t<td colspan='7'><center><h4>".date("F",mktime(0, 0, 0, $m, 1, date('Y')))."</h4></center></td>\n\t\t\t\t</tr>\n\t\t\t\t<tr>\n";
	echo "\t\t\t\t\t<td>Sun</td>\n\t\t\t\t\t<td>Mon</td>\n\t\t\t\t\t<td>Tue</td>\n\t\t\t\t\t<td>Wed</td>\n\t\t\t\t\t<td>Thu</td>\n\t\t\t\t\t<td>Fri</td>\n\t\t\t\t\t<td>Sat</td>\n\t\t\t\t</tr>\n\t\t\t\t<tr>\n";
	$s = 0;
	for ($k = 0;$k != date('w', mktime(0, 0, 0, $m, 1, date('Y')));$k++) {
		echo "\t\t\t\t\t<td>&nbsp;</td>";
		$s++;
	}
	for ($i = 1;$i != (date("t",mktime(0, 0, 0, $m, 1, date('Y')))+1);$i++) {
		if (date('n') == $m && date('j') == $i) {
			echo "\t\t\t\t\t<td><center><b>".$i."</b></center></td>\n";
		} else {
			echo "\t\t\t\t\t<td><center>".$i."</center></td>\n";
		}
		$s++;
		if ($s % 7 == 0) {
			echo "\t\t\t\t</tr>\n";
			$s = 0;
		}
		if ($s % 7 == 0 && date("t",mktime(0, 0, 0, $m, 1, date('Y'))) != $i) {
			echo "\t\t\t\t<tr>\n";	
			$s = 0;
		}
	}
	if ($s % 7 != 0) {
		for ($a = 1;$a != (8-$s);$a++) {
			echo "\t\t\t\t\t<td>&nbsp;</td>\n";
		}
	}	
	echo "\t\t\t\t</tr>\n\t\t\t</table>\n\t\t</td>\n";
	if ($m % 4 == 0 && $m != 12) {
		echo "\t</tr>\n<tr>\n";	
	}
}
echo "\t</tr>\n</table>\n";
?>