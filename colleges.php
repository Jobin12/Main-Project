<html>
    <head>
        <title>NSS Portal</title>
        <link rel="stylesheet" href="styles/style.css">
        <link rel="shortcut icon" type="image/x-icon" href="images/nss-symbol.png">
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
                <li class='current'><a href="colleges.php">Colleges</a></li>
                <li><a href="cordinators.php">Co-ordinators</a></li>
                <li><a href="students.php">Students</a></li>
                <li><a href="student-application.php">Student Applications</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="notification.php">Notifications</a></li>
                <li><a href="payment.php">Payments</a></li>
                <li><a href="camps.php">Camps</a></li>
            </ul>
        </div> 

        <div class="content">
            <div class='title'>
                Colleges
            </div>
            <div class='form'>
                <form method='post'>
                    <div class='input_field'>
                        <label>College Name</label>
                        <input type="text" name="college-name" class="input">
                    </div>
                    <div class='input_field'>
                        <input type="submit" name="manage" class="button" id='manage' value='Manage'>
                        <input type="submit" name="search" class="button" id='search' value='Search'>
                    </div>
                </form>
            </div>
        </div>

        <?php

            include('config.php');

            if(isset($_POST['manage'])){
                header('Location: college-manage.php');
            }

            if(isset($_POST['search'])){
                $collegename=$_POST['college-name'];
                if(!$collegename) echo("<script>alert('Enter College Name')</script>");
                else{
                    $sql="select * from colleges where collegename='$collegename'";
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result)>0){
                        echo "<table class='data' width = '800'>";
                        echo "<tr>";
                        echo "<th>College ID</th>";
                        echo "<th>College Name</th>";
                        echo "<th>Address</th>";
                        echo "<th>Co-ordinator Name</th>";
                        echo "<th>Contact No.</th></tr>";
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo "<td>".$row['collegeid']."</td>";
                            echo "<td>".$row['collegename']."</td>";
                            echo "<td>".$row['address']."</td>";
                            echo "<td>".$row['cordname']."</td>";
                            echo "<td>".$row['contact']."</td></tr>";
                        }
                        echo "</table>";
                    }
                    else echo("<script>alert('No College found')</script>");
                }
            }
            else{
                $sql="select * from colleges";
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                    echo "<table class='data' width = '800'>";
                    echo "<tr>";
                    echo "<th>College ID</th>";
                    echo "<th>College Name</th>";
                    echo "<th>Address</th>";
                    echo "<th>Co-ordinator Name</th>";
                    echo "<th>Contact No.</th></tr>";
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>".$row['collegeid']."</td>";
                        echo "<td>".$row['collegename']."</td>";
                        echo "<td>".$row['address']."</td>";
                        echo "<td>".$row['cordname']."</td>";
                        echo "<td>".$row['contact']."</td></tr>";
                    }
                    echo "</table>";
                }
            }

        ?>
    </body>
</html>