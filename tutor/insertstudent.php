<?php
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$tutorgroupID = $_POST['tutorgroupID'];


$check_sql = "SELECT * FROM student WHERE firstname LIKE '$firstname' AND lastname LIKE '$lastname' AND tutorcode LIKE '$tutorcode'";

$check_qry = mysqli_query($dbconnect, $check_sql);

if (mysqli_num_rows($check_qry) > 0){
  header("Location:index.php?page=addstudent&status=duplicate");
} else {
  // forms sql query to find like search

  $insert_sql = "INSERT INTO student (firstname, lastname, tutorgroupID) VALUES ('$firstname','$lastname', '$tutorgroupID')";

  // sends sql query to data base
  $insert_qry = mysqli_query($dbconnect, $insert_sql);
  header("Location:index.php?page=addstudent&status=success");
}
 ?>
