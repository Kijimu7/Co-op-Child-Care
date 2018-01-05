<?php

include_once 'header.php';

?>


<div class="login">
    <?php
   
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
      

    echo '<form action="logout-inc.php" method="POST">
            <button type="submit" name="submit">Logout</button>
      </form>';
      } else{
        echo '<form action="login-inc.php" method="POST">
        <input type="text" name="uid" placeholder="Username/e-mail">
        <input type="password" name="pwd" placeholder="password">
        <button type="submit" name="submit" >Login</button>
</form>
<a class="login-a" href="signup-inc.php">Sign up</a>';

      }
      ?>
       </div> <!-- /nav-login -->
  
         
    
    
       
        
        
      </body>
      </html>