<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property int $id
 * @property string $tel
 * @property string $email
 * @property string $facebook
 * @property string $instagram
 * @property string $youtube
 * @property string $telegram
 * @property string $mover
 * @property double $lng coordinates
 * @property double $lat coordinates
 * @property string $adress_uz
 * @property string $adress_ru
 * @property string $adress_en
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lng', 'lat'], 'number'],
            [['tel', 'email', 'facebook', 'instagram', 'youtube', 'telegram', 'mover'], 'string', 'max' => 500],
            [['adress'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tel' => 'Tel',
            'email' => 'Email',
            'facebook' => 'Facebook',
            'instagram' => 'Instagram',
            'youtube' => 'Youtube',
            'telegram' => 'Telegram',
            'mover' => 'Mover',
            'lng' => 'Lng',
            'lat' => 'Lat',
            'adress' => 'Manzil',
        ];
    }
}
