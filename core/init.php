<?php
session_start();
$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'db' => 'chatbox'
    ),
    'session' => array(
        'session_name' => 'user',
        'session_cin' => 'cin'
    )
);

spl_autoload_register('myAutoLoader');
function myAutoLoader($className)
{
    $path = $_SERVER['DOCUMENT_ROOT'] . "/chatbox/Classes/";
    $ext = ".class.php";
    $fullPath = $path . $className . $ext;
    include_once $fullPath;
}