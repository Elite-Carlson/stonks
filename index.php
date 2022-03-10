<!DOCTYPE html>
<!--<?php
include 'php/dbconn.php';
include 'php/loggedin.php';
?>-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/candlestick.png" type="image/x-icon">
    <link rel="shortcut icon" href="img/stock-exchange-app.png" type="image/x-icon">
    <link rel="stylesheet" href="css/indexstyling.css">
    <title>StockWatch</title>
</head>
<body>
    <div class="container">
        <!--Navbar-->
        <div class="navbar">
            <div class="navbarleft">
                <p class="watchlistactive">Watch List</p>
                <p class="notesinactive">Notes</p>
            </div>
            <div class="add" title="Add stock"></div>
        </div><br>
        <hr style="width: 100%;">

        <!--Watchlist starts here-->
        <div class="watchlist">
            <div class="watchlistbar">
                <h1>stocks</h1>
            </div>
            <div class="watchlistcontent">
                <h1>No stock selected</h1>
            </div>
        </div>

        <!--Notes start here-->
        <div class="notes">
            <div class="notesbar">
                <h1>Notes</h1>
            </div>
            <div class="notescontent">
                <h1>No notes selected</h1>
            </div>
        </div>

        <!--Add Stock-->
        <div class="addstock">
            
        </div>

        <!--Add Note-->
        <div class="addnotehidden">
            <div class="notebuttons">
                <form action="php/addnote.script.php" method="POST">
                    <input type="text" placeholder="Add your note title" name="notetitle" class="notetitle"><br>
                    <textarea name="notes" id="" cols="30" rows="10"></textarea>
                    <button name="submit" class="addnotebtn">Add Note</button>
                </form>
                <!--<?php
                $select = "SELECT * FROM notes WHERE uid = '".$uid."';";
                $query = mysqli_query($connect,$select);
                $getuserinfo = mysqli_fetch_array($query);
                echo "$uid";
                ?>-->
            </div>
        </div>
    </div>
    <script src="js/indexscripts.js"></script>
</body>
</html>