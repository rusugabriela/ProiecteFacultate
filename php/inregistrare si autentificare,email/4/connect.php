<?php
$connect_error = "Sorry, error";

mysql_connect('localhost','root','')or die ($connect_error);
mysql_select_db('4')or die ($connect_error);
?>