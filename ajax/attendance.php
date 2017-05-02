<?php
include_once "../includes/connection.php";
global $db;
function inc_attend($class, $paper, $sid, $db)
{
    $paper = $paper % 10;
    $col_upd = mysqli_fetch_assoc(mysqli_query($db, "SELECT present_days FROM sem_student WHERE id=" . $sid . " AND semester=" . $class))['present_days'];
    $attend_arr = explode(',', $col_upd);
    $attend_arr[$paper - 1] = $attend_arr[$paper - 1] + 1;
    $col_upd = implode(",", $attend_arr);

    return mysqli_query($db, "UPDATE sem_student SET present_days='" . $col_upd . "'WHERE id=" . $sid);
}

if (isset($_GET)) {
    $is_present = $_POST['get_option'];
    $class = $_POST['get_class'];
    $paper = $_POST['get_paper'];
    $id = intval($_POST['sid']);
    $paper = $paper % 10;

    if (inc_attend($class, $paper, $id, $db) == true) {
        echo "Attendance updated";
    } else {
        echo "Attendance update failed";
    }

    /*  $q="update sem_student set  where id=".$id;
     $res = mysqli_query($db, "select paper from semester WHERE sem_name ='".$subject."'");
     echo "<option value='#'>Select Paper</option>";
     while ($row = mysqli_fetch_assoc($res)) {
         echo "<option value='".$row['paper']."'>" . $row['paper'] . "</option>";
     }*/

    exit;
}