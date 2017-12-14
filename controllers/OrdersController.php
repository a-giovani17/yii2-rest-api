<?php

namespace app\controllers;

use yii\rest\Controller;
use app\models\Orders;
use app\components\AuthComponent;
use app\core\BaseController;

class OrdersController extends BaseController
{

	public function actionIndex($token){
        $orders = Orders::find()->all();
        $data = [];
        foreach ($orders as $order) {
        	$order->customer['passwd'] = "****";
        	$item = [
        		'order' => $order,
        		'order_customer' => $order->customer,
        	];
        	array_push($data, $item);
        }
        return $data;
    }
}