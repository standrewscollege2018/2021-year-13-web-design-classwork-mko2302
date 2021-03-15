<!-- admin panel goes here -->

<?php
// check to see if logged in.
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: index.php");
}

 ?>
 
<a class="nav-link" href="index.php?page=addtutor">Add Tutor</a>
<a class="nav-link" href="index.php?page=addstudent">Add Student</a>
<a class="nav-link" href="index.php?page=deletestudentselect">Delete Student</a>
<a class="nav-link" href="index.php?page=updatestudentselect">Update Student</a>

<a class="nav-link" href="logout.php">Log Out</a>
