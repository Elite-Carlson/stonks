<?php
/*Checking if the person clicked the button submit,
this helps prevent someone from accessing this page by typing the URL */
if (isset($_POST['submit'])) {
  /*Connecting to the database*/
  include 'dbconn.php';

  /*Retriving the inputed data from the form and turning it into a string
  to avoid SQL injections and storing it into a variable*/
  $uid = mysqli_real_escape_string($connect, $_POST['username']);;
  $pass = mysqli_real_escape_string($connect, $_POST['password']);;

/*Checking if none of the forms are empty*/
if (!empty($uid) && !empty($pass)) {
    /*Hashing and salting the password */
    $hashedpassword = password_hash($pass, PASSWORD_DEFAULT);


/*getting row with the user information of user inputed*/
        $getuserdata = "SELECT * FROM users WHERE username = '".$uid."';";
        $run = mysqli_query($connect,$getuserdata);

/*recovering the data retrieved from the sql above*/
          $data = mysqli_fetch_array($run);
          $id = $data['0'];  /*getting the user id if user exists*/
          $idtoint = intval($id); /*turning the user id from integer to string*/

/*if a user id was recovered then that means that the username is taken so inform
user thats username is taken else input the new user into the database*/
          if ($idtoint > 0) {
            header("Location:../signup.php?error=userexists");
          }

          else{
    /*Writing the SQL codes for inputing the information into the table users and storing it into a variable
    then connecting to the database and querying the information into the database*/
    $query = "INSERT INTO users(username,passphrase)
    VALUES('$uid' , '$hashedpassword');";
    $run = mysqli_query($connect,$query);
    $true = True; /*Setting a variable with the vlaue true*/

    /*getting the user id so that we can insert it into the table tokens so that
    we can imediatly log in the user and create a cookie after signing up*/
    $selecttwo = "SELECT * FROM users WHERE username = '".$uid."';";
    $runtwo = mysqli_query($connect,$selecttwo);
    $getuserinfo = mysqli_fetch_array($runtwo);

    /*Generating random strings and turning binary to hexadecimal "bin2hex"*/
    $token = bin2hex(openssl_random_pseudo_bytes(64, $true));
    /*using the function sha1() to hash the token*/
    $hashedtoken = sha1($token);

    /*storing SQL code into a string for it to be later used in a query*/
    $insert = "INSERT INTO tokens(uid,token) VALUES('$getuserinfo[0]','$hashedtoken');";
    /*querying the info stored in variable insert into the database*/
    $query = mysqli_query($connect,$insert);
    /*setting a cookie with the name UID and values of $token*/
    setcookie("UID", $token, time() + 60 * 60 * 24 * 365);
    /*rideracting to index.php*/
    header("Location:../index.php");
  }
  /*Redirecting to index with the error message that some form fields are empty*/
   }else {
    header("Location:../signup.php?error=emptyformfilds");
  }
}
  /*Redirecting to index with the error message that the person didnt signup*/
    else {
    header("Location:../signup.php?error=firstsignup");
}
 /*End of php*/
 ?>
