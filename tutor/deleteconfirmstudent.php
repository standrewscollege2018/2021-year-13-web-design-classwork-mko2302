<?php
  $studentID = $_GET['student'];

  $student_sql = "SELECT * FROM student WHERE studentID=$studentID";
  $student_qry = mysqli_query($dbconnect, $student_sql);
  $student_aa = mysqli_fetch_assoc($student_qry);

  $firstname = $student_aa['firstname'];
  $lastname = $student_aa['lastname'];
  $photo = $student_aa['photo'];

  echo "
  <div class='container p-2 text-centre'>
    <p class='display-4'>Are you sure you want to delete $firstname $lastname ?</p>
    <a class='btn btn-primary btn-lg col-lg-5 m-1' role='button' href='index.php?page=deletestudent&student=$studentID'>Yes, confirm</a>
    <a class='btn btn-secondary btn-lg col-lg-5 m-1' role='button' href='index.php?page=deletestudentselect&status=cancelled'>No, take me back</a>

    <div class='col-lg-4 col-md-6'>
       <div class='card'>
         <img class='card-img-top' src='images/$photo' alt='Image of $firstname $lastname'>
           <div class='card-body'>
             <h5 class='card-title'>$firstname $lastname<</h5>
           </div>
       </div>
    </div>

  </div>
  ";
 ?>
