<?php

// check to see if logged in.
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: index.php");
}

if(!isset($_GET['status'])) {
  echo "";
} else {
  $status = $_GET['status'];
  if ($status = "duplicate") {
     echo "<div class='alert alert-danger' role='alert'>
              Tutor already entered in database!
          </div>";
  } elseif ($status = "success") {
    echo "<div class='alert alert-success' role='alert'>
             New tutor added!
         </div>";
        }
      }
?>

<div class='container m-2'>
 <form action='index.php?page=inserttutor' method='post'>
   <div class='form-group'>
     <label for='name'>Tutor Name</label>
     <input type='text' class='form-control' name='name' placeholder='Enter tutor name'>
   </div>
   <div class='form-group'>
     <label for='code'>Tutor Code</label>
     <input type='text' class='form-control' name='code' placeholder='Enter tutor code'>
   </div>
   <button type='submit' class='btn btn-primary'>Submit</button>
 </form>
</div>
