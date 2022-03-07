<?php
if (isset($_COOKIE['UID'])) {
$hashedcookie = sha1($_COOKIE['UID']);
$select = "SELECT * FROM tokens WHERE token = '".$hashedcookie."';";
$query = mysqli_query($connect,$select);
$getuid = mysqli_fetch_array($query);
$selecttwo = "SELECT * FROM users WHERE id = '".$getuid[1]."';";
$querytwo = mysqli_query($connect,$selecttwo);
$getuserinfo = mysqli_fetch_array($querytwo);
$uid = $getuserinfo[0];
}else {
  //header("Location:../login.php?error=firstlogin");
}
?>