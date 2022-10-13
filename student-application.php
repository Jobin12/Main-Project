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
                <li><a href="#">Events</a></li>
                <li><a href="#">Payments</a></li>
                <li><a href="#">Camps</a></li>
                <li><a href="#">Certificates</a></li>
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
                echo "<th>Contact No.</th></tr>";
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['username']."</td>";
                    echo "<td>".$row['email']."</td>";
                    echo "<td>".$row['college']."</td>";
                    echo "<td>".$row['address']."</td>";
                    echo "<td>".$row['gender']."</td>";
                    echo "<td>".$row['mobile']."</td></tr>";
                }
                echo "</table>";
            }
        ?>
    </body>
</html>