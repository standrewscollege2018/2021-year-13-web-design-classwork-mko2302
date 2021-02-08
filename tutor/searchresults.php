<?php
// if there was a search
  if(!isset($_POST['search'])) {
    // change the header
    header("Location: search.php");
  }
  // stores user search in a variable
  $search = $_POST['search'];

  // forms sql query to find like search
  $result_sql = "SELECT * FROM student WHERE firstname LIKE '%$search%' OR lastname LIKE '%$search%'";

  // sends sql query to data base
  $result_qry = mysqli_query($dbconnect, $result_sql);

  // if no results found
  if(mysqli_num_rows($result_qry)==0) {
    // prints no results
      echo "<h1>No results found</h1>";
    } else {
      // is there are results
      // puts results into assosiative array
      $result_aa = mysqli_fetch_assoc($result_qry);

      // while there are results
      do {
        // puts data into seperate variables from associative array
        $firstname = $result_aa['firstname'];
        $lastname = $result_aa['lastname'];
        $photo = $result_aa['photo'];
        ?>

        <!-- prints image and name -->
          <img src="images/<?php echo $photo; ?>" class="" alt="">
          <p><?php echo "$firstname $lastname"; ?></p>
      <?php
        } while ($result_aa = mysqli_fetch_assoc($result_qry));


  }

 ?>
