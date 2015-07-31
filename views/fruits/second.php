<?php
/* @var $this yii\web\View */
// namespace app\models;

//use Yii;
//use yii\base\Model;
//use yii\data\ActiveDataProvider;
use app\models\Fruits; 
//use app\models\CountryFruits; 

$this->title = 'Second';

$config = require(Yii::getAlias('@app/config/db.php'));
$db = new yii\db\Connection([
    'dsn' => $config['dsn'],
    'username' => $config['username'],
    'password' => $config['password'],
    'charset' => $config['charset'],
]);

//--------------------------------- DAO
echo '<h3>DAO</h3>';

/* 
$db->createCommand()->batchInsert('fruits', ['name', 'color', 'weight'], [
    ['pineapple', 'brown', 60],
    ['persimmon', 'orange', 26],
])->execute();
*/
/* //NOT working for some reason
if($db->createCommand()->createTable('vegetables', [
    'id' => 'pk',
    'name' => 'string',
    'color' => 'string',
    'wegiht' => 'integer',
    'somedata2' => 'integer',])
) {
    echo 'Table created<br>';
} else {
    echo 'error: ' . mysql_error() . '<br>';
}
 */
/* $table = $db->getTableSchema('vegetables'); 
print_r($table);
echo "<br>"; */
/*  
$db->transaction(function($db) {
    $db->createCommand('UPDATE {{fruits}} SET name="apricot" WHERE [[weight]] = 26')  //can use double brackets for agnostic syntax
       ->execute();

    $db->createCommand()->update('fruits', ['weight' => 25], 'name = "orange"')->execute();
    
     $db->createCommand()->batchInsert('country_fruits', ['code', 'id'], [
        ['RU', 1],
        ['RU', 5],
        ['CN', 1],
    ])->execute(); 
});  */

$fruits = $db->createCommand('SELECT * FROM fruits')
            ->queryAll();            
print_r($fruits);
echo "<br>";

$name = $db->createCommand('SELECT name FROM fruits')
             ->queryColumn();             
print_r($name);
echo "<br>";

$count = $db->createCommand('SELECT COUNT(*) FROM fruits')
             ->queryScalar();             
print_r($count);
echo "<br>";
            
            
$command = $db->createCommand('SELECT * FROM fruits WHERE color=:color');

$orange = $command->bindValue(':color', 'orange')->queryAll();
print_r($orange);
echo "<br>";

$greenColor = 'green';
$green = $command->bindValue(':color', $greenColor)->queryOne();
print_r($green);
echo "<br>";

/* 
$table = $db->getTableSchema('fruits');
echo '<pre>';
print_r($table);
echo "</pre>";
echo "<br>";
 */

//--------------------------------- Query Builder 
echo '<h3>Query Builder</h3>';

$green = 'green';
$rows = (new \yii\db\Query())
    ->select(['name', 'color'])
    ->from('fruits')
    ->where('color=:green') //String format
    ->orFilterWhere(['color' => 'orange', 'weight' => [24, 26]])  //Hash format. If set :orange here it wouldn't work
    ->addParams([':green' => $green])
    ->orderBy(['name' => 'SORT_ASC'])
    ->indexBy('name')
    //->join('LEFT JOIN', 'vegetables')
    ->limit(10)
    ->all();

print_r($rows);
echo "<br>";


$rows = (new \yii\db\Query())
    ->select(['name', 'weight'])
    ->from('fruits')
    ->where(['between', 'weight', 20, 30]) //Operator format
    ->andWhere(['like', 'name', 'ap'])
    ->all();

print_r($rows);
echo "<br>";


$rows = (new \yii\db\Query())
    ->select(['COUNT(*)', 'color', 'weight'])
    ->from('fruits')
    ->groupBy('color')
    ->having(['<', 'weight', 50])
    ->createCommand();                       //createCommand to see generated query

echo $rows->sql;
print_r($rows->params);
echo "<br>";

$rows = (new \yii\db\Query())
    ->select(['color'])
    ->from('yii2basic.fruits f') // yii2basic.fruits AS f
    ->distinct()
    ->all();
    
print_r($rows);
echo "<br>";


$subQuery = (new \yii\db\Query())->select(["CONCAT('na', 'me')"])->all();
print_r($subQuery);
echo "<br>";
/*
$query = (new \yii\db\Query())->select([$subQuery[0]['name'])->from('fruits')->all();
print_r($query);
echo "<br>"; 
*/


$rows = (new \yii\db\Query())
    ->select(['name'])
    ->from('fruits');
    
foreach($rows->batch(3) as $fruit) {   //batch iterates 100 rows at a time by default, can you 'each()' instead to iterate by 1
    print_r($fruit);
    echo "<br>"; 
}
/* //NOT working again 
$sql = (new \yii\db\Query())->insert('vegetables', [
 'name' => 'potato',
 'color' => 'brown',
 'weight' => 25,
 'somedata2' => 1,
]); */

$rows = (new \yii\db\Query())
    //  ->select(['name', 'color'])
    ->from('vegetables')
    ->join('LEFT JOIN', 'fruits', 'vegetables.weight = fruits.weight')
    ->all();

//echo '<pre>';
print_r($rows);
//echo '</pre>';
echo '<br>';


//--------------------------------- Active Record
echo '<h3>Active Record</h3>';

$fruitObject = Fruits::find()
    //->asArray()
    //->select(['name', 'color'])
    
    //->from('fruits')
    ->where(['color' => 'orange']) 
    //->orderBy(['name' => 'SORT_ASC'])
    ->indexBy('name')
    //->limit(10)
    ->all();                              //if set 'all()' returns array of objects!!!


echo '<pre>';
print_r($fruitObject);
echo "<br>";
print_r($fruitObject['apricot']->countryFruits);
print_r($fruitObject['apricot']->country);
echo '</pre>';
echo "<br>";
//echo $fruitObject->name;
echo $fruitObject['apricot']->name;
echo "<br>";
print_r($fruitObject['apricot']->countryFruits[0]['code']);
echo "<br>";
print_r($fruitObject['apricot']->country[0]['population']);


    
/* 
$customer = new Fruits;  //will INSERT
$customer->name = 'kiwi';
$customer->save(); 

$customer = Fruits::findOne(1); //will update
$customer->name = 'kiwi';
$customer->save(); 

$fruitObject = Fruits::findOne(1);
$fruitObject->updateCounters(['somedata1' => 1]);  //SET somedata1 = samedata1 + 1
*/

$fruit = Fruits::findOne(['name' => 'pineapple']);
Fruits::getDb()->transaction(function($db) use ($fruit) {
    $fruit->somedata1 = 3;
    $fruit->save();
});

$fruitObject = Fruits::findOne(1);
echo '<pre>';
print_r($fruitObject);
echo '</pre>';
echo "<br>";
print_r($fruitObject->name);
echo "<br>";

$fruitObject = Fruits::findAll(['color' => 'brown']);
/* echo '<pre>';
print_r($fruitObject);
echo '</pre>';
echo "<br>"; */



?>
<h4>fruits/second</h4>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>
