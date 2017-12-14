<?php

namespace app\controllers;

use Yii;
use yii\rest\Controller;


class ErrorController extends Controller
{

	public function action401() {
		return "You are not authorized to perform this request. Please review your credentials.";
	}
}