<?php

namespace app\models;

use yii\base\Model;
//use app\components\MynameValidator;

class EntryForm extends Model
{
    public $name;
    public $email;
    public $test = 'asdf';

    public function rules()
    {
        return [
            [['name', 'email'], 'required', 'message' => 'pls enter the name'],
            ['email', 'email', 'message' => 'your email isn\'t valid, sry'],
            ['name', 'app\components\MynameValidator']
            //['test', 'email'] //валидация ломает что-то 
        ];
    }
}