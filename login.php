<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/stock-exchange-app.png" type="image/x-icon">
    <title>StockWatch| Login</title>
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        .form{
            padding: 50px 20px 50px 20px;
            width: 330px;
            background-color: white;
            overflow: hidden;
            border: 1px solid rgba(0, 0, 0, 0.281);
            border-radius: 10px;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }
        .username{
            width: 269px;
            height: 40px;
            border: 1px solid black;
            outline: none;
            padding-left: 10px;
            padding-right: 10px;
            border-radius: 4px;
        }
        .password{
            height: 40px;
            width: 235px;
            padding-left: 10px;
            padding-right: 2px;
            border: none;
            outline: none;
        }
        .passworddiv{
            display: flex;
            justify-content: space-between;
            border: 1px solid black;
            padding-left: 1px;
            border-radius: 4px;
            width: 286px;
        }
        .eye{
            background-image: url(img/eye.png);
            width: 16px;
            height: 16px;
            margin-top: 13px;
            margin-right: 20px;
            display: block;
        }
        .view{
            background-image: url(img/view.png);
            width: 16px;
            height: 16px;
            margin-top: 13px;
            margin-right: 20px;
            display: block;
        }
        .btn{
            background-color: black;
            color: white;
            width: 286px;
            border-radius: 20px;
            height: 40px;
            border: none;
            transition: border-radius 3s;
        }
        .btn:hover{
            border-radius: 20px;
        }
        a{
            text-decoration: none;
            font-family: sans-serif;
            color: black;
            font-size: 14px;
        }
        span{
            font-weight: 700;
        }
        h3{
            font-family: sans-serif;
            font-weight: 800;
        }
        .watch{
            font-style: italic;
            color: rgb(3, 192, 3);
        }
        .seperator{
            font-weight: 100;
        }
    </style>
</head>
<body>
    <div class="form">
        <form action="">
            <center>
                <img src="img/stock-exchange-app.png" alt=""><br><br>
                <h3>Stock<span class="watch">Watch</span><span class="seperator"> | </span>Login</h3><br><br>
                <input type="text" class="username" placeholder="Username"><br><br>
                <div class="passworddiv">
                    <input type="password" class="password" id="inputs" placeholder="Password">
                    <div class="eye" alt=""></div>
                </div><br><br>
                <input type="submit" class="btn"><br><br>
                <a href="signup.php" class="signup">Don't have an account <span>Sign Up</span></a>
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