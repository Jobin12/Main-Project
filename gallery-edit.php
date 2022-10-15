<html>
    <head>
        <title>NSS Portal</title>
        <link rel="stylesheet" href="styles/style.css">
    </head>
    <body>

        <?php
            include('config.php');
        ?>

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

        <div class="content">
            <div class='title'>
                Edit Image
            </div>
            <div class='form'>
                <form method='post' enctype="multipart/form-data">
                    <div class='input_field'>
                        <label>Name</label>
                        <input type="text" name="name" class="input"><br><br>
                        <label>Description</label>
                        <input type="text" name="description" class="input"><br><br>
                    </div>
                    <div class='input_field'>
                        <input type="submit" name="edit" class="button" id='edit' value='Edit'>
                        <input type="submit" name="back" class="button" id='back' value='Back'>
                    </div>
                </form>
            </div>
        </div>

        <?php

            session_start();
            include('config.php');
            if(isset($_POST['back'])){
                header("Location: gallery.php");
            }
            if(isset($_POST['edit'])){
                $imgName=$_POST['name'];
                $imgDesc=$_POST['description'];
                $imgid=$_SESSION['imgid'];
                $sql="update image set name='$imgName', description='$imgDesc' where id='$imgid'";
                if(mysqli_query($conn,$sql)){
                    echo("<script>alert('Edit Successful')</script>");
                }
                else echo("<script>alert('Database Error')</script>");
            }
        ?>
    </body>
</html>