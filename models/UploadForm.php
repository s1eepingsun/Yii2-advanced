<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

/**
 * UploadForm is the model behind the upload form.
 */
class UploadForm extends Model
{
    /**
     * @var UploadedFile file attribute
     */
    public $file;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [//message не работает здесь
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'txt, png', 'maxFiles' => 10],
        ];
    }
}