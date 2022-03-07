<?php
if (isset($_COOKIE['zhenya'])) {
$cookie = $_COOKIE['zhenya'];
$select = "SELECT * FROM tokens WHERE token = '".$cookie."';";
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