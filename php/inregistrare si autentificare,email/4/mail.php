<?php
$send = mail('rusu_gabriela@yahoo.com','Hello','Hello! this is site activation link!','From:example@yahoo.com');
if ($send){
	echo "yes";
}else
{
	echo "no";
}
?>