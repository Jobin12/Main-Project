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
                width:160px;
                height:40px;
                margin:5px;
                color:white;
                border-radius:5px;
                border:0;
                background-color:orangered;
                text-shadow: 0.5px 0.5px black;
                margin-top: -1;
            }

            #content .buttons button:hover{
                cursor: pointer;
                box-shadow: 0 0 9px gray;
                background-color: brown;
            }

            /* #photoupload{
                font-size:16px;
                background: white;
                border-radius: 5px;
                box-shadow: 2px 2px 10px gray;
                width:250px;
                outline: none;
            }

            ::-webkit-file-upload-button{
                color:white;
                background-color: orangered;
                text-shadow: 0.5px 0.5px black;
                #206a5d;
                padding:10px;
                border: none;
                border-radius: 5px;
                box-shadow: 1px 0 1px 1px #6b4559;
                outline:none;
            }

            ::-webkit-file-upload-button:hover{
                cursor: pointer;
                background-color:brown;
            } */

            .images-gallery{
                margin-left: 24%;
                padding-bottom:5%;
                width: 72%;
                display: flex;
                flex-wrap: wrap;
            }
            .gallery{
                padding-top:20px;
                width: fit-content;
                padding-right: 30px;
                padding-left: 30px;
                /* border:1px solid black; */
                text-align: center;
                /* box-shadow: 0 0 20px gray; */
            }

            .gallery .imgname{
                font-size:1.4em;
                padding:5px;
            }

            .gallery .imgdesc{
                font-size:0.9em;
                padding:5px;
            }

            .gallery .imgbuttons .edit,
            .gallery .imgbuttons .delete{
                width:80px;
                height:30px;
                margin:5px;
                color:white;
                border-radius:5px;
                border:0;
            }

            .gallery .imgbuttons .edit{
                background-color:forestgreen;
            }

            .gallery .imgbuttons .delete{
                background-color: #d94343;
            }

            .gallery .imgbuttons .edit:hover{
                background-color:darkgreen;
                cursor: pointer;
            }

            .gallery .imgbuttons .delete:hover{
                background-color: brown;
                cursor: pointer;
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
                <li class='current'><a href="gallery.php">Gallery</a></li>
                <li><a href="notification.php">Notifications</a></li>
                <li><a href="payment.php">Payments</a></li>
                <li><a href="camps.php">Camps</a></li>
            </ul>
        </div> 

        <div id='content'>
            <div class='title'>
                <h2>Photo Gallery</h2>
                <div class="buttons">
                    <form method='post' enctype="multipart/form-data">
                        <button name='add' id="uploadbutton">Upload Image</button>
                    </form>
                </div>
            </div>
        </div>

        <?php
            error_reporting(0);
            session_start();
            include('config.php');
            if(isset($_POST['add'])){
                header("Location: image-add.php");
            }    
            $sql="select * from image;";
            $result=mysqli_query($conn,$sql);   
            if(mysqli_num_rows($result)>0){
                echo("<div class='images-gallery'>");
                while($row = mysqli_fetch_assoc($result)){
                    $imgid=$row['id'];
                    echo("<div class='gallery'>");
                    echo("<a target='_blank' href='gallery/".$row['id']."'>");
                    echo("<img src='gallery/".$row['id']."' width=300 height=180></a>");
                    echo("<div class='imgname'><h4>".$row['name']."</h4></div>");
                    echo("<div class='imgdesc'>".$row['description']."</div>");
                    echo "<div class='imgbuttons'><form method='post'><input type='hidden' name='imgid' value='$imgid'><input type='submit' class='edit' name='edit' value='Edit'><input type='submit' class='delete' name='delete' value='Delete'></form></div>";
                    echo("</div>");
                }
                echo("</div>");
            }
            if(isset($_POST['edit'])){
                $_SESSION['imgid']=$_POST['imgid'];
                echo("<script>window.location.href='gallery-edit.php';</script>");
            }

            if(isset($_POST['delete'])){
                $imageid=$_POST['imgid'];
                $sql = "delete from image where id='$imageid'";
                if(mysqli_query($conn,$sql)){
                    echo("<script>alert('Image Deleted');</script>");
                }
                else echo("<script>alert('Database Error');</script>");
                echo("<script>window.location.href='gallery.php';</script>");
            } 
        ?>
    </body>
</html>