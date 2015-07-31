<?php
use yii\helpers\Html;
$this->title = 'DB works';
?>
<?= Html::encode($message) ?>
<br>


<?php
if (mysql_connect("localhost", "kirill", "123")) {echo "connected <br>";}
 
if (mysql_select_db("yii2basic")) {echo "db selected <br>";}
 
/*    
 $query = Mysql_query ("
 CREATE TABLE IF NOT EXISTS `country_fruits` (
  `id` INT(7) NOT NULL,
  `code` CHAR(52) NOT NULL,
  PRIMARY KEY (id, code)
) ENGINE=InnoDB DEFAULT CHARSET=utf8; 
"); 
 */

if($query) {
    echo 'table created';
} else {
    echo 'error; ' . mysql_error();
}
  

/* 
if (mysql_connect("localhost", "kirill", "123")) {echo "connected <br>";}
 
if (mysql_select_db("book")) {echo "db selected <br>";}
 
   
 $query = Mysql_query ("
 ALTER TABLE `actions` MODIFY `breath` INT(4) NOT NULL DEFAULT 0

"); 


if($query) {
    echo 'table created';
} else {
    echo 'error; ' . mysql_error();
}
     */

/*  
 ,
INSERT INTO `fruits` VALUES (NULL,'orange','orange',25, 5),     // can you do 1 at a time!
INSERT INTO `fruits` VALUES (NULL,'persimmon','orange',24, 4)
 INSERT INTO `fruits` VALUES ('','Australia',18886000);
  */
 
/*  
 CREATE TABLE IF NOT EXISTS `fruits` (
  `id` INT(7) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` CHAR(52) NOT NULL,
  `color` CHAR(20) NOT NULL DEFAULT '',
  `weight` INT(11) NOT NULL DEFAULT '0',
  `somedata1` INT(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8; 
  */
 
 
 
 
 
 
 
/*     
 Mysql_query ( 
"    
CREATE TABLE IF NOT EXISTS
 
  `actions` (
 `time` int(7) NOT NULL AUTO_INCREMENT, 
 `go_north` varchar(12) NOT NULL default '', 
 `go_south` varchar(12) NOT NULL default '', 
 `go_west` varchar(12) NOT NULL default '', 
 `go_east` varchar(12) NOT NULL default '', 
 `close_eyes` varchar(12) NOT NULL default '', 
 `open_eyes` varchar(12) NOT NULL default '',
 `eat` varchar(12) NOT NULL default '',
 PRIMARY KEY(`time`)
 ) ENGINE=MyISAM DEFAULT CHARSET=cp1251 COLLATE cp1251_general_ci ;
  ")
      */
	
/* 	 Mysql_query ( 
"  
 CREATE TABLE
	    `users` (
	        `id` INT(11) NOT NULL AUTO_INCREMENT,
	        `name` CHAR(30) NOT NULL,
	        `age` SMALLINT(6) NOT NULL,
	        PRIMARY KEY(`id`)
	    ) 
	")	 */
		
 /*  
   Mysql_query ( 
"    
ALTER TABLE vision
 
 ADD COLUMN  v30  varchar(12)
 ;
  ");
   */
  //echo " end";
  
  
  
  /* 
   ADD COLUMN  v03  varchar(12) , 
 ADD COLUMN  v12  varchar(12) , 
 ADD COLUMN  v2_2  varchar(12) AFTER v10
  */
  

/*     if (mysql_connect("mysql12.000webhost.com", "a8155305_k", "12samuel")) {echo "connected <br>";}

  if (mysql_select_db("a8155305_gb")) {echo "db selected <br>";}
  

 Mysql_query (

"   

CREATE TABLE

  comments (

 `id` int(4) NOT NULL,

 `name` varchar(65) NOT NULL default '',


 `comment` longtext NOT NULL,

 `datetime` varchar(65) NOT NULL default ''


 ) ENGINE=MyISAM DEFAULT CHARSET=cp1251 COLLATE cp1251_general_ci ;

  ") */

?> 