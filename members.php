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
                Members
            </div>
            <div class='form'>
                <form method='post'>
                    <div class='input_field'>
                        <label>Member ID</label>
                        <input type="text" name="college-name" class="input">
                    </div>
                    <div class='input_field'>
                        <input type="submit" name="add" class="button" id='add' value='Add'>
                        <input type="submit" name="search" class="button" id='search' value='Search'>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>