<?php
include_once('connection.php');
/******** Login Processing **********/
if (isset($_POST['login'])) {
    session_regenerate_id(true);
    session_start();
    $uname = mysqli_real_escape_string($db, $_POST['unm']);
    $upass = mysqli_real_escape_string($db, $_POST['pwd']);

    $sql = "SELECT uname,privilege,pass FROM estudante.users WHERE uname = '$uname'";

    $result = mysqli_query($db, $sql) or die(mysqli_error($db));
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    $privilege = $row['privilege'];
    $hash = crypt($upass, $row['pass']);
    if ($count == 1 && $hash == $row['pass']) {
        session_start();
        session_regenerate_id(true);
        $_SESSION['login_user'] = $uname;
        $_SESSION['priv'] = $privilege;
        echo("sem:" . $_POST['sem'] . ",post:" . $_POST['paper']);
        mysqli_query($db, "UPDATE users SET last_login=now() WHERE uname='" . $uname . "'");
        //header("location:../main.php?sm=".$_POST['sem']."&pp=".$_POST['paper']);//test code
        header("location:../attend" . $_POST['sem'] . "pp" . $_POST['paper'] . ".blade");
        /* if ($privilege == 1) {
             header("location:../landing_page.php");
         } else {
             header("location:../index.php");
         }*/
    } else {
        $error = "Your Login Name or Password is invalid";
    }
}

/************Signup Processing ************/
if (isset($_POST['signup'])) {
    $uname = mysqli_real_escape_string($db, $_POST['uname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $f_name = mysqli_real_escape_string($db, $_POST['full_name']);
    $pass = mysqli_real_escape_string($db, $_POST['pass']);
    if (strcmp($pass, $_POST['passcon']) == 0) {
        $cost = 10;
        $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_RANDOM)), '+', '*');
        $salt = sprintf("$2a$%02d$", $cost) . $salt;
        $hash = crypt($pass, $salt);
        $query = "INSERT INTO users(uname, pass, fullname,privilege) VALUES ('" . $uname . "','" . $hash . "','" . $f_name . "',0)";
        //var_dump($hash);
        echo $query;
        $outcome = mysqli_query($db, $query);
        if ($outcome) {
            header("location:../index.html");
            //header("refresh:4 url:index.php");
        }
    }
}