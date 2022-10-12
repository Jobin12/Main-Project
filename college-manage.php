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
                    <li><a href="index.php">Log Out</a></li>
                </ul>
            </nav>
        </div>

        <div class='sidebar'>
            <h1>NSS Portal</h1>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="colleges.php">Colleges</a></li>
                <li><a href="members.php">Members</a></li>
                <li><a href="#">Enrollment</a></li>
                <li><a href="#">Enroll Applications</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#">Fund Management</a></li>
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
                        <label>Unit ID</label>
                        <input type="text" name="unit-id" class="input"><br><br>
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
            if(isset($_POST['back'])){
                header('Location: colleges.php');
            }
        ?>
    </body>
</html>