<?php
if (isset($_POST['submit'])) {
  include 'dbconn.php';

  $uid = mysqli_real_escape_string($connect, $_POST['username']);;
  $pass = mysqli_real_escape_string($connect, $_POST['password']);;

if (!empty($uid) && !empty($pass)) {
    $hashedpassword = password_hash($pass, PASSWORD_DEFAULT);


        $getuserdata = "SELECT * FROM users WHERE username = '".$uid."';";
        $run = mysqli_query($connect,$getuserdata);

          $data = mysqli_fetch_array($run);
          $id = $data['0']; 
          $idtoint = intval($id);
          if ($idtoint > 0) {
            header("Location:../signup.php?error=userexists");
          }

          else{
    $query = "INSERT INTO users(username,passphrase)
    VALUES('$uid' , '$hashedpassword');";
    $run = mysqli_query($connect,$query);
    $true = True;
    $selecttwo = "SELECT * FROM users WHERE username = '".$uid."';";
    $runtwo = mysqli_query($connect,$selecttwo);
    $getuserinfo = mysqli_fetch_array($runtwo);

    $token = 69/*bin2hex(openssl_random_pseudo_bytes(64, $true));*/;
    $hashedtoken = sha1($token);

    $insert = "INSERT INTO tokens(uid,token) VALUES('$getuserinfo[0]','$token');";
    $query = mysqli_query($connect,$insert);
    setcookie("zhenya", $token, time() + 60 * 60 * 24 * 365);
    header("Location:../index.php");
  }
   }else {
    header("Location:../signup.php?error=emptyformfilds");
  }
}
    else {
    header("Location:../signup.php?error=firstsignup");
}
 ?>
