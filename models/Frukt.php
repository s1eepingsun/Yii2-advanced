<?php

namespace app\models;

use Yii;
use yii\web\Link;
use yii\web\Linkable;
use yii\helpers\Url;

/**
 * This is the model class for table "fruits".
 *
 * @property integer $id
 * @property string $name
 * @property string $color
 * @property integer $weight
 * @property integer $somedata1
 */
class Frukt extends \yii\db\ActiveRecord implements Linkable
{

    public static function tableName()
    {
        return 'fruits';
    }
    
    public function fields() 
    {
        if(isset(Yii::$app->response->acceptParams['version']) && Yii::$app->response->acceptParams['version'] == 'v1') {
            return [
            //'id',
            'name',
            'color' => 'color',
            'weight'
            ];
        } else {
            return [
            'id',
            'name',
            'color' => 'color',
            'weight'
            ];
        }
        
    }
    
    public function extraFields()
    {
        return ['somedata1'];
    }
   
    public function getLinks()
    {
        return [
            Link::REL_SELF => Url::to(['frukt/view', 'id' => $this->id], true),
        ];
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
    } 

}
