<?php

// if sumbit button pressed
if(isset($_POST['submit'])){
    
      include_once 'dbh-inc.php';

      
      $title = mysqli_real_escape_string($conn, $_POST['title']);
      $comments = mysqli_real_escape_string($conn, $_POST['description']);
  
   if (empty($comments || $title)) {
        header("Location: index.php?comment=error");
        echo "please write comments";
      
    exit();
}
  else{

    $sql = "INSERT INTO user_post (comment, title) VALUE ('$comments', '$title')";
    mysqli_query($conn, $sql);


    header("Location: index.php?comment=success");
    exit(); 
}
}