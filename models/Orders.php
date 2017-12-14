<?php

namespace app\models;

use app\models\Customer;
use Yii;

/**
 * This is the model class for table "ps_orders".
 *
 * @property string $id_order
 * @property string $reference
 * @property string $id_shop_group
 * @property string $id_shop
 * @property string $id_carrier
 * @property string $id_lang
 * @property string $id_customer
 * @property string $id_cart
 * @property string $id_currency
 * @property string $id_address_delivery
 * @property string $id_address_invoice
 * @property string $current_state
 * @property string $secure_key
 * @property string $payment
 * @property string $conversion_rate
 * @property string $module
 * @property integer $recyclable
 * @property integer $gift
 * @property string $gift_message
 * @property integer $mobile_theme
 * @property string $shipping_number
 * @property string $total_discounts
 * @property string $total_discounts_tax_incl
 * @property string $total_discounts_tax_excl
 * @property string $total_paid
 * @property string $total_paid_tax_incl
 * @property string $total_paid_tax_excl
 * @property string $total_paid_real
 * @property string $total_products
 * @property string $total_products_wt
 * @property string $total_shipping
 * @property string $total_shipping_tax_incl
 * @property string $total_shipping_tax_excl
 * @property string $carrier_tax_rate
 * @property string $total_wrapping
 * @property string $total_wrapping_tax_incl
 * @property string $total_wrapping_tax_excl
 * @property integer $round_mode
 * @property integer $round_type
 * @property string $invoice_number
 * @property string $delivery_number
 * @property string $invoice_date
 * @property string $delivery_date
 * @property string $valid
 * @property string $date_add
 * @property string $date_upd
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $customer;

    public $customerFirstName;

    public static function tableName()
    {
        return 'ps_orders';
    }

    public function afterFind(){
        parent::afterFind();

        $id_customer = $this->id_customer;
        $this->customer = Customer::find()
                ->where(['id_customer' => $id_customer])
                ->one();
        $this->customerFirstName = $this->customer['firstname'];
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_shop_group', 'id_shop', 'id_carrier', 'id_lang', 'id_customer', 'id_cart', 'id_currency', 'id_address_delivery', 'id_address_invoice', 'current_state', 'recyclable', 'gift', 'mobile_theme', 'round_mode', 'round_type', 'invoice_number', 'delivery_number', 'valid'], 'integer'],
            [['id_carrier', 'id_lang', 'id_customer', 'id_cart', 'id_currency', 'id_address_delivery', 'id_address_invoice', 'current_state', 'payment', 'invoice_date', 'delivery_date', 'date_add', 'date_upd'], 'required'],
            [['conversion_rate', 'total_discounts', 'total_discounts_tax_incl', 'total_discounts_tax_excl', 'total_paid', 'total_paid_tax_incl', 'total_paid_tax_excl', 'total_paid_real', 'total_products', 'total_products_wt', 'total_shipping', 'total_shipping_tax_incl', 'total_shipping_tax_excl', 'carrier_tax_rate', 'total_wrapping', 'total_wrapping_tax_incl', 'total_wrapping_tax_excl'], 'number'],
            [['gift_message'], 'string'],
            [['invoice_date', 'delivery_date', 'date_add', 'date_upd'], 'safe'],
            [['reference'], 'string', 'max' => 9],
            [['secure_key'], 'string', 'max' => 32],
            [['payment', 'module'], 'string', 'max' => 255],
            [['shipping_number'], 'string', 'max' => 64],
            [['customer'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_order' => 'Id Order',
            'reference' => 'Reference',
            'id_shop_group' => 'Id Shop Group',
            'id_shop' => 'Id Shop',
            'id_carrier' => 'Id Carrier',
            'id_lang' => 'Id Lang',
            'id_customer' => 'Id Customer',
            'id_cart' => 'Id Cart',
            'id_currency' => 'Id Currency',
            'id_address_delivery' => 'Id Address Delivery',
            'id_address_invoice' => 'Id Address Invoice',
            'current_state' => 'Current State',
            'secure_key' => 'Secure Key',
            'payment' => 'Payment',
            'conversion_rate' => 'Conversion Rate',
            'module' => 'Module',
            'recyclable' => 'Recyclable',
            'gift' => 'Gift',
            'gift_message' => 'Gift Message',
            'mobile_theme' => 'Mobile Theme',
            'shipping_number' => 'Shipping Number',
            'total_discounts' => 'Total Discounts',
            'total_discounts_tax_incl' => 'Total Discounts Tax Incl',
            'total_discounts_tax_excl' => 'Total Discounts Tax Excl',
            'total_paid' => 'Total Paid',
            'total_paid_tax_incl' => 'Total Paid Tax Incl',
            'total_paid_tax_excl' => 'Total Paid Tax Excl',
            'total_paid_real' => 'Total Paid Real',
            'total_products' => 'Total Products',
            'total_products_wt' => 'Total Products Wt',
            'total_shipping' => 'Total Shipping',
            'total_shipping_tax_incl' => 'Total Shipping Tax Incl',
            'total_shipping_tax_excl' => 'Total Shipping Tax Excl',
            'carrier_tax_rate' => 'Carrier Tax Rate',
            'total_wrapping' => 'Total Wrapping',
            'total_wrapping_tax_incl' => 'Total Wrapping Tax Incl',
            'total_wrapping_tax_excl' => 'Total Wrapping Tax Excl',
            'round_mode' => 'Round Mode',
            'round_type' => 'Round Type',
            'invoice_number' => 'Invoice Number',
            'delivery_number' => 'Delivery Number',
            'invoice_date' => 'Invoice Date',
            'delivery_date' => 'Delivery Date',
            'valid' => 'Valid',
            'date_add' => 'Date Add',
            'date_upd' => 'Date Upd',
        ];
    }

}
