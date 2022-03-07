<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/stock-exchange-app.png" type="image/x-icon">
    <link rel="stylesheet" href="css/login&signup.css">
    <title>StockWatch| Login</title>
</head>
<body>
    <div class="form">
        <form action="php/login.script.php" method="POST">
            <center>
                <img src="img/stock-exchange-app.png" alt=""><br><br>
                <h3>Stock<span class="watch">Watch</span><span class="seperator"> | </span>Login</h3><br><br>
                <input type="text" class="username" name="username" placeholder="Username"><br><br>
                <div class="passworddiv">
                    <input type="password" class="password" name="password" id="inputs" placeholder="Password">
                    <div class="eye" alt=""></div>
                </div><br><br>
                <input type="submit" name="submit" class="btn"><br><br>
                <a href="signup.php" class="signup">Don't have an account <span>Sign Up</span></a>
                <br><br>
                <?php
                /*Error handlers*/
                $url = $_SERVER['REQUEST_URI'];
                if (preg_match("/emptyfield/", $url)) {
                  echo '<p style="color: red; font-family: sans-serif; font-size: 14px;">Some fields are empty</p>';
                }
                if (preg_match("/didntinputinfo/", $url)) {
                  echo '<p style="color: red; font-family: sans-serif; font-size: 14px;">First Login Buddy</p>';
                }
                if (preg_match("/wrongcredentials/", $url)) {
                  echo '<p style="color: red; font-family: sans-serif; font-size: 14px;">Incorrect password</p>';
                }
                if (preg_match("/usernotfound/", $url)) {
                  echo '<p style="color: red; font-family: sans-serif; font-size: 14px;">No such user Exists</p>';
                }
                if (preg_match("/firstlogin/", $url)) {
                  echo '<p style="color: red; font-family: sans-serif; font-size: 14px;">LogIn to continue</p>';
                }
                ?>
            </center>
        </form>
    </div>
    <script>
        const eye = document.querySelector(".eye");
        const password = document.querySelector(".password");

        function unhide(){
            if (eye.className == "eye") {
                eye.className = "view";
                password.type = "text";
            } else {
                eye.className = "eye";
                password.type = "password";
            }
        }
        eye.addEventListener("click", unhide);
    </script>
</body>
</html>