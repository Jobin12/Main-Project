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
                <li class='current'><a href="payment.php">Payments</a></li>
                <li><a href="camps.php">Camps</a></li>
            </ul>
        </div> 

        <div class="content">
            <div class='title'>
                Edit Payment
            </div>
            <div class='form'>
                <form method='post'>
                    <div class='input_field'>
                        <label>Payment Name</label>
                        <input type="text" name="payment-name" class="input"><br><br>
                        <label>Payment Description</label>
                        <input type="text" name="payment-desc" class="input"><br><br>
                        <label>Last Date</label>
                        <input type="date" name="lastdate" class="input"><br><br>
                        <label>Amount</label>
                        <input type="number" name="amount" class="input"><br><br>
                    </div>
                    <div class='input_field'>
                        <input type="submit" name="save" class="button" id='save' value='Save'>
                        <input type="submit" name="back" class="button" id='back' value='Back'>
                    </div>
                </form>
            </div>
        </div>

        <?php
            include('config.php');

            session_start();

            if(isset($_POST['save'])){

                $paymentname=$_POST['payment-name'];
                $paymentdesc=$_POST['payment-desc'];
                $lastdate=$_POST['lastdate'];
                $amount=$_POST['amount'];
                $paymentid=$_SESSION['payid'];
                

                if(!$paymentname || !$paymentdesc || !$lastdate|| !$amount) echo "<script>alert('Insufficient Details')</script>";
                else{
                    $sql="update payment set paymentname='$paymentname',description='$paymentdesc',lastdate='$lastdate',amount=$amount where paymentid=$paymentid";
                    if(mysqli_query($conn,$sql)){
                        echo "<script>alert('Payment Edited')</script>";
                    } 
                    else{
                        echo "<script>alert('Database Error')</script>"; 
                    } 
                }
            }

            if(isset($_POST['back'])){
                header("Location: payment.php");
            }
        ?>
    </body>
</html>