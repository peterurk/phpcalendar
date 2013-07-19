<?php
/**
 * Index
 *
 * You'll find a usage example in this file
 */
require "calendar.php";

$calendar = new calendar;
$data = $calendar->getCurrent();

?>
<style>
body {
	font-family: Arial;
}

.month {
	width: 200px;
	height: 320px;
	border: 1px solid #000000;
	padding: 10px;
}

.month td {
	padding: 5px;
	border: 1px solid #000000;
	text-align: center;
}
</style>
<table>
	<tr>
	<?php foreach($data as $m => $month): ?>
		<td>
			<table border="0" cellpadding="2" cellspacing="1" class="month">
				<tr>
					<td colspan="7"><center><h4><?= date("F", mktime(0, 0, 0, $m, 1, date('Y'))); ?></h4></center></td>
				</tr>
				<tr>
					<td>Sun</td>
					<td>Mon</td>
					<td>Tue</td>
					<td>Wed</td>
					<td>Thu</td>
					<td>Fri</td>
					<td>Sat</td>
				</tr>
				<tr>
				<?php foreach($month as $d => $day): ?>
					<td><?= is_numeric($day) ? $day : "&nbsp;"; ?></td>
					<?php if (($d+1) % 7 == 0 && ($d+1) != count($month)): ?>
						</tr>
						<tr>
					<?php endif; ?>
				<?php endforeach; ?>
				</tr>
			</table>
		</td>
		<?php if ($m % 4 == 0 && $m != count($data)): ?>
			</tr>
			<tr>
		<?php endif; ?>
	<?php endforeach; ?>
	</tr>
</table>