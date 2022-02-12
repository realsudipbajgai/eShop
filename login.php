<?php session_start();?>
<?php include 'header.php'?>
<?php include_once 'DatabaseController/DBController.php'?>
<?php

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}

if($_SERVER["REQUEST_METHOD"]=="POST"){


    $email=$_POST["email"];
    $password=$_POST["password"];
    $obj=new Query();
    $user=$obj->getUserbyEmail($email);
    if($user['email']=='admin@eshop.com'&&$user['password']==$password){
        $_SESSION["loggedin"] = true;
        $_SESSION["id"] = $user['id'];
        $_SESSION["email"] = $email;
        header('location:admin.php');
    }
    else if($user['password']==$password){
        $_SESSION["loggedin"] = true;
        $_SESSION["id"] = $user['id'];
        $_SESSION["username"] = $username;

        header('location:index.php');
    }
    else{
        $err_msg="Username or Password do not match";
        header('location:error.php?err_msg='.$err_msg);
    }
}
?>
  <div class="container min-vh-100">
      <div class="wrapper">
          <h2>Login</h2>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
              <div class="form-group">
                  <label>Email</label>
                  <input type="text" name="email" class="form-control">

              </div>
              <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control ">
                  <span class="invalid-feedback"><?php echo $password_err; ?></span>
              </div>

              <div class="form-group">
                  <input type="submit" class="btn btn-primary" value="Submit">
                  <input type="reset" class="btn btn-secondary ml-2" value="Reset">
              </div>
              <p>Dont have an account? <a href="register.php">Register here</a>.</p>
          </form>
      </div>
  </div>

<?php include_once 'footer.php'?>