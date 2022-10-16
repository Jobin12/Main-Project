<html>
    <head>
        <title>NSS Portal</title>
        <link rel="stylesheet" href="styles/style.css">
        <link rel="stylesheet" href="styles/dash.css">
        <link rel="shortcut icon" type="image/x-icon" href="images/nss-symbol.png">
    </head>
    <body>
        <?php  
            include('config.php');
        ?>
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
            <!-- <img src="images/nss-symbol.png" width="40" height="40"> -->
            <h1>NSS Portal</h1>
            <ul>
                <li class='current'><a href="dashboard.php">Dashboard</a></li>
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
        <div class='dash-container1'>
        <div class='dash' id='college-dash'>
            <h3>Colleges</h3>
            <h5>
            <?php
                $sql="select count(collegeid) as college_count from colleges;";
                $result=mysqli_query($conn,$sql);
                $row=mysqli_fetch_assoc($result);
                echo($row['college_count']);
            ?>
            </h5>
        </div>
        <div class='dash' id='cordinator-dash'>
            <h3>Co-ordinators</h3>
            <h5>
            <?php
                $sql="select count(email) as cord_count from cordinator;";
                $result=mysqli_query($conn,$sql);
                $row=mysqli_fetch_assoc($result);
                echo($row['cord_count']);
            ?>
            </h5>
        </div>
        <div class='dash' id='student-dash'>
            <h3>Students</h3>
            <h5>
            <?php
                $sql="select count(email) as student_count from student where access=1;";
                $result=mysqli_query($conn,$sql);
                $row=mysqli_fetch_assoc($result);
                echo($row['student_count']);
            ?>
            </h5>
        </div>
        </div>
        <div class='dash-container2'>
            <div class='dash' id='std-app-dash'>
                <h3>Student Applications</h3>
                <h5>
                <?php
                    $sql="select count(email) as student_count from student where access=0;";
                    $result=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_assoc($result);
                    echo($row['student_count']);
                ?>
                </h5>
            </div>
            <div class='dash' id='gallery-dash'>
                <h3>Gallery</h3>
                <h5>
                <?php
                    $sql="select count(id) as img_count from image;";
                    $result=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_assoc($result);
                    echo($row['img_count']);
                ?>
                </h5>
                </div>
            <div class='dash' id='notification-dash'>
                <h3>Notifications</h3>
                <h5>
                <?php
                    $sql="select count(email) as cord_count from cordinator;";
                    $result=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_assoc($result);
                    echo($row['cord_count']);
                ?>
                </h5>
            </div>
        </div>

        <div class='dash-container3'>
            <div class='dash' id='payment-dash'>
                <h3>Payments</h3>
                <h5>
                <?php
                    $sql="select count(paymentid) as pay_count from payment;";
                    $result=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_assoc($result);
                    echo($row['pay_count']);
                ?>
                </h5>
            </div>
            <div class='dash' id='camp-dash'>
                <h3>Camps</h3>
                <h5>
                <?php
                    $sql="select count(campid) as camp_count from camp;";
                    $result=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_assoc($result);
                    echo($row['camp_count']);
                ?>
                </h5>
            </div>
        </div>
    </body>
</html>