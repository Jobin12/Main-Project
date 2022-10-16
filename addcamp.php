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
                <li><a href="colleges.php">Colleges</a></li>
                <li><a href="cordinators.php">Co-ordinators</a></li>
                <li><a href="students.php">Students</a></li>
                <li><a href="student-application">Student Applications</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="notification.php">Notifications</a></li>
                <li><a href="payment.php">Payments</a></li>
                <li class='current'><a href="camps.php">Camps</a></li>
            </ul>
        </div> 

        <div class="content">
            <div class='title'>
                Add Camp
            </div>
            <div class='form'>
                <form method='post'>
                    <div class='input_field'>
                        <label>Camp Name</label>
                        <input type="text" name="camp-name" class="input"><br><br>
                        <label>Camp Date</label>
                        <input type="date" name="campdate" class="input"><br><br>
                        <label>Duration</label>
                        <input type="number" name="duration" class="input"><br><br>
                        <label>Application Date</label>
                        <input type="date" name="applydate" class="input"><br><br>
                    </div>
                    <div class='input_field'>
                        <input type="submit" name="add" class="button" id='add' value='Add'>
                        <input type="submit" name="back" class="button" id='back' value='Back'>
                    </div>
                </form>
            </div>
        </div>

        <?php
            include('config.php');

            if(isset($_POST['add'])){

                $campname=$_POST['camp-name'];
                $campdate=$_POST['campdate'];
                $duration=$_POST['duration'];
                $applydate=$_POST['applydate'];
                

                if(!$campname || !$campdate || !$duration|| !$applydate) echo "<script>alert('Insufficient Details')</script>";
                else{
                    $sql="insert into camp(campname,campdate,duration,applydate,status) values('$campname','$campdate',$duration,'$applydate','Upcoming');";
                    if(mysqli_query($conn,$sql)){
                        echo "<script>alert('Camp Added')</script>";
                    } 
                    else{
                        echo "<script>alert('Database Error')</script>"; 
                    } 
                }
            }

            if(isset($_POST['back'])){
                header("Location: camps.php");
            }
        ?>
    </body>
</html>