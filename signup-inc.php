<?php


if(isset($_POST['submit'])){

     include_once 'dbh-inc.php';
    
       
    
          
    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $last = mysqli_real_escape_string($conn, $_POST['last']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    $kid = mysqli_real_escape_string($conn, $_POST['kid']);
    $cpr = mysqli_real_escape_string($conn, $_POST['cpr']);
   $file = mysqli_real_escape_string($conn, $_FILES["filetoupload"]["name"]);
        


 



    //file upload

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["filetoupload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if(isset($_POST["submit"])){
              $check = getimagesize($_FILES["filetoupload"]["tmp_name"]);
        if($check !== false){
            echo "File is an image -" . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    if (file_exists($target_file)){
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    if ($_FILES["filetoupload"]["size"] > 500000){
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
 //check extention   
    if($imageFileType !="jpg" && $imageFileType != "png"){
        echo "Sorry, only JPG, PNG files are allowed.";
        $uploadOk = 0;
    }
// check if $uploadOk is set to 0 by an error
if ($uploadOk == 0){
    echo "Sorry, your file was not uploaded.";
//if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["filetoupload"]["tmp_name"],$target_file))
    {
        echo"The file ".basename( $_FILES["filetoupload"]["name"]). "has been uploaded.";
    }else{
            echo "Sorry, there was an error uploading your file.";
    }
}



    //password length
    if(strlen($pwd) <8 )
    {
     
     die("Your password needs to be atleast 8 characters ");
    }
  

 
        //Error handlers
        //Check for empty fields
          if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd) || empty($kid) || empty($cpr)) {    
            header("Location: registration-form.php?signup=empty");
            echo "can not be empty";
            exit();
    } 
  
      
   
      else{
        //Check if input characters are valid
        if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)){
            header("Location: registration-form.php?signup=invalid");
            exit();
        }
        else {
            //Check if email is vaild
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                header("Location: registration-form.php?signup=email");
                exit();
            }
             else{
                $sql = "SELECT * FROM users WHERE user_uid='$uid'";
                $result = mysqli_query($conn,$sql);
                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0){
                    header("Location: registration-form.php?signup=usertaken");
                    exit();
    
            }
            else{
                //Hashing the password
                $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                
                //Insert the user into the database
                
                $sql = "INSERT INTO users(user_first, user_last, user_email, user_uid, user_pwd, kid, cpr, file) VALUES ('$first', '$last', '
                $email', '$uid', '$hashedPwd', '$kid', '$cpr', '$file')";
            $result = mysqli_query($conn, $sql);
            header("Location: registration-form.php?signup=success");
            exit();
            }
        }
    }
 }
}

else{

    header("Location: registration-form.php");
    exit();
}

//how many kids

