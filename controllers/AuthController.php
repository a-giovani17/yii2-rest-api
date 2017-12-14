<?php

namespace app\controllers;

use Yii;
use yii\rest\Controller;
use app\models\Token;
use app\components\AuthComponent;
use app\helpers\DateHelper;

class AuthController extends Controller
{

	public function actionIndex(){
		return "auth";
	}

	public function actionView($id){
		return $id;
	}

	private function isValidLogin($username, $passwd) {
		return true;
	}

	public function actionCreate(){
		$username = Yii::$app->request->post()['username'];
		$passwd = Yii::$app->request->post()['passwd'];
		if ($this->isValidLogin($username, $passwd)) {
			$uuid = AuthComponent::generateToken();
			$token = new Token();
			$token->token = $uuid;
			$now = date('Y-m-d H:i:s');
			$token->date_expired = DateHelper::plusDays($now, 1);
			$token->save();
			return [
				'token' => $uuid,
				'date_expired' => $token->date_expired
			];
		}
		return "Login failed.";
	}
}