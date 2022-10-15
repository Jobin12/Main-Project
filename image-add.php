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
                Upload Image
            </div>
            <div class='form'>
                <form method='post' enctype="multipart/form-data">
                    <div class='input_field'>
                        <label>Name</label>
                        <input type="text" name="name" class="input"><br><br>
                        <label>Description</label>
                        <input type="text" name="description" class="input"><br><br>
                        <input type="file" name="photo"><br><br>
                    </div>
                    <div class='input_field'>
                        <input type="submit" name="upload" class="button" id='upload' value='Upload'>
                        <input type="submit" name="back" class="button" id='back' value='Back'>
                    </div>
                </form>
            </div>
        </div>

        <?php

            include('config.php');
            if(isset($_POST['back'])){
                header("Location: gallery.php");
            }
        if(isset($_POST['upload'])){
            $file=$_FILES['photo'];

            $filename = $_FILES["photo"]["name"];
            $filetmpname = $_FILES["photo"]["tmp_name"];
            $filesize = $_FILES["photo"]["size"];
            $fileerror = $_FILES["photo"]["error"];

            $fileExt = explode('.',$filename);
            $fileActualExt = strtolower(end($fileExt));

            $allowed = array('jpg','jpeg','png');

            if(in_array($fileActualExt,$allowed)){
                if($fileerror===0){
                    if($filesize < 5000000){
                        $fileNameNew=uniqid('',true).".".$fileActualExt;
                        $fileDest="gallery/".$fileNameNew;
                        move_uploaded_file($filetmpname,$fileDest);
                        $name=$_POST['name'];
                        $description=$_POST['description'];

                        $sql="insert into image values('$fileNameNew','$name','$description');";
                        if(mysqli_query($conn,$sql)){
                            echo "<script>alert('Image Uploaded');</script>";
                        }
                        else echo("<script>alert('Database Error');</script>");
                    }
                    else{
                        echo("<script>alert('File size is too big.');</script>");
                    }
                }
                else{
                    echo("<script>alert('Error on File Upload');</script>");
                }
            }
            else{
                echo("<script>alert('File should be of type JPG, JPEG OR PNG.');</script>");
            }
        }
        ?>
    </body>
</html>