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
                <li><a href="#">Student Applications</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#">Payments</a></li>
                <li><a href="#">Camps</a></li>
                <li><a href="#">Certificates</a></li>
            </ul>
        </div> 

        <div class="content">
            <div class='title'>
                Manage Co-ordinators
            </div>
            <div class='form'>
                <form method='post'>
                    <div class='input_field'>
                        <label>Name</label>
                        <input type="text" name="name" class="input"><br><br>
                        <label>ID</label>
                        <input type="text" name="id" class="input"><br><br>
                        <label>Email</label>
                        <input type="email" name="email" class="input"><br><br>
                        <label>College</label>
                        <select name="college" class="input" id="college">
                            <option value="" disabled selected hidden></option>
                            <?php
                                $sql="select collegename from colleges;";
                                $result=mysqli_query($conn,$sql);
                                while($row = mysqli_fetch_assoc($result)){
                                    $clgname=$row['collegename'];
                                    echo "<option value='$clgname'>".$row['collegename']."</option>";
                                }
                            ?>
                        </select><br><br>
                        <label>Contact No.</label>
                        <input type="number" name="contact" class="input"><br><br>
                        <label>Address</label>
                        <input type="text" name="address" class="input"><br><br>
                        <label>Gender</label>
                        <select name="gender" class="input" id="gender">
                            <option value="" disabled selected hidden></option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select><br><br>
                        <label>Password</label>
                        <input type="password" name="pass" class="input"><br><br>
                    </div>
                    <div class='input_field'>
                        <input type="submit" name="add" class="button" id='add' value='Add'>
                        <input type="submit" name="edit" class="button" id='edit' value='Edit'>
                        <input type="submit" name="delete" class="button" id='delete' value='Delete'>
                        <input type="submit" name="back" class="button" id='back' value='Back'>
                    </div>
                </form>
            </div>
        </div>

        <?php

            error_reporting(0);
            ini_set('display_errors', 0);

            if(isset($_POST['back'])){
                header('Location: cordinators.php');
            }
            if(isset($_POST['add'])){

                $name=$_POST['name'];
                $id=$_POST['id'];
                $email=$_POST['email'];
                $college=$_POST['college'];
                $contact=$_POST['contact'];
                $address=$_POST['address'];
                $gender=$_POST['gender'];
                $password=$_POST['pass'];

                if(!$name || !$id || !$email || !$college || !$contact || !$address || !$gender || !$password) echo "<script>alert('Insufficient Details')</script>";
                else{
                    $sql="insert into cordinator values('$email','$name','$id',$contact,'$college','$address','$gender','$password');";
                    if(mysqli_query($conn,$sql)){
                        echo "<script>alert('Co-ordinator Added')</script>";
                    } 
                    else{
                        echo "<script>alert('Database Error')</script>"; 
                    } 
                }
            }
            if(isset($_POST['edit'])){

                $name=$_POST['name'];
                $id=$_POST['id'];
                $email=$_POST['email'];
                $college=$_POST['college'];
                $contact=$_POST['contact'];
                $address=$_POST['address'];
                $gender=$_POST['gender'];
                $password=$_POST['pass'];

                if(!$name || !$id || !$email || !$college || !$contact || !$address || !$gender || !$password) echo "<script>alert('Insufficient Details')</script>";
                else{
                    $sql="update cordinator set username='$name',id='$id',college='$college',mobile=$contact,gender='$gender',password='$password',address='$address' where email='$email'";
                    if(mysqli_query($conn,$sql)){
                        echo "<script>alert('Edit Successful')</script>";
                    } 
                    else{
                        echo "<script>alert('Database Error')</script>"; 
                    }
                } 
            }
            if(isset($_POST['delete'])){

                $id=$_POST['id'];
                if(!$id) echo "<script>alert('Insufficient Details')</script>";
                else{
                    $sql="delete from cordinator where id='$id'";
                    if(mysqli_query($conn,$sql)){
                        echo "<script>alert('Co-ordinator Deleted')</script>";
                    } 
                    else{
                        echo "<script>alert('Database Error')</script>"; 
                    }
                } 
            }
        ?>
    </body>
</html>