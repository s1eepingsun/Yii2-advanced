<?php
namespace app\controllers;

use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;
use app\models\Frukt;
use yii\web\Response;

class FruktController extends ActiveController
{
    public $modelClass = 'app\models\Frukt';
    
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_HTML;
        return $behaviors;
    }
    
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

   /*  public function actionIndex()
    {
        return new ActiveDataProvider([
            'query' => Frukt::find(),
        ]);
    } */
    
    public function actionTest($id = NULL)
    {
        
        //NOT WORKING HERE
        /*  if(Yii::$app->response->acceptParams['version'] == 'v1') {
            return new ActiveDataProvider([
                'query' => Frukt::find()
                ->where(['color' => 'orange'])
                ->andFilterWhere(['id' => $id])
            ]);
        } else {
            return new ActiveDataProvider([
                'query' => Frukt::find()
                ->where(['color' => 'green'])
                ->andFilterWhere(['id' => $id])
            ]);
        } */
        
        
        
        return new ActiveDataProvider([
            'query' => Frukt::find()
            ->where(['color' => 'orange'])
            ->andFilterWhere(['id' => $id])
        ]); 
        
    }
    
    /* public function actionTest($id = NULL)
    {
        if(Yii::$app->response->acceptParams['version'] == 'v1') {
            return '{"info": "data"}';
        }
    }     */
    
    public function actions()
    {
        $actions = parent::actions();

        // disable the "delete" and "create" actions
        //unset($actions['view'], $actions['create']);

        // customize the data provider preparation with the "prepareDataProvider()" method
        //$actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];

        return $actions;
    }
    
    public function checkAccess($action, $model = null, $params = [])
    {
        // check if the user can access $action and $model
        // throw ForbiddenHttpException if access should be denied
    }
    
}