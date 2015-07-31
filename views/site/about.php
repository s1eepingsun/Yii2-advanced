<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\components\HelloWidget;
use app\assets\TestAssets;
use yii\imagine\Image;

//throw new \yii\web\ForbiddenHttpException;
/* $headers = Yii::$app->response->headers;
$values = $headers->remove('Pragma'); */

Image::thumbnail('@webroot/../images/test.png', 69, 60)
    ->save(Yii::getAlias('@runtime/thumb-test2.png'), ['quality' => 50]);

TestAssets::register($this); 

/* @var $this yii\web\View */
$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
$this->registerMetaTag(['name' => 'keywords', 'content' => 'yii, framework, php, kirill']);

?>
<div class="site-about">
<h1><?= Html::encode($this->title) ?></h1>

<p>
    This is the About page. You may modify the following file to customize its content:
</p>
<p>
    This is a testing page now.<br>
    Yii version: <?= Yii::getVersion(); ?>
</p>
<?php
$request = Yii::$app->request;
$get = $request->get(); 

$userHost = Yii::$app->request->userHost;
$userIP = Yii::$app->request->userIP;
echo "rquest get = ";
print_r($get);
echo "<br> user host: $userHost <br>";
echo "user ip: $userIP <br>";


?>
<p>
<?php
/* function factorial($n)
{
  return $n ? bcmul($n, factorial($n-1), 2) : 1;
}
$x = bcadd(2, 4); //479001600
$y = factorial(24);
echo $x;
echo "<br>";
echo $y;
echo "<br>";
echo "620448401733239439360000";
echo "<br>";
for($x = 1; $x <= 24; $x++) {
    $c = factorial($x);
    $v = factorial(24-$x);
    $z = bcsub(factorial(24) , $v);
    $y = bcdiv($c, $z, 30);
    echo "$x matches = $c / $z = $y <br>"; //(c = $c &nbsp; v = $v)
    //echo "620448401733239439360000 - $v = $z <br><br>";
}
echo "<br> 12!/24!-12! = ".  bcsub('620448401733239439360000', 479001600); */
?>
</p>    
    
<?php $this->beginBlock('block1'); ?>
<div>
...content of block1...
</div>
<?php $this->endBlock(); ?>    

<?= $this->blocks['block1'] ?>

<?= HelloWidget::widget(['message' => 'Good morning']) ?>

<br>
path of @foo is <?= Yii::getAlias('@foo') ?> <br>
path of @app is <?= Yii::getAlias('@app') ?> <br>
path of @web is <?= Yii::getAlias('@web') ?> <br>
echo Yii::$app->formatter->asDate('2014-01-01', 'long'); <?= Yii::$app->formatter->asDate('2014-01-01', 'long'); ?> <br>

<br>
<?php
echo "ICU: " . INTL_ICU_VERSION . "\n";
echo "<br>";
echo \Yii::t('app', 'I am a message!');
echo "<br>";
echo 'Not cached: ';
echo Yii::$app->formatter->format('now', ['time', 'php:H:i:s']);
echo "<br>";
    

if($this->beginCache('chaced1', ['duration' => 5])) {
    echo 'Cached: ';
    echo Yii::$app->formatter->format('now', ['time', 'medium']);
    echo "<br>";
    echo 'Not cached - renderDynamic: ';
    echo "<br>";
    echo $this->renderDynamic('echo " asdf WHY is IT HERE ";');
    echo "<br>";
    echo ' fff ';
    echo $this->renderDynamic('echo " New one ";');
    echo "<br>";
    $this->endCache();
}
?>

<?php
$absoluteHomeUrl = Url::home(true);
$relativeBaseUrl = Url::base();
echo Html::tag('p', $absoluteHomeUrl);
echo Html::tag('p', $relativeBaseUrl);

?>


<?php

class KirTest1
{
    public $a = 3;
    public $b = 4;
    public $e = array(1, 2, array("a", "b", "c"));
    
    public function __get($name)
    {
       /*  echo "Получение '$name'\n";
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }

        $trace = debug_backtrace();
        trigger_error(
            'Неопределенное свойство в __get(): ' . $name .
            ' в файле ' . $trace[0]['file'] .
            ' на строке ' . $trace[0]['line'],
            E_USER_NOTICE); */
        return null;
    }
}

$objk = new KirTest1;

$objk->c = 5;
echo $objk->c . "<br>";
echo $objk->a . "<br>";
echo $objk->d . "<br>";


echo '<hr />';
echo '<pre>';
var_dump($objk);
echo '</pre>';
echo '<hr />';
    
    
?>    


<?php
Yii::$app->mailer->compose()
    ->setFrom('from@domain.com')
    ->setTo('to@domain.com')
    ->setSubject('Message subject')
    ->setTextBody('Plain text content')
    ->setHtmlBody('<b>HTML content</b>')
    ->send();

?>
    
    

    <code><?= __FILE__ ?></code>
</div>
