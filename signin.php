<?php

include_once 'header.php';

?>


<div class="login">
    <?php
   
if (isset($_SESSION['u_id'])){     
            
  
      echo $_SESSION['u_first'];
      echo $_SESSION['u_last'];
      echo "<br>";
      echo $_SESSION['u_kid'];
      
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