<?php
 $tutorname = $_POST['name'];
 $tutorcode = $_POST['code'];


 $check_sql = "SELECT * FROM tutorgroup WHERE tutor LIKE '$tutorname' AND tutorcode LIKE '$tutorcode'";

 $check_qry = mysqli_query($dbconnect, $check_sql);

 if (mysqli_num_rows($check_qry) > 0){
   header("Location:index.php?page=addtutor&status=duplicate");
 } else {
   // forms sql query to find like search

   $insert_sql = "INSERT INTO tutorgroup (tutor, tutorcode) VALUES ('$tutorname','$tutorcode')";

   // sends sql query to data base
   $insert_qry = mysqli_query($dbconnect, $insert_sql);
   header("Location:index.php?page=addtutor&status=success");
 }
  ?>
