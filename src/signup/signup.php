<?php
include_once '../../core/init.php';
if (isset($_POST["cin"]) and isset($_POST["nom"]) and  isset($_POST["lastname"] )  and 
    isset($_POST["phonenumber"] ) and isset($_POST["email"]) and isset($_POST["usernameA"] ) and 
    isset($_POST["passwordA"]) and isset($_POST["dob"]) )
{
    $cin = $_POST["cin"];
    $nom = $_POST["nom"];
    $lastname = $_POST["lastname"];
    $dob = $_POST["dob"]; 
    $phonenumber = $_POST["phonenumber"];
    $email = $_POST["email"]; 
    $usernameA = $_POST["usernameA"];
    $passwordA = $_POST["passwordA"];

    if (!User::isAlreadySignedUp($cin)){
        if(!User::checkEmail($cin ,$email) and !User::checkUserName($cin ,$usernameA)){
           if(!User::signup($cin,$nom,$lastname,$dob,$phonenumber, $email, $usernameA, $passwordA)){
               echo 'Welcome, you can log in now';
           }else    
                echo 'Something went wrong please try again in a moment';
        }else 
            echo 'Email or username already exist';
    }else 
        echo 'you are aleadry signd up with us, Please log in';
} 