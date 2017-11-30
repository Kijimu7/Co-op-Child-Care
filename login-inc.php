<?php
session_start();
if (isset($_POST['submit'])){

    include 'dbh-inc.php';

    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

     //Error handlers
     //Check if inputs are empty
     if (empty($uid) || empty($pwd)){
        header("Location: index.php?login=empty");
        exit();
     
}else{
    //Check if user name exsit in database
    $sql = "SELECT * FROM users WHERE user_uid='$uid' OR user_email = '$uid'";
    $result = mysqli_query($conn, $sql);
    //How many rows
    $resultCheck = mysqli_num_rows($result);
    //no result inside
    if ($resultCheck < 1){
        header("Location: index.php?login=error1");
        exit();
    }else{

        //Fetch a result row as an associative array
        if($row = mysqli_fetch_assoc($result)){
            //De-hashing the password
            $hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
            if ($hashedPwdCheck == false){
                header("Location: index.php?login=error2");
                exit();
            }elseif($hashedPwdCheck == true){

                //Log in the user here
                //Set session variables
                // Assosiateive array
                $_SESSION['u_id'] = $row['user_id'];
                $_SESSION['u_first'] = $row['user_first'];
                $_SESSION['u_last'] = $row['user_last'];
                $_SESSION['u_email'] = $row['user_email'];
                $_SESSION['u_uid'] = $row['user_uid'];
                $_SESSION['u_kid'] = $row['kid'];
                $_SESSION['u_cpr'] = $row['cpr'];
                $_SESSION['u_file'] = $row['file'];

              
                

                header("Location: index.php?login=success");
                exit();
            
            }

        }
    }
}

}else{
     header("Location: index.php?login=error3");
     exit();
 }
