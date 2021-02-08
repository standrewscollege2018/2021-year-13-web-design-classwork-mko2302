<?php
// if not clicked on make header location
if(!isset($_GET['tutorgroupID'])) {
  header("Location: index.php");
} else {
  // gets tutor user clicked
  $tutorcode = $_GET['tutorcode'];
  $tutorgroupID = $_GET['tutorgroupID'];
  // sql query
  $tutor_sql = "SELECT * FROM student WHERE tutorgroupID=$tutorgroupID";
  $tutor_qry = mysqli_query($dbconnect, $tutor_sql);

  // error catching if no results
  if(mysqli_num_rows($tutor_qry)==0) {
    echo "<p>No students in $tutorcode</p>";
  } else {
    // sends query
    $tutor_aa = mysqli_fetch_assoc($tutor_qry);
    echo "<h1>$tutorcode</h1>";

    // prints each student in tutor
    do {
      $firstname = $tutor_aa['firstname'];
      $lastname = $tutor_aa['lastname'];
      $photo = $tutor_aa['photo'];
      
      echo "<img src='images/$photo' class=''>";
      echo "<p>$firstname $lastname</p>";

    } while ($tutor_aa = mysqli_fetch_assoc($tutor_qry));
  }
}

?>
