<?php

namespace app\controllers;

use app\core\BaseController;
use app\models\Customer;

class CustomerController extends BaseController
{

	public function actionIndex(){
		return Customer::find()->all();
    }

}