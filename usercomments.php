<?php

// if sumbit button pressed
if (isset($_POST['submit'])){
  
    include_once 'dbh-inc.php';

    //taking into account the current character set of the connection 
    //so that it is safe to place it in a mysql_query().
  

  $comments = mysqli_real_escape_string($conn, $_POST['text']);
 



if (empty($comments)) {
        header("Location: index.php?comment=empty");
        echo "please write comments";
    exit();
}
else{

$sql = "INSERT INTO user_comments (comment) VALUE ('$comments')";
mysqli_query($conn, $sql);


header("Location: index.php?comment=success");
exit(); 
}
}