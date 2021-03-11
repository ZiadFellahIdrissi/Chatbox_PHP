<?php
include_once '../../core/init.php';
if (
    isset($_POST["cin"]) and isset($_POST["nom"]) and  isset($_POST["lastname"])  and
    isset($_POST["phonenumber"]) and isset($_POST["email"]) and isset($_POST["usernameA"]) and
    isset($_POST["passwordA"]) and isset($_POST["dob"])
) {
    $cin = strtolower($_POST["cin"]);
    $nom = strtolower($_POST["nom"]);
    $lastname = strtolower($_POST["lastname"]);
    $dob = $_POST["dob"];
    $phonenumber = $_POST["phonenumber"];
    $email = strtolower($_POST["email"]);
    $usernameA = strtolower($_POST["usernameA"]);
    $passwordA = $_POST["passwordA"];

    if (!User::isAlreadySignedUp($cin)) {
        if (!User::checkEmail($cin, $email) and !User::checkUserName($cin, $usernameA)) {
            if (!User::signup($cin, $nom, $lastname, $dob, $phonenumber, $email, $usernameA, $passwordA)) {
                echo '
                    <div class="alert alert-success" role="alert">
                        Welcome, you can log in now
                    </div>
                    ';
            } else
                echo '<p>Something went wrong please try again in a moment<p>';
        } else
            echo '
                <div class="alert alert-danger" role="alert">
                    Email or username already exist
                </div>
                ';
    } else
        echo '
            <div class="alert alert-warning" role="alert">
                ou are aleadry signd up with us, Please log in
            </div>
            ';
}
