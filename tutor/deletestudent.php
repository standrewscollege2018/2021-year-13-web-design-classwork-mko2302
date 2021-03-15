<?php
  if (isset($_GET['student'])) {

    $studentID = $_GET['student'];

    $delete_sql = "DELETE FROM student WHERE studentID=$studentID";

    // sends sql query to data base
    $delete_qry = mysqli_query($dbconnect, $delete_sql);
    header("Location:index.php?page=deletestudentselect&status=success");
    // else goes to home page
  } else {
    header("Location:index.php?page=deletestudentselect&status=error");
  }



 ?>
