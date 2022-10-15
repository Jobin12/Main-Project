<html>
    <head>
        <title>NSS Portal</title>
        <link rel="stylesheet" href="styles/style.css">
        <style>
            #content{
                max-width: 71vw;
                width: 100%;
                margin: 20px auto;
                padding:30px;
                margin-top: 60px;
                margin-left: 20vw;
                /* box-shadow: 0 0 20px lightgray; */
                background-color: white;
                font-family: sans-serif;

            }

            #content .buttons{
                display: flex;
                float: right;
                margin-top: -36px;
                margin-right:-65px;
            }

            #content .buttons button{
                width:160px;
                height:40px;
                margin:5px;
                color:white;
                border-radius:5px;
                border:0;
                background-color:brown;
                text-shadow: 0.5px 0.5px black;
            }

            #content .buttons button:hover{
                cursor: pointer;
                box-shadow: 0 0 9px gray;
            }
        </style>
    </head>
    <body>
        <div class='navbar'>
            <nav>
                <ul>
                    <li><a href="dashboard.php">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="login.php">Log Out</a></li>
                </ul>
            </nav>
        </div>

        <div class='sidebar'>
            <h1>NSS Portal</h1>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="colleges.php">Colleges</a></li>
                <li><a href="cordinators.php">Co-ordinators</a></li>
                <li><a href="students.php">Students</a></li>
                <li><a href="student-application.php">Student Applications</a></li>
                <li class='current'><a href="gallery.php">Gallery</a></li>
                <li><a href="notification.php">Notifications</a></li>
                <li><a href="payment.php">Payments</a></li>
                <li><a href="#">Camps</a></li>
            </ul>
        </div> 

        <div id='content'>
            <div class='title'>
                <h2>Photo Gallery</h2>
                <div class="buttons" enctype="multipart/form-data">
                    <form method='post'>
                        <input type='file' name='photo' id='photoupload'>
                        <button name='add'>Upload Image</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>