<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "og_token".
 *
 * @property integer $id
 * @property string $token
 * @property string $date_expired
 */
class Token extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'og_token';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['token', 'date_expired'], 'required'],
            [['date_expired'], 'safe'],
            [['token'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'token' => 'Token',
            'date_expired' => 'Date Expired',
        ];
    }
}
