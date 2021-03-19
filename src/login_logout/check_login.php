<?php
include_once '../../core/init.php';
if (isset($_POST["login"])) {
    $user = new User();
    $login = $user->login($_POST["username"], $_POST["password"]);
    if ($login) {
        $user->changestatut(1);
        header("Location: ../chat/index1.php");
    } else {
        header("Location: ../../?err");
    }
}
