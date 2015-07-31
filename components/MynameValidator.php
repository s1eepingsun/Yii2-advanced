<?php

namespace app\components;

use yii\validators\Validator;

class MynameValidator extends Validator
{
    public function init()
    {
        parent::init();
        $this->message = 'Only my name is valid input.';
    }

    public function validateAttribute($model, $attribute)
    {
        $value = $model->$attribute;
        if ($value != 'Kirill') {
            $model->addError($attribute, $this->message);
        }
    }

    public function clientValidateAttribute($model, $attribute, $view)
    {
        $message = json_encode($this->message, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

   return <<<JS
deferred.push($.get("../components/ajax/checkname.php", {value: value}).done(function(data) {
    console.log(data);
    if ('testK' != data) {
        messages.push(data + ' is a wrong name');
    }
}));
JS;
    } 
}

        /*  return <<<JS
console.log("js test 1");
if (value != 'Kirill') {
    
    messages.push($message);
}
JS; */