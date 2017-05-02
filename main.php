<html>
<title>ATTENDENCE SYSTEM</title>
<script src="js/jquery.js"></script>
<head>
    <link rel="stylesheet" href="css/style.css">

    <script type="text/javascript">
        function checkcheck(sid) {
            if (document.getElementById('present').checked) {
                val = document.getElementById('present').value;
                $.ajax({
                    type: 'post',
                    url: 'ajax//attendance.php',
                    data: {
                        sid: sid,
                        get_option: val,
                        get_class:<?php echo(intval($_GET['sm']))?>,
                        get_paper:<?php echo(intval($_GET['pp']))?>
                    },
                    success: function (response) {
                        document.getElementById('present').disabled = true;
                        document.getElementById('status').innerText = response;
                    }
                });
            } else if (document.getElementById('absent').checked) {
                val = document.getElementById('absent').value;
                $.ajax({
                    type: 'post',
                    url: 'ajax//attendance.php',
                    data: {
                        sid: sid,
                        get_option: val,
                        get_class:<?php echo(intval($_GET['sm']))?>,
                        get_paper:<?php echo(intval($_GET['pp']))?>
                    },
                    success: function (response) {

                    }
                });
            }

        }
    </script>
</head>
<?php
include_once('includes/connection.php');
include_once "includes/session.php";
global $db;
if (!isset($_SESSION['login_user'])) {
    header("location:index.html");
} elseif (isset($_SESSION['login_user']) && isset($_SESSION['priv'])) {
    mysqli_query($db, "UPDATE semester SET no_classes=no_classes+1 WHERE paper=" . intval($_GET['pp']));
    $sem = intval($_GET['sm']);
    $paper = intval($_GET['pp']);

    ?>
    <body>
    <center>welcome <?php echo $_SESSION['login_user'] ?> &nbsp;&nbsp; <a href="includes/logout.php">logout</a><br>
    </center>
    <hr>
    <?php
    $q = "SELECT std_name,email,phone,id FROM estudante.sem_student WHERE semester=" . $sem;
    $queryoutput = mysqli_query($db, $q);
    while ($row = mysqli_fetch_assoc($queryoutput)) {

        ?>
        <div class="std">
            <div class="img">
                <center><img src="image/a.jpg" class="std_image"></center>
                <hr>
                <div class="std_name">
                    <?php echo $row['std_name'] ?>
                </div>
            </div>
            <div class="status">
                <form>
                    PRESENT:<input type="radio" value="1" name="stat" id="present"
                                   onchange="checkcheck(<?php echo $row['id'] ?>)">
                    ABSENT:<input type="radio" value="0" name="stat" id="absent"
                                  onchange="checkcheck(<?php echo $row['id'] ?>)">
                </form>
                <h5><?php echo $row['phone'] ?></h5>
                <a href="mailto:<?php echo $row['email'] ?>">email</a>
                <span id="status"></span>
            </div>
        </div>
    <?php } ?>
    </body>
<?php
} else {
    header("location:index.html");
}
?>
</html>
