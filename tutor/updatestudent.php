<?php
  $studentID = $_GET['student'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $tutorgroupID = $_POST['tutorgroupID'];

  $update_sql = "UPDATE student SET firstname = '$firstname', lastname='$lastname', tutorgroupID='$tutorgroupID' WHERE studentID=$studentID";

  // sends sql query to data base
  $update_qry = mysqli_query($dbconnect, $update_sql);
  if ($update_qry) {
    header("Location:index.php?page=updatestudentselect&status=success");
  } else {
    header("Location:index.php?page=updatestudentselect&status=error");
  };

 ?>
