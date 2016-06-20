
<?php
/*
define ('DBPATH','localhost');
define ('DBUSER','root');
define ('DBPASS','123456');
define ('DBNAME','emp_management');
global $dbh;
$dbh = mysql_connect(DBPATH,DBUSER,DBPASS);
mysql_selectdb(DBNAME,$dbh);*/
?>

<?php

$link = mysql_connect('localhost', 'root', '123456');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('emp_management', $link);

		
return $link;
?>
