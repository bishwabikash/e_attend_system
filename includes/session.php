<?php
/**
 * Created by PhpStorm.
 * User: Bishwabikash
 * Date: 24-05-2016
 * Time: 03:34 PM
 */

include_once('connection.php');
global $db;
session_start();
if (isset($_SESSION['login_user'])) {
    $user_check = $_SESSION['login_user'];


    $ses_sql = mysqli_query($db, "select uname from users where uname = '$user_check' ");

    $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

    $login_session = $row['uname'];
}
