<html>
    <head>
        <title>NSS Portal</title>
        <link rel="stylesheet" href="styles/style.css">
        <link rel="stylesheet" href="styles/profile.css">
        <link rel="shortcut icon" type="image/x-icon" href="images/nss-symbol.png">
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <style>
        body{
            background-color: aliceblue;
        }
        nav{
            position: fixed;
            top:0;
            height: 60px;
            width:80vw;
            padding-left: 20vw;
            box-shadow: 0 0 20px rgba(0,0,0,0.15);
            background-color: white;
            width:100%;
            margin-left:-130;
            z-index: 1;
            font-size: 14.5px;
        }

        nav ul{
            float: right;
            padding-right: 40px;
            width: auto;
            margin:8px;
        }

        nav ul li{
            display: inline-block;
            padding: 10px;
            margin:0;
        }

        nav ul li a{
            text-decoration: none;
            color: black;
        }

        nav ul li a:hover{
            color: #009879;
        }

        ul li{
            list-style-type: none;
            margin-left:0;
        }
        ul{
            margin-left:-35;
            margin-top:-10;
        }

        h1{
            font-size:30px;
            margin-left:-5;
            font-weight: bold;
        }

        .sidebar{
            font-size: 16px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        .col-xl-8{
            margin-left:30%;
            margin-top:2%;
        }
    </style>
    <body>
    <div class="container-xl px-4 mt-4">
    <div class='navbar'>
            <nav>
                <ul>
                    <li><a href="dashboard.php">Home</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="login.php">Log Out</a></li>
                </ul>
            </nav>
        </div>
    <hr class="mt-0 mb-4">
    <div class='sidebar'>
            <!-- <img src="images/nss-symbol.png" width="40" height="40"> -->
            <h1>NSS Portal</h1>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="colleges.php">Colleges</a></li>
                <li><a href="cordinators.php">Co-ordinators</a></li>
                <li><a href="students.php">Students</a></li>
                <li><a href="student-application.php">Student Applications</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="notification.php">Notifications</a></li>
                <li><a href="payment.php">Payments</a></li>
                <li><a href="camps.php">Camps</a></li>
            </ul>
        </div>
    <div class="row">
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <form>
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Username</label>
                            <input class="form-control" id="inputUsername" type="text" placeholder="Enter your username">
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (organization name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputOrgName">College name</label>
                                <input class="form-control" id="inputOrgName" type="text" placeholder="Enter your college name">
                            </div>
                            <!-- Form Group (location)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Address</label>
                                <input class="form-control" id="inputLocation" type="text" placeholder="Enter your address">
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Contact number</label>
                                <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your contact number">
                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="password">Password</label>
                                <input class="form-control" id="password" type="password" name="password" placeholder="Enter your password">
                            </div>
                        </div>
                        <!-- Save changes button-->
                        <button class="btn btn-primary" type="button">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 
    </body>
</html>

