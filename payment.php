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
                background-color:brown;
                text-shadow: 0.5px 0.5px black;
            }

            #content .buttons button:hover{
                cursor: pointer;
                box-shadow: 0 0 9px gray;
            }

            .edit,
            .delete{
                width:80px;
                height:30px;
                margin:5px;
                color:white;
                border-radius:5px;
                border:0;
            }

            .edit:hover,
            .delete:hover{
                cursor: pointer;
                box-shadow: 0 0 9px gray;
            }

            .edit{
                background-color:forestgreen;
            }

            .delete{
                background-color: #d94343;
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
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="notification.php">Notifications</a></li>
                <li class='current'><a href="payment.php">Payments</a></li>
                <li><a href="#">Camps</a></li>
            </ul>
        </div> 

        <div id='content'>
            <div class='title'>
                <h2>Payments</h2>
                <div class="buttons">
                    <form method='post'>
                        <button name='add'>Add New Payment</button>
                    </form>
                </div>
            </div>
        </div>

        <?php
            include('config.php');

            session_start();
            
            if(isset($_POST['add'])){
                header('Location: addpay.php');
            }

            $sql="select * from payment;";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
                echo "<table class='data' width = '800'>";
                echo "<tr>";
                echo "<th>Payment ID</th>";
                echo "<th>Payment Name</th>";
                echo "<th>Description</th>";
                echo "<th>Last Date</th>";
                echo "<th>Amount</th>";
                echo "<th>Status</th></tr>";
                while($row = mysqli_fetch_assoc($result)){
                    $payid=$row['paymentid'];
                    echo "<tr>";
                    echo "<td>".$row['paymentid']."</td>";
                    echo "<td>".$row['paymentname']."</td>";
                    echo "<td>".$row['description']."</td>";
                    echo "<td>".$row['lastdate']."</td>";
                    echo "<td>".$row['amount']."</td>";
                    echo "<td><form method='post'><input type='hidden' name='payid' value='$payid'><input type='submit' name='edit' class='edit' value='Edit'><br><input type='submit' class='delete' name='delete' value='Delete'></form></td></tr>";

                }
                echo "</table>";
            }

            if(isset($_POST['edit'])){
                $_SESSION['payid']=$_POST['payid'];
                header("Location: editpay.php");
            }

            if(isset($_POST['delete'])){
                $paymid=$_POST['payid'];
                $sql="delete from payment where paymentid='$paymid'";
                if(mysqli_query($conn,$sql)){
                    echo("<script>alert('Payment Deleted');window.location.href='payment.php';</script>");
                }
                else{
                    echo("<script>alert('Database Error');</script>");
                }
            }
        ?>
    </body>
</html>