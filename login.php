<html>
  <head>
    <title>NSS Portal</title>
    <link rel="stylesheet" href="styles/login.css">
  </head>
  <body>
  <div id="container" class="container">
  <!-- FORM SECTION -->
  <form method="post">
  <div class="row">
    <!-- SIGN UP -->
    <div class="col align-items-center flex-col sign-up">
      <div class="form-wrapper align-items-center">
        <div class="form sign-up">
          <div class="input-group">
            <i class='bx bxs-user'></i>
            <input type="text" placeholder="Username" name='username'>
          </div>
          <div class="input-group">
            <i class='bx bxs-user'></i>
            <input type="text" placeholder="ID" name='id'>
          </div>
          <div class="input-group">
            <i class='bx bx-mail-send'></i>
            <input type="email" placeholder="Email" name='reg-email'>
          </div>
          <div class="input-group">
            <i class='bx bxs-user'></i>
            <input type="number" placeholder="Mobile Number" name='mobile'>
          </div>
          <div class="input-group">
            <i class='bx bxs-user'></i>
            <input type="text" placeholder="College" name='college'>
          </div>
          <div class="input-group" id="address">
            <i class='bx bxs-user'></i>
            <input type="textarea" placeholder="Address" name='address'>
          </div>
          <div class="input-group" id="gender-div">
            <i class='bx bxs-user'></i>
            <select name="gender" id="gender" name='gender'>
              <option value="" disabled selected hidden>Gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
              <option value="other">Other</option>
            </select>
          </div>
          <div class="input-group">
            <i class='bx bxs-lock-alt'></i>
            <input type="password" placeholder="Password" name='reg-pass'>
          </div>
          <!-- <div class="input-group">
            <i class='bx bxs-lock-alt'></i>
            <input type="password" placeholder="Confirm password">
          </div> -->
          <button name='register'>
            Sign up
          </button>
          <p>
            <span>
              Already have an account?
            </span>
            <b onclick="toggle();" class="pointer">Sign in here</b>
          </p>
        </div>
      </div>

    </div>
    <!-- END SIGN UP -->
    <!-- SIGN IN -->
    <div class="col align-items-center flex-col sign-in">
      <div class="form-wrapper align-items-center">
        <div class="form sign-in">
          <div class="input-group">
            <i class='bx bxs-user'></i>
            <input type="text" placeholder="Email" name='email'>
          </div>
          <div class="input-group" id="gender-div">
            <i class='bx bxs-user'></i>
            <select name="user-type" id="gender" name='user-type'>
              <option value="" disabled selected hidden>User Type</option>
              <option value="male">Admin</option>
              <option value="female">Co-ordinator</option>
              <option value="other">Student</option>
            </select>
          </div>
          <div class="input-group">
            <i class='bx bxs-lock-alt'></i>
            <input type="password" placeholder="Password" name='pass'>
          </div>
          <button name='signin'>
            Sign in
          </button>
          <p>
            <b>
              Forgot password?
            </b>
          </p>
          <p>
            <span>
              Don't have an account?
            </span>
            <b onclick="toggle()" class="pointer">
              Sign up here
            </b>
          </p>
        </div>
      </div>
      <div class="form-wrapper">

      </div>
    </div>
    <!-- END SIGN IN -->
  </div>
  </form>
  <!-- END FORM SECTION -->
  <!-- CONTENT SECTION -->
  <div class="row content-row">
    <!-- SIGN IN CONTENT -->
    <div class="col align-items-center flex-col">
      <div class="text sign-in">
        <h2>
          Welcome To NSS Portal
        </h2>

      </div>
      <div class="img sign-in">

      </div>
    </div>
    <!-- END SIGN IN CONTENT -->
    <!-- SIGN UP CONTENT -->
    <div class="col align-items-center flex-col">
      <div class="img sign-up">

      </div>
      <div class="text sign-up">
        <h2>
          Register to NSS Portal
        </h2>

      </div>
    </div>
    <!-- END SIGN UP CONTENT -->
  </div>
  <!-- END CONTENT SECTION -->
</div>

<script src="js/login.js"></script>

  <?php

    function debug_to_console($data) {
      $output = $data;
      if (is_array($output))
          $output = implode(',', $output);

      echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }

    $error_file=fopen("errorfile.txt","w") or die();


    session_start();
    function login($conn,$email,$password){
      $sql = "select * from users where email = '$email'";
          $result = mysqli_query($conn,$sql);
          if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_assoc($result)){
                 if($password == $row['password']){
                      $_SESSION['username'] = $row['username'];
                      return true;
                 } 
                 else {
                     echo "<script>alert('Password Incorrect.')</script>";
                     return false;
                 }
              }
          }
          echo "<script>alert('User Not Found.')</script>";
          return false;
  }

    include('config.php');

    $conn = mysqli_connect($serverName,$userName,$password,$db);
    if(!$conn) die("Connection Error : ".mysqli_connect_error());

    if(isset($_POST['signin'])){
      $email=$_POST['email'];
      $password=$_POST['pass'];

      if(!$email || !$password) echo "<script>alert('Insufficient Details')</script>";
      else{
        if(login($conn,$email,$password)){
          echo "<script>window.location.href='dashboard.php';</script>";
          exit();
        }
      }
    }

    if(isset($_POST['register'])){
      $email=$_POST['reg-email'];
      $username=$_POST['username'];
      $id=$_POST['id'];
      $mobile=$_POST['mobile'];
      $college=$_POST['college'];
      $address=$_POST['address'];
      $gender=$_POST['gender'];
      $password=$_POST['reg-pass'];

      if(!$email || !$password || !$username || !$id || !$mobile || !$college || !$address || !$gender) {
        echo "<script>alert('Insufficient Details')</script>";
      }
      else{
        $sql = "insert into users values('$email','$username','$id',$mobile,'$college','$address','$gender','$password')";
        if(mysqli_query($conn,$sql)){
          echo "<script>alert('Registration Successful')</script>";

        } 
        else{
          debug_to_console(mysqli_error($conn));
          echo "<script>alert('Database Error')</script>";
          
        } 

        exit();
      }
    }



  ?>
  </body>
</html>