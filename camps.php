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

            #content .buttons{
                display: flex;
                float: right;
                margin-top: -36px;
                margin-right:-65px;
            }

            #content .buttons button{
                width:100px;
                height:40px;
                margin:5px;
                color:white;
                border-radius:5px;
                border:0;
                background-color:orangered;
                text-shadow: 0.5px 0.5px black;
            }

            #content .buttons button:hover{
                cursor: pointer;
                box-shadow: 0 0 9px gray;
                background-color:brown;
            }

            .edit,
            .delete{
                width:80px;
                height:30px;
                margin:5px;
                color:white;
                border-radius:5px;
                border:0;
            }

            .edit:hover,
            .delete:hover{
                cursor: pointer;
                box-shadow: 0 0 9px gray;
            }

            .edit{
                background-color:forestgreen;
            }

            .delete{
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
                <li><a href="student-application.php">Student Applications</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="notification.php">Notifications</a></li>
                <li><a href="payment.php">Payments</a></li>
                <li class='current'><a href="camps.php">Camps</a></li>
            </ul>
        </div> 

        <div id='content'>
            <div class='title'>
                <h2>Camps</h2>
                <div class="buttons">
                    <form method='post'>
                        <button name='search'>Search</button>
                        <button name='add'>Add Camp</button>
                    </form>
                </div>
            </div>
        </div>

        <?php
            include('config.php');

            session_start();
            
            if(isset($_POST['add'])){
                header('Location: addcamp.php');
            }

            $sql="select * from camp;";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
                echo "<table class='data' width = '800'>";
                echo "<tr>";
                echo "<th>Camp ID</th>";
                echo "<th>Camp Name</th>";
                echo "<th>Camp Date</th>";
                echo "<th>Duration</th>";
                echo "<th>Apply Date</th>";
                echo "<th>Status</th>";
                echo "<th>Action</th></tr>";
                while($row = mysqli_fetch_assoc($result)){
                    $cmpid=$row['campid'];
                    echo "<tr>";
                    echo "<td>".$row['campid']."</td>";
                    echo "<td>".$row['campname']."</td>";
                    echo "<td>".$row['campdate']."</td>";
                    echo "<td>".$row['duration']."</td>";
                    echo "<td>".$row['applydate']."</td>";
                    echo "<td>".$row['status']."</td>";
                    echo "<td><form method='post'><input type='hidden' name='cmpid' value='$cmpid'><input type='submit' name='edit' class='edit' value='Edit'><br><input type='submit' class='delete' name='delete' value='Delete'></form></td></tr>";

                }
                echo "</table>";
            }

            if(isset($_POST['edit'])){
                $_SESSION['cmpid']=$_POST['cmpid'];
                header("Location: editcamp.php");
            }

            if(isset($_POST['delete'])){
                $campid=$_POST['cmpid'];
                $sql="delete from camp where campid='$campid'";
                if(mysqli_query($conn,$sql)){
                    echo("<script>alert('Camp Deleted');window.location.href='camps.php';</script>");
                }
                else{
                    echo("<script>alert('Database Error');</script>");
                }
            }
        ?>
    </body>
</html>