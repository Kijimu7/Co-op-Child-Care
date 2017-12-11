<?php
include_once 'header.php';


if (isset($_SESSION['u_id'])){     
            
  
      echo "Name:  " . $_SESSION['u_first'];
      echo $_SESSION['u_last'];
      echo "<br>";
      echo "Number of kids:   " .  $_SESSION['u_kid'];
      echo "<br>";
      echo "cpr:   " .  $_SESSION['u_cpr'];
      echo "<br>";
     // echo $_SESSION['u_file'];
      $userpicture = $_SESSION['u_file'];
      // Img Src
      $url = 'uploads/' . $userpicture;
      echo "url: " . $url;
      echo "<img src=" .$url . " width=100px>";

      

}
?>
<form action="usercomments.php" name="user_comments" method="POST">
<textarea rows="4" cols="50"></textarea>
<br>
<input type="submit" >
</form>
