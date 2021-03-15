<?php
  if (isset($_GET['student'])) {

    $studentID = $_GET['student'];
    $student_sql = "SELECT * FROM student WHERE studentID = $studentID";
    $student_qry = mysqli_query($dbconnect, $student_sql);
    $student_aa = mysqli_fetch_assoc($student_qry);

    $firstname = $student_aa['firstname'];
    $lastname = $student_aa['lastname'];
    $photo = $student_aa['photo'];
    $studentID = $student_aa['studentID'];
    $student_tutorgroupID = $student_aa['tutorgroupID'];


    echo "
    <form class='' action='index.php?page=updatestudent&student=$studentID' method='post'>
      <div class='form-group'>
        <label for='firstname'>Firstname</label>
        <input type='text' class='form-control' id='firstname' name='firstname' placeholder='First Name' value='$firstname'>
      </div>
      <div class='form-group'>
        <label for='lastname'>Lastname</label>
        <input type='text' class='form-control' id='lastname' name='lastname' placeholder='Lastname' value='$lastname'>
      </div>
      <div class='form-group'>
        <label for='tutorgroupID'>Tutor Group</label>
        <select id='tutorgroupID' name='tutorgroupID' class='custom-select'>"; ?>
          <?php
            $tutorID = 'SELECT * FROM tutorgroup';
            $tutor_qry = mysqli_query($dbconnect, $tutor_sql);
            $tutor_aa = mysqli_fetch_assoc($tutor_qry);
            do {
              $tutorgroupID = $tutor_aa['tutorgroupID'];
              $tutorcode = $tutor_aa['tutorcode'];
              if ($tutorgroupID==$student_tutorgroupID) {
                $required = "- selected";
                $selected = "selected";
              } else {
                $required = "";
                $selected = "";
              }
            echo "<option value='$tutorgroupID' $selected>$tutorcode $required </option>";
          } while($tutor_aa = mysqli_fetch_assoc($tutor_qry));

  echo"  </select>
      </div>
      <button type='submit' class='btn btn-primary'>Update</button>
    </form>";

  } else {
    header("Location:index.php?page=updatestudentselect&status=error");
  }

 ?>
