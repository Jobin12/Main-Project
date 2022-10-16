<html>
    <head>
        <title>NSS Portal</title>
        <link rel="stylesheet" href="styles/style.css">
        <link rel="shortcut icon" type="image/x-icon" href="images/nss-symbol.png">
        <style>
            #content{
                max-width: 71vw;
                width: 100%;
                margin: 20px auto;
                padding:30px;
                margin-top: 60px;
                margin-left: 20vw;
                /* box-shadow: 0 0 20px lightgray; */
                font-family: sans-serif;
            }

            .approve,
            .deny{
                width:80px;
                height:30px;
                margin:5px;
                color:white;
                border-radius:5px;
                border:0;
            }

            .approve:hover,
            .deny:hover{
                cursor: pointer;
                box-shadow: 0 0 9px gray;
            }

            .approve{
                background-color:#32a852;
            }

            .deny{
                background-color: #d94343;
            }

        </style>
    </head>
    <body>

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

        <div class='sidebar'>
            <h1>NSS Portal</h1>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="colleges.php">Colleges</a></li>
                <li><a href="cordinators.php">Co-ordinators</a></li>
                <li><a href="students.php">Students</a></li>
                <li class='current'><a href="student-application.php">Student Applications</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="notification.php">Notifications</a></li>
                <li><a href="payment.php">Payments</a></li>
                <li><a href="camps.php">Camps</a></li>
            </ul>
        </div> 

        <div id='content'>
            <div class='title'>
                <h2>Student Applications</h2>
            </div>
        </div>

        <?php
            include('config.php');
            
            $sql="select * from student where access=0";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
                echo "<table class='data' width = '800'>";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Name</th>";
                echo "<th>Email</th>";
                echo "<th>College</th>";
                echo "<th>Address</th>";
                echo "<th>Gender</th>";
                echo "<th>Contact No.</th>";
                echo "<th>Access</th></tr>";
                while($row = mysqli_fetch_assoc($result)){
                    $email=$row['email'];
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['username']."</td>";
                    echo "<td>".$row['email']."</td>";
                    echo "<td>".$row['college']."</td>";
                    echo "<td>".$row['address']."</td>";
                    echo "<td>".$row['gender']."</td>";
                    echo "<td>".$row['mobile']."</td>";
                    echo "<td><form method='post'><input type='hidden' name='email' value='$email'><input type='submit' name='approve' class='approve' value='Approve'><br><input type='submit' class='deny' name='deny' value='Deny'></form></td></tr>";
                }
                echo "</table>";

                if(isset($_POST['approve'])){
                    $useremail=$_POST['email'];
                    $sql="update student set access=1 where email='$useremail'";
                    if(mysqli_query($conn,$sql)){
                        echo("<script>alert('Student Approved');window.location.href='student-application.php';</script>");
                    }
                    else{
                        echo("<script>alert('Database Error');</script>");
                    }
                }
                if(isset($_POST['deny'])){
                    $useremail=$_POST['email'];
                    $sql="delete from student where email='$useremail'";
                    if(mysqli_query($conn,$sql)){
                        echo("<script>alert('Student Deleted');window.location.href='student-application.php';</script>");
                    }
                    else{
                        echo("<script>alert('Database Error');</script>");
                    }
                }
            }
        ?>
    </body>
</html>