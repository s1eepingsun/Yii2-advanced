<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "country_fruits".
 *
 * @property integer $id
 * @property string $code
 */
class CountryFruits extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country_fruits';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'code'], 'required'],
            [['id'], 'integer'],
            [['code'], 'string', 'max' => 52]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
        ];
    }
    
     public function getFruits() 
    {
        return $this->hasMany(Fruits::className(), ['id' => 'id']);
    }  
}
