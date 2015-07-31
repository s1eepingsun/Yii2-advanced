<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fruits".
 *
 * @property integer $id
 * @property string $name
 * @property string $color
 * @property integer $weight
 * @property integer $somedata1
 */
class Fruits extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'fruits';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['weight', 'somedata1'], 'integer'],
            [['name'], 'string', 'max' => 52],
            [['color'], 'string', 'max' => 20]
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'color' => 'Color',
            'weight' => 'Weight',
            'somedata1' => 'Somedata1',
            //'common' => 'Common Label'
        ];
    }
    
    public function getCountryFruits() 
    {
        return $this->hasMany(CountryFruits::className(), ['id' => 'id'])->inverseOf('fruits');
    } 
    
    public function getCountry() 
    {
        return $this->hasMany(Country::className(), ['code' => 'code'])
        ->via('countryFruits');
        //->viaTable('country_fruits', ['id' => 'id']);
    } 
}
