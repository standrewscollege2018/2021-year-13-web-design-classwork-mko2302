<?php
  //includes database connection code
  include("dbconnect.php");
?>

  // includes navbar code
  include("navbar.php");

// if user clicks on a link
if (isset($_GET['page'])) {
  // opens page user clicked on
  $page = $_GET['page'];
  include("$page.php");
  // else goes to home page
} else {
  include("home.php");
}
 ?>
