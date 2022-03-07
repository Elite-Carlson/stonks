<?php
if (isset($_POST['submit'])) {
    include 'dbconn.php';

    $username = mysqli_real_escape_string($connect, $_POST['username']);;
    $pass = mysqli_real_escape_string($connect, $_POST['password']);;

if (!empty($username) && !empty($pass)) {

    $getuserdata = "SELECT * FROM users WHERE username = '".$username."';";
    $run = mysqli_query($connect,$getuserdata);

      $data = mysqli_fetch_array($run);

if ($data=="") {
  header("Location:../login.php?error=usernotfound");
}else {
      $id = $data['0'];
      $hashedpass = $data['2'];

      $tostring = strval($hashedpass);

      $dehash = password_verify($pass,$tostring);
      if ($dehash==1) {
        $true = True;
        $token = bin2hex(openssl_random_pseudo_bytes(64, $true));
        $hashedtoken = sha1($token);

        $insert = "INSERT INTO tokens(userid,token) VALUES('$data[0]','$hashedtoken');";
        $query = mysqli_query($connect,$insert);
        setcookie("UID", $token, time() + 60 * 60 * 24 * 7);
        header("Location:../index.php");
      }else {
      header("Location:../login.php?error=wrongcredentials");
    }
  }
  }
  else {
    header("Location:../login.php?error=emptyfield");
  }
  }
  else {
    header("Location:../login.php?error=didntinputinfo");
  }
?>
