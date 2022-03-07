<?php
/*checking if cookie UID exists then running the if statement*/
if (isset($_COOKIE['UID'])) {
/*hashing the values of the cookie UID*/
$hashedcookie = sha1($_COOKIE['UID']);
/*writing, querying and retrieving the SQL for the matching token in table tokens
in the database*/
$select = "SELECT * FROM tokens WHERE token = '".$hashedcookie."';";
$query = mysqli_query($connect,$select);
$getuid = mysqli_fetch_array($query);
/*getting user information from the table users*/
$selecttwo = "SELECT * FROM users WHERE id = '".$getuid[1]."';";
$querytwo = mysqli_query($connect,$selecttwo);
$getuserinfo = mysqli_fetch_array($querytwo);
$uid = $getuserinfo[0];
}else {
  header("Location:login.php?error=firstlogin");
}
?>