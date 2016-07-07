<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "{{%order}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $secret_key
 * @property integer $delivery_id
 * @property string $delivery_price
 * @property string $total_price
 * @property integer $status_id
 * @property integer $paid
 * @property string $user_name
 * @property string $user_email
 * @property string $user_address
 * @property string $delivery_address
 * @property string $user_phone
 * @property string $user_comment
 * @property string $ip_address
 * @property integer $created
 * @property integer $updated
 * @property string $discount
 * @property string $admin_comment
 *
 * @property OrderItem[] $orderItems
 */
class Order extends \yii\db\ActiveRecord
{
    const STATUS_NEW = 0;
    const STATUS_COMPLETE = 1;
    const STATUS_NOT_PAID = 2;
    const STATUS_PAID = 3;
    const DELIVERY_PRICE = 500;
    const DELIVERY_WITHOUT = 1;
    const DELIVERY_WITH = 2;
    const SCENARIO_ORDER = 'order';

    public function scenarios()
    {
        return [
            self::SCENARIO_ORDER => ['is_approved'],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order}}';
    }

    public function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'user_id',
                'updatedByAttribute' => 'manager_id',

            ],
        ];
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_phone', 'user_email', 'delivery_id','payment_id','user_address','created'], 'required'],
            [['user_id', 'manager_id', 'delivery_id','payment_id', 'status_id', 'paid', 'updated', 'company_id', 'user_login', 'is_approved'], 'integer'],
            [['created'], 'safe'],
            [['delivery_price', 'total_price'], 'number'],
            [['admin_comment'], 'string'],
            ['user_email', 'email'],
            [['secret_key', 'user_firstname', 'user_lastname', 'user_secondname', 'user_email', 'user_address', 'delivery_address', 'user_phone', 'user_comment', 'ip_address', 'discount'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('order', 'ID'),
            'user_id' => Yii::t('order', 'User ID'),
            'secret_key' => Yii::t('order', 'Secret Key'),
            'delivery_id' => Yii::t('order', 'Delivery ID'),
            'is_approved' => Yii::t('order', 'Is Approved'),
            'delivery_price' => Yii::t('order', 'Delivery Price'),
            'total_price' => Yii::t('order', 'Total Price'),
            'status_id' => Yii::t('order', 'Status ID'),
            'paid' => Yii::t('order', 'Paid'),
            'user_login' => Yii::t('order', 'User Login'),
            'user_firstname' => Yii::t('order', 'User Firstname'),
            'user_lastname' => Yii::t('order', 'User Lastname'),
            'user_secondname' => Yii::t('order', 'User Secondname'),
            'user_email' => Yii::t('order', 'User Email'),
            'user_address' => Yii::t('order', 'User Address'),
            'delivery_address' => Yii::t('order', 'Delivery Address'),
            'user_phone' => Yii::t('order', 'User Phone'),
            'user_comment' => Yii::t('order', 'User Comment'),
            'ip_address' => Yii::t('order', 'Ip Address'),
            'created' => Yii::t('order', 'Created'),
            'updated' => Yii::t('order', 'Updated'),
            'discount' => Yii::t('order', 'Discount'),
            'admin_comment' => Yii::t('order', 'Admin Comment'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
//
//    public function changeApprove()
//    {
//        if ($this->validate()) {
//            $order = Order::find()->where(['user_id' => Yii::$app->user->id])->one();
//            $order->is_approved = 1;
//            $order = $order->save();
//            return $order;
//        }
//        return null;
//    }

    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::className(), ['order_id' => 'id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(),['id' => 'user_id']);
    }
    
    public function getCompany()
    {
        return $this->hasOne(Company::className(),['id' => 'company_id']);
    }

    public function sendEmail()
    {
        return Yii::$app->mailer->compose('order', ['order' => $this])
            ->setTo(Yii::$app->params['adminEmail'])
            ->setFrom(Yii::$app->params['adminEmail'])
            ->setSubject('New order #' . $this->id)
            ->send();
    }
}