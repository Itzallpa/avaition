<?php

$hostName = "thepurple.online";
$dbUser = "p2048873";
$dbPassword = "ann9cyczdkj@jJ";
$dbName = "p2048873_avaition";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}
?>