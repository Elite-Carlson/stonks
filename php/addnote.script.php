<?php
include 'loggedin.php';
if (isset($_POST['submit'])) {
    include 'dbconn.php';
    $title = mysqli_real_escape_string($connect, $_POST['notetitle']);;
    $notes = mysqli_real_escape_string($connect, $_POST['notes']);;
    $query = "INSERT INTO notes(uid,title,notes) VALUES('$uid' , '$title' , '$notes');";
    $run = mysqli_query($connect,$query);
    header("Location:index.php?msg=noteAddedSuccesfully");
}else {
    header("Location:index.php?error=submitdidntgothrough");
}
?>