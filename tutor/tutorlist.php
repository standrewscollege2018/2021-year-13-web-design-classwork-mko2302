<div class="container">
  <?php
    // gets tutor user clicked
    // sql query
    $tutor_sql = "SELECT * FROM tutorgroup";
    $tutor_qry = mysqli_query($dbconnect, $tutor_sql);

    // error catching if no results
    if(mysqli_num_rows($tutor_qry)==0) {
      echo "<p class='display-2 text-center p-5'>No Tutor Groups</p>";
    } else {
      // sends query
      $tutor_aa = mysqli_fetch_assoc($tutor_qry);

      do {
        $tutor = $tutor_aa['tutor'];
        $code = $tutor_aa['tutorcode'];
        $photo = $tutor_aa['photo'];
        $tutorgroupID = $tutor_aa['tutorgroupID'];

        echo" <div class='col-lg-3'>
                <a href='index.php?page=tutorgroup&tutorgroupID=$tutorgroupID'>
                  <div class='card'>
                  <img class='card-img-top' src='images/$photo' alt='Image of $tutor'>
                    <div class='card-body'>
                      <h5 class='card-title'>$code</h5>
                      <p>$tutor</p>
                    </div>
                  </div>
                </a>
              </div>";

      } while ($tutor_aa = mysqli_fetch_assoc($tutor_qry));
    }
  ?>
