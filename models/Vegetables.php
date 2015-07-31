<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vegetables".
 *
 * @property integer $id
 * @property string $name
 * @property string $color
 * @property integer $weight
 * @property integer $somedata2
 */
class Vegetables extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vegetables';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['weight', 'somedata2'], 'integer'],
            [['name'], 'string', 'max' => 52],
            [['color'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'color' => 'Color',
            'weight' => 'Weight',
            'somedata2' => 'Somedata2',
        ];
    }
}
