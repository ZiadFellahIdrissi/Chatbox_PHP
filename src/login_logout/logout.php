<?php 
include_once '../../core/init.php';
$user = new User();
$user->logout();
header("Location: ../../");