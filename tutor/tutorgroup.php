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
    ?>
    <div class="row m-2">
      <?php
      do {
        $firstname = $tutor_aa['firstname'];
        $lastname = $tutor_aa['lastname'];
        $photo = $tutor_aa['photo'];

        echo" <div class='col-lg-4'>
                <div class='card'>
                <img class='card-img-top' src='images/$photo' alt='Image of $firstname $lastname'>
                  <div class='card-body'>
                    <h5 class='card-title'>$firstname $lastname</h5>
                  </div>
                </div>
              </div>";

      } while ($tutor_aa = mysqli_fetch_assoc($tutor_qry));
    }
  }
  ?>
    </div>
