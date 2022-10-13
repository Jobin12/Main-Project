<html>
    <head>
        <title>NSS Portal</title>
        <link rel="stylesheet" href="styles/style.css">
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
                <li><a href="student-application">Student Applications</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#">Payments</a></li>
                <li><a href="#">Camps</a></li>
                <li><a href="#">Certificates</a></li>
            </ul>
        </div> 

        <div class="content">
            <div class='title'>
                Manage Colleges
            </div>
            <div class='form'>
                <form method='post'>
                    <div class='input_field'>
                        <label>College Name</label>
                        <input type="text" name="college-name" class="input"><br><br>
                        <label>College ID</label>
                        <input type="text" name="college-id" class="input"><br><br>
                        <label>Location</label>
                        <input type="text" name="location" class="input"><br><br>
                        <label>Co-ordinator Name</label>
                        <input type="text" name="coordinator-name" class="input"><br><br>
                        <label>Contact No</label>
                        <input type="number" name="contact" class="input"><br><br>
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

            include('config.php');
            include('debug.php');

            if(isset($_POST['back'])){
                header('Location: colleges.php');
            }
            if(isset($_POST['add'])){

                $collegename=$_POST['college-name'];
                $collegeid=$_POST['college-id'];
                $location=$_POST['location'];
                $coordinatorname=$_POST['coordinator-name'];
                $contact=$_POST['contact'];

                

                if(!$collegename || !$collegeid|| !$location|| !$coordinatorname|| !$contact) echo "<script>alert('Insufficient Details')</script>";
                else{
                    $sql="insert into colleges values('$collegename','$collegeid','$location','$coordinatorname',$contact);";
                    if(mysqli_query($conn,$sql)){
                        echo "<script>alert('College Added')</script>";
                    } 
                    else{
                        echo "<script>alert('Database Error')</script>"; 
                    } 
                }
            }
            if(isset($_POST['edit'])){

                $collegename=$_POST['college-name'];
                $collegeid=$_POST['college-id'];
                $location=$_POST['location'];
                $coordinatorname=$_POST['coordinator-name'];
                $contact=$_POST['contact'];

                if(!$collegename || !$collegeid|| !$location|| !$coordinatorname|| !$contact) echo "<script>alert('Insufficient Details')</script>";
                else{
                    $sql="update colleges set collegename='$collegename',address='$location',cordname='$coordinatorname',contact=$contact where collegeid='$collegeid'";
                    if(mysqli_query($conn,$sql)){
                        echo "<script>alert('Edit Successful')</script>";
                    } 
                    else{
                        echo "<script>alert('Database Error')</script>"; 
                    }
                } 
            }
            if(isset($_POST['delete'])){

                $collegeid=$_POST['college-id'];
                if(!$collegeid) echo "<script>alert('Insufficient Details')</script>";
                else{
                    $sql="delete from colleges where collegeid='$collegeid'";
                    if(mysqli_query($conn,$sql)){
                        echo "<script>alert('College Deleted')</script>";
                    } 
                    else{
                        echo "<script>alert('Database Error')</script>"; 
                    }
                } 
            }
        ?>
    </body>
</html>