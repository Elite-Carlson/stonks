<?php
/*Checking if the person clicked the button submit,
this helps prevent someone from accessing this page by typing the URL */
if (isset($_POST['submit'])) {
/*Connecting to the database*/
    include 'dbconn.php';

/*getting user information*/
    $username = mysqli_real_escape_string($connect, $_POST['username']);;
    $pass = mysqli_real_escape_string($connect, $_POST['password']);;

/*Checking if none of the fields are empty, if empty will relocate to login.php
else will execute the code below*/
if (!empty($username) && !empty($pass)) {

/*getting row with the user information of user inputed*/
    $getuserdata = "SELECT * FROM users WHERE username = '".$username."';";
    $run = mysqli_query($connect,$getuserdata);

/*recovering the data retrieved from the sql above*/
      $data = mysqli_fetch_array($run);

if ($data=="") {
  header("Location:login.php?error=usernotfound");
}else {
/*getting the password from the database where the data matches with
our records, we are retrieving it as an arrays as that is the method in witch
SQL returns the information to us and the password has the index of 1*/
      $id = $data['0'];
      $hashedpass = $data['2'];

/*turning the retrieved hashed password to a string*/
      $tostring = strval($hashedpass);

/*dehashing the password if the password is correct $dehash is equal to 1
if not it is equal to 0*/
      $dehash = password_verify($pass,$tostring);
      if ($dehash==1) {
        $true = True; /*Setting a variable with the vlaue true*/

        /*Generating random strings and turning binary to hexadecimal "bin2hex"*/
        $token = bin2hex(openssl_random_pseudo_bytes(64, $true));
        /*using the function sha1() to hash the token*/
        $hashedtoken = sha1($token);

        /*storing SQL code into a string for it to be later used in a query*/
        $insert = "INSERT INTO tokens(uid,token) VALUES('$data[0]','$hashedtoken');";
        /*querying the info stored in variable insert into the database*/
        $query = mysqli_query($connect,$insert);
        /*setting a cookie with the name UID and values of $token*/
        setcookie("UID", $token, time() + 60 * 60 * 24 * 7);
        /*rideracting to index.php*/
        header("Location:index.php");
      }else {
      header("Location:login.php?error=wrongcredentials");
    }
  }
  }
  /*This will run if one or more of the fields is empty*/
  else {
    header("Location:login.php?error=emptyfield");
  }
  }
  /*This will run if someone tries to access this page through the URL*/
  else {
    header("Location:login.php?error=didntinputinfo");
  }
?>
