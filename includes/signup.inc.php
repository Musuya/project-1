<?php

if (isset($_post['submit'])){
    
   include_once 'dbh.php';
    
    $first = mysqli_real_escape_string($conn, $_post['first']);
    $last = mysqli_real_escape_string($conn, $_post['last']);
    $housenumber = mysqli_real_escape_string($conn, $_post['housenumber']);
    $uid = mysqli_real_escape_string($conn, $_post['uid']);
    $pwd = mysqli_real_escape_string($conn, $_post['pwd']);
    
    //Error handlers
    //Check for empty fields
    if (empty($first) || empty($last) || empty($last) || empty($housenumber) || empty($uid)|| empty($pwd)){
        header("location: ../signup.php?signup=empty");
        exit();
    } else {
        //check if input characters are valid
        if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last))
            header("location: ../signup.php?signup=invalid");
            exit();
    } else {
        //check if email is valid
        if (!filter_var($email, filter_validate_email)) {
             header("location: ../signup.php?signup=housenumber");
             exit();
        } else {
            $sql = "SELECT * FROM users WHERE user_uid='$uid'";
            $result = mysqli_query($conn, $sql);
            $resultcheck = mysqli_num_rows($result);
            
            if ($resultcheck > 0) {
                header("location: ../signup.php?signup=usertaken");
                exit();
            } else {
                //hashing the password
                $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
                //insert the user into the database
                $sql = "INSERT INTO users (user_first, user_last, user_last, user_housenumber, user_uid, user_pwd) VALUES ('$first', '$last', '$housenumber', '$uid', '$hashedpwd');";
                mysqli_query($conn, $sql);
                header("location: ../signup.php?signup=success");
                exit();
            }
    }
    
}else {
    header("location: ../signup.php");
    exit();
}