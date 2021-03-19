<?php 
include_once '../../core/init.php';
$user = new User();
$user->logout();
$user->changestatut(0);
header("Location: ../../");