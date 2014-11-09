<?php
require 'mysql.php';
$all= new info();
$list = array();
$list=$all->findAll();
echo "<pre>";
print_r($list);



?>