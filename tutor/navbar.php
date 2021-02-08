<?php
// navbar code

// SQL query to select all data from tutor group
$tutor_sql = "SELECT * FROM tutorgroup";
// sends query to database
$tutor_qry = mysqli_query($dbconnect, $tutor_sql);
//turns results into an associative array
$tutor_aa = mysqli_fetch_assoc($tutor_qry);
 ?>
 <!-- link to home -->

<div class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php"><h1>St Andrew's College</h1></a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item"><h3>Tutor groups</h3></li>

      <?php
      // while loop to display each tutor code
        do {
          // finds ID and tutor code from the AA
          $tutorgroupID = $tutor_aa['tutorgroupID'];
          $tutorcode = $tutor_aa['tutorcode'];

          // prints link to each tutor group page
          echo "<li class='nav-item'><a class='nav-link' href='index.php?page=tutorgroup&tutorgroupID=$tutorgroupID&tutorcode=$tutorcode'>$tutorcode</a></li>";

         } while ($tutor_aa = mysqli_fetch_assoc($tutor_qry))
      ?>

      <!-- search -->
      <form class="form-inline my-2 my-lg-0" action="index.php?page=searchresults" method="post">
        <input class="form-control mr-sm-2" required type="text" name="search" placeholder="Student name">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>

    </ul>
  </div>

</div>
