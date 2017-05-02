<?php
include_once 'includes/connection.php';
global $db;
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>register</title>
    <link rel="stylesheet" href="css/reg.css">
    <script type="text/javascript">
        function populate(val) {
            $.ajax({
                type: 'post',
                url: 'ajax//fetch.php',
                data: {
                    get_option: val
                },
                success: function (response) {
                    document.getElementById("sem").innerHTML = response;
                }
            });
        }
    </script>
</head>
<?php
include_once('includes/connection.php');
include_once "includes/session.php";
if (!isset($_SESSION['login_user'])) {
    header("location:index.html");
} elseif (isset($_SESSION['login_user']) && isset($_SESSION['priv'])) {
    ?>
    <body>
    <nav>
        <a href="main.php">attendance</a>
    </nav>
    <div class="std">
        <form method="post">
            <fieldset>

                <input type="text" name="nme" placeholder="name">
                <br>
                <select id="sem">
                    <?php
                    $res = mysqli_query($db, "SELECT DISTINCT sem_name FROM estudante.semester");
                    while ($row = mysqli_fetch_assoc($res)) {
                        echo "<option value='sem_name'>" . $row['sem_name'] . "</option>";
                    }
                    ?>

                </select><br>

                <input type="tel" name="phn" placeholder="phone">
                <br>
                <input type="email" name="eml" placeholder="email">
                <br>
            </fieldset>
            <fieldset>
                <input type="submit" value="register">
                <input type="reset" value="reset">
            </fieldset>
        </form>
    </div>
    </body>
<?php
} else {
    header("location:main.php");
} ?>
</html>