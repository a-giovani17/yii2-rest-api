<?php

namespace app\core;

use Yii;
use yii\rest\Controller;
use app\components\AuthComponent;

class BaseController extends Controller
{

	public function beforeAction($action) {
		parent::beforeAction($action);
		$token = Yii::$app->request->get('token');
		if (AuthComponent::isAuth($token)) {
			return true;
		}
		$this->redirect('error/401');
		return false;
	}
}