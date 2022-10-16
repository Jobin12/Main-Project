<html>
  <head>
    <title>NSS Portal</title>
    <link rel="stylesheet" href="styles/login.css">
    <link rel="shortcut icon" type="image/x-icon" href="images/nss-symbol.png">
  </head>
  <body>
  <?php
    include('config.php');
  ?>
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
          <!-- <div class="input-group">
            <i class='bx bxs-user'></i>
            <input type="text" placeholder="College" name='college'>
          </div> -->
          <div class="input-group" id="college-div">
            <i class='bx bxs-user'></i>
            <select name="college" id="college">
              <option value="" disabled selected hidden>College</option>
              <?php
                $sql="select collegename from colleges;";
                $result=mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($result)){
                  $clgname=$row['collegename'];
                  echo "<option value='$clgname'>".$row['collegename']."</option>";
                }
              ?>
            </select>
          </div>
          <div class="input-group" id="address">
            <i class='bx bxs-user'></i>
            <input type="textarea" placeholder="Address" name='address'>
          </div>
          <div class="input-group" id="gender-div">
            <i class='bx bxs-user'></i>
            <select name="gender" id="gender">
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
              <option value="admin">Admin</option>
              <option value="cordinator">Co-ordinator</option>
              <option value="student">Student</option>
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

    session_start();
    function login($conn,$email,$password,$usertype){
      $sql = "select * from $usertype where email = '$email'";
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


    if(isset($_POST['signin'])){
      $email=$_POST['email'];
      $password=$_POST['pass'];
      $usertype=$_POST['user-type'];

      if(!$email || !$password || !$usertype) echo "<script>alert('Insufficient Details')</script>";
      else{
        if(login($conn,$email,$password,$usertype)){
          if($usertype=="admin") echo "<script>window.location.href='dashboard.php';</script>";
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
        $sql = "insert into student values('$email','$username','$id',$mobile,'$college','$address','$gender','$password',0)";
        if(mysqli_query($conn,$sql)){
          echo "<script>alert('Request Submitted. Waiting for Approval')</script>";
        } 
        else{
          echo "<script>alert('Database Error')</script>";  
        }
        exit();
      }
    }

  ?>
  </body>
</html>