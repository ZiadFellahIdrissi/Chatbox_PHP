<?php
include_once '../../../core/init.php';
$cin = $_GET["cin"];
$talkwith = $_GET["talkwith"];
$message = $_GET["msg"];
$db = DB::getInstance();

$sql="INSERT INTO `messages`( `message`, `date`, `sender_id`) VALUES (?,SYSDATE(),?)";
$db ->query($sql,[$message,$cin ]);


$sqltest="SELECT messages.id_message FROM `messages` ORDER by messages.id_message desc LIMIT 1";
$id_message=$db->query($sqltest,[])->first()->id_message;


$sql2="INSERT INTO `message_list`(`id_message`, `user_id`, `isread`) VALUES (?,?,?) ";
$db ->query($sql2,[$id_message,$talkwith,0 ]);