<?php
    include_once 'header.php';
   
?>



<div id="error"> </div>
 <div class="Signup">  
              <h2>Signup</h2>
   <form class="signup-form" action="signup-inc.php" method="POST" enctype="multipart/form-data" onsubmit="return checkforblank">
        <input type="text" name="first" placeholder="Firstname">
        <input type="text" name="last" placeholder="Lastname">
        <input type="text" name="email" placeholder="E-mail">
        <input type="text" name="uid" placeholder="Username">
        <input type="text" name="pwd" placeholder="Password">
        
        <div class="input-sp">
        How many kids?<br>
        <input type="number" name="kid" min="1" max="10"><br>
        Do you have CPR?<br>
        <input type="radio" name="cpr" value="yes"> yes
        <input type="radio" name="cpr" value="no"> No
</div>
        <input type="file" name="filetoupload">
        <button type="submit" name="submit" >Sign up</button>
</form>
</div>
</body>
</html>

