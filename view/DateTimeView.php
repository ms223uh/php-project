<?php

class DateTimeView {


	public function show() {

		date_default_timezone_set('Europe/Stockholm');

		$dt = getdate();
		$dt2 = date("H:m:s");
		$dt3 = date("jS");
 		$showDate = "$dt[weekday], the $dt3 of $dt[month] $dt[year], The time is $dt2";

		$timeString = 'TODO, Write servertime here...';

		return '<p>' . $showDate . '</p>';
	}
}