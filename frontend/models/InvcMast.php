<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "invc_mast".
 *
 * @property int $invc_numb
 * @property string $invc_date
 * @property int $userid
 * @property int $custid
 * @property string $invc_amt
 * @property string $GST
 * @property int $invc_disc
 * @property string $invoice_status
 * @property string $paid_amount
 */
class InvcMast extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'invc_mast';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['invc_date', 'userid', 'custid'], 'required'],
            [['invc_date'], 'safe'],
            [['userid', 'custid', 'invc_disc'], 'integer'],
            [['invc_amt', 'GST', 'paid_amount'], 'number'],
            [['invoice_status'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'invc_numb' => 'Invc Numb',
            'invc_date' => 'Invc Date',
            'userid' => 'Userid',
            'custid' => 'Custid',
            'invc_amt' => 'Invc Amt',
            'GST' => 'Gst',
            'invc_disc' => 'Invc Disc',
            'invoice_status' => 'Invoice Status',
            'paid_amount' => 'Paid Amount',
        ];
    }
}
