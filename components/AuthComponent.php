<?php

namespace app\components;

use app\models\Token;

class AuthComponent {

	public static function isAuth($token){
		$now = date('Y-m-d H:i:s');
		$row = Token::find()
		->where(['token' => $token])
		->andWhere(['>=', 'date_expired', $now])
		->one();
		return $row != null;
	}

	public static function generateToken(){
		//UUID
		return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
	        mt_rand(0, 0xffff), mt_rand(0, 0xffff),
	        mt_rand(0, 0xffff),
	        mt_rand(0, 0x0fff) | 0x4000,
	        mt_rand(0, 0x3fff) | 0x8000,
	        mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
	    );
	}
}