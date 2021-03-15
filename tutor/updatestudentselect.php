<?php

// check to see if logged in.
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: index.php");
}

// sql query
$student_sql = "SELECT * FROM student";
$student_qry = mysqli_query($dbconnect, $student_sql);

if(mysqli_num_rows($student_qry)==0) {
  echo "<p class='display-2 text-center p-5'>No students to view</p>";
} else {
  // sends query
  $student_aa = mysqli_fetch_assoc($student_qry);

  echo "<p class='display-2 p-2 text-center'>Click on student to update</p>";

  echo "<div class='container col-md-6 text-center'>";

  if(!isset($_GET['status'])) {
    echo "";
  } else {
    $status = $_GET['status'];
    if ($status == "success") {
       echo "<div class='alert alert-success' role='alert'>
                Student Updated
            </div>";
    } elseif ($status == "cancelled") {
      echo "<div class='alert alert-danger' role='alert'>
               Update cancelled
           </div>";
    } elseif ($status == "error") {
      echo "<div class='alert alert-danger' role='alert'>
               Update failed
           </div>";
    }else "";
        }

    echo"</div>";

  // prints each student in student
  ?>
  <div class="contrainer row m-3">
    <?php
    do {
      $firstname = $student_aa['firstname'];
      $lastname = $student_aa['lastname'];
      $photo = $student_aa['photo'];
      $studentID = $student_aa['studentID'];

      echo" <div class='col-lg-3 col-md-6'>
              <a href='index.php?page=updatestudentdetails&student=$studentID'>
                <div class='card'>
                <img class='card-img-top' src='images/$photo' alt='Image of $firstname $lastname'>
                  <div class='card-body'>
                    <h5 class='card-title'>$firstname $lastname</h5>
                  </div>
                </div>
              </a>
            </div>";

    } while ($student_aa = mysqli_fetch_assoc($student_qry));
  } ?>
