<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ps_customer".
 *
 * @property string $id_customer
 * @property string $id_shop_group
 * @property string $id_shop
 * @property string $id_gender
 * @property string $id_default_group
 * @property string $id_lang
 * @property string $id_risk
 * @property string $company
 * @property string $siret
 * @property string $ape
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $passwd
 * @property string $last_passwd_gen
 * @property string $birthday
 * @property integer $newsletter
 * @property string $ip_registration_newsletter
 * @property string $newsletter_date_add
 * @property integer $optin
 * @property string $website
 * @property string $outstanding_allow_amount
 * @property integer $show_public_prices
 * @property string $max_payment_days
 * @property string $secure_key
 * @property string $note
 * @property integer $active
 * @property integer $is_guest
 * @property integer $deleted
 * @property string $date_add
 * @property string $date_upd
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ps_customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_shop_group', 'id_shop', 'id_gender', 'id_default_group', 'id_lang', 'id_risk', 'newsletter', 'optin', 'show_public_prices', 'max_payment_days', 'active', 'is_guest', 'deleted'], 'integer'],
            [['id_gender', 'firstname', 'lastname', 'email', 'passwd', 'date_add', 'date_upd'], 'required'],
            [['last_passwd_gen', 'birthday', 'newsletter_date_add', 'date_add', 'date_upd'], 'safe'],
            [['outstanding_allow_amount'], 'number'],
            [['note'], 'string'],
            [['company'], 'string', 'max' => 64],
            [['siret'], 'string', 'max' => 14],
            [['ape'], 'string', 'max' => 5],
            [['firstname', 'lastname', 'passwd', 'secure_key'], 'string', 'max' => 32],
            [['email', 'website'], 'string', 'max' => 128],
            [['ip_registration_newsletter'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_customer' => 'Id Customer',
            'id_shop_group' => 'Id Shop Group',
            'id_shop' => 'Id Shop',
            'id_gender' => 'Id Gender',
            'id_default_group' => 'Id Default Group',
            'id_lang' => 'Id Lang',
            'id_risk' => 'Id Risk',
            'company' => 'Company',
            'siret' => 'Siret',
            'ape' => 'Ape',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'email' => 'Email',
            'passwd' => 'Passwd',
            'last_passwd_gen' => 'Last Passwd Gen',
            'birthday' => 'Birthday',
            'newsletter' => 'Newsletter',
            'ip_registration_newsletter' => 'Ip Registration Newsletter',
            'newsletter_date_add' => 'Newsletter Date Add',
            'optin' => 'Optin',
            'website' => 'Website',
            'outstanding_allow_amount' => 'Outstanding Allow Amount',
            'show_public_prices' => 'Show Public Prices',
            'max_payment_days' => 'Max Payment Days',
            'secure_key' => 'Secure Key',
            'note' => 'Note',
            'active' => 'Active',
            'is_guest' => 'Is Guest',
            'deleted' => 'Deleted',
            'date_add' => 'Date Add',
            'date_upd' => 'Date Upd',
        ];
    }
}
