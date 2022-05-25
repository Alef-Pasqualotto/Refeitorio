<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
<<<<<<< HEAD
define('DB_NAME', 'refeicoes');
=======
define('DB_NAME', 'edmsdb');
>>>>>>> 46edcba9f1586566fb8867dc26b124b507145360
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
<<<<<<< HEAD
?>
=======
?> 
>>>>>>> 46edcba9f1586566fb8867dc26b124b507145360
