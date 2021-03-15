<?php
// if there was a search
  if(!isset($_POST['search'])) {
    // change the header
    header("Location: search.php");
  }
  // stores user search in a variable
  $search = $_POST['search'];

  // forms sql query to find like search
  $result_sql = "SELECT * FROM student JOIN tutorgroup ON tutorgroup.tutorgroupID = student.tutorgroupID WHERE firstname LIKE '%$search%' OR lastname LIKE '%$search%'";

  // sends sql query to data base
  $result_qry = mysqli_query($dbconnect, $result_sql);

  // if no results found
  if(mysqli_num_rows($result_qry)==0) {
    // prints no results
      echo "<p class='dispaly-2 text-centre p-5'>No results found</p>";
    } else {
      // is there are results
      // puts results into assosiative array
      $result_aa = mysqli_fetch_assoc($result_qry);
?>
      <div class="row m-2">
        <?php
        do {
          $firstname = $result_aa['firstname'];
          $lastname = $result_aa['lastname'];
          $photo = $result_aa['photo'];
          $tutorcode = $result_aa['tutorcode'];
          $tutorID = $result_aa['tutorgroupID'];

          echo" <div class='col-lg-4 col-md-6'>
                  <div class='card'>
                  <img class='card-img-top' src='images/$photo' alt='Image of $firstname $lastname'>
                    <div class='card-body'>
                      <h5 class='card-title'>$firstname $lastname</h5>
                      <a href='index.php?page=tutorgroup&tutorgroupID=$tutorgroupID&tutorcode=$tutorcode'>Tutor: $tutorcode</a>
                    </div>
                  </div>
                </div>";

        } while ($result_aa = mysqli_fetch_assoc($result_qry));
      }
    ?>
   </div>
