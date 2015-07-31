<?php

namespace app\controllers;

use yii\base\Action;

class HelloAction extends Action
{	
	
    public function run()
    {
        echo 'something new ';
        return "Hello World Standalone Action!!!";
    }
}