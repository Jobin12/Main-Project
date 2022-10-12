<html>
    <head>
        <title>NSS Portal</title>
        <link rel="stylesheet" href="styles/login.css">
    </head>
    <body>

        <div class='sidebar'>
            <h1>NSS Portal</h1>
        </div>
        <div class='navbar'>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="login.php">Log In</a></li>
                </ul>
            </nav>
        </div> 

        <div id = 'box'>
            <div id = 'heading'>LOGIN</div><br>
                <form method = 'post' autocomplete='off'>
                    <label>Email</label><input id = 'text' type = 'email' placeholder = 'Email' name = 'email'><br><br>
                    <label>Password</label><input id = 'text' type = 'password' placeholder = 'Password' name = 'password'><br><br> 
                    <input id = 'button' type = 'submit' value = 'Login' name = 's'>
                </form>
            <label>Not a User?</label><a href="signup.php">Register</a>
        </div>

    </body>
</html>