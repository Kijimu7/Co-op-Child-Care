<?php
session_start();
if (isset($_POST['submit'])){
    echo "Hello";
    include 'dbh-inc.php';

    //taking into account the current character set of the connection 
    //so that it is safe to place it in a mysql_query().
    
$comments = mysqli_real_escape_string($conn, $_POST['user_comments']);


}

/*if (empty($comments)) {
    header("Location: index.php?");
    exit();
}
else{
$sql = "SELECT * FROM users WHERE user_comments='$comments'";
$result = mysqli_query($conn, $sql);

echo $_SESSION['u_last'];

header('Loation: index.php');
exit(); 
}
}
*/