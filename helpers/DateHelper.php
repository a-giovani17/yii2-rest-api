<?php

namespace app\helpers;

class DateHelper {

	public static function plusDays($date, $day) {
		return date('Y-m-d H:i:s', strtotime($date . ' +'.$day.' days'));
	}
}