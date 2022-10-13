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
                <li><a href="#">Student Applications</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#">Payments</a></li>
                <li><a href="#">Camps</a></li>
                <li><a href="#">Certificates</a></li>
            </ul>
        </div> 

        <div class="content">
            <div class='title'>
                Co-ordinators
            </div>
            <div class='form'>
                <form method='post'>
                    <div class='input_field'>
                        <label>Co-ordinator Name</label>
                        <input type="text" name="name" class="input">
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
                header('Location: cord-manage.php');
            }

            if(isset($_POST['search'])){
                $name=$_POST['name'];
                if(!$name) echo("<script>alert('Enter College Name')</script>");
                else{
                    $sql="select * from cordinator where username='$name'";
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
                    else echo("<script>alert('No College found')</script>");
                }
            }
            else{
                $sql="select * from cordinator";
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
            }
        ?>
    </body>
</html>