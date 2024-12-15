<?php session_start();  
  require_once("configs/db_config.php");
  $base_url="http://cruisemanagement.test/admin";
  //require_once("library/classes/system_log.class.php");
  
  if(isset($_POST["btnSignIn"])){
    
     $username=trim($_POST["txtUsername"]);
     $password=trim($_POST["txtPassword"]);
     //echo $username," ",$password;
     //$result=$db->query("select u.id,u.username,r.name from {$tx}users u,{$tx}roles r where r.id=u.role_id and u.username='$username' and u.password='$password'");
     $result=$db->query("select u.id,u.full_name,u.password,u.email,u.photo,u.mobile,u.role_id,r.name role from {$tx}users u,{$tx}roles r where r.id=u.role_id and u.name='$username' and u.inactive=0");
      
         
      $user=$result->fetch_object();

      if($user && password_verify($password,$user->password)){
        
        $_SESSION["uid"]=$user->id;
        $_SESSION["uname"]=$user->full_name;
        $_SESSION["uphoto"]=$user->photo;
        $_SESSION["email"]=$user->email;
        $_SESSION["mobile"]=$user->mobile; 
        $_SESSION["role_id"]=$user->role_id;
        $_SESSION["urole"]=$user->role;

        header("location:home");
      }else{
        echo "Incorrect username or password";
      }
        
        
        
         //  $now=date("Y-m-d H:i:s");
        //  $log=new System_log("","LOGIN","Successfully logged in user : $uid-$_username",$now);
        //  $log->save();

               
  
    }

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description"
    content="Multipurpose, super flexible, powerful, clean modern responsive bootstrap 5 admin template">
  <meta name="keywords"
    content="admin template, ra-admin admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="la-themes">
  <link rel="icon" href="<?php echo $base_url; ?>/assets/images/logo/favicon.png" type="image/x-icon">
  <link rel="shortcut icon" href="<?php echo $base_url; ?>/assets/images/logo/favicon.png" type="image/x-icon">

  <title>Sign In Bg | ra-admin - Premium Admin Template</title>

  <!--font-awesome-css-->
  <link rel="stylesheet" href="<?php echo $base_url; ?>/assets/vendor/fontawesome/css/all.css">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Golos+Text:wght@400..900&display=swap" rel="stylesheet">

  <!-- tabler icons-->
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>/assets/vendor/tabler-icons/tabler-icons.css">

  <!-- Bootstrap css-->
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>/assets/vendor/bootstrap/bootstrap.min.css">

  <!-- App css-->
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>/assets/css/style.css">

  <!-- Responsive css-->
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>/assets/css/responsive.css">

</head>

<body>
  <div class="app-wrapper d-block">
    <div class="">
      <!-- Body main section starts -->
      <main class="w-100 p-0">
        <!-- Login to your Account start -->
        <div class="container-fluid">
            <div class="row">

                <div class="col-12 p-0">
                    <div class="login-form-container">
                      <div class="mb-4">
                        <a class="logo d-inline-block" href="index.html">
                          <img src="<?php echo $base_url; ?>/assets/images/logo/1.png" width="250" alt="#">
                        </a>
                      </div>
                      <div class="form_container">
                        
                        <form class="app-form" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                          <div class="mb-3 text-center">
                            <h3>Login to your Account</h3>
                            <p class="f-s-12 text-secondary">Get started with our app, just create an account and enjoy the experience.</p>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">User Name</label>
                            <input type="text" class="form-control" name="txtUsername" id="txtUsername" >
                            <div class="form-text text">We'll never share your email with anyone else.</div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="txtPassword" id="txtPassword" >
                          </div>
                          <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="formCheck1">
                            <label class="form-check-label" for="formCheck1">remember me</label>
                          </div>
                          <div>
                          <button type="submit" name="btnSignIn" class="btn btn-primary btn-block">Sign In</button>
                          </div>
                          <div class="app-divider-v justify-content-center">
                            <p>OR</p>
                          </div>
                          <div class="mb-3">
                            <div class="text-center">
                              <button type="button" class="btn btn-primary icon-btn b-r-5 m-1"><i class="ti ti-brand-facebook text-white"></i></button>
                              <button type="button" class="btn btn-danger icon-btn b-r-5 m-1"><i class="ti ti-brand-google text-white"></i></button>
                              <button type="button" class="btn btn-dark icon-btn b-r-5 m-1"><i class="ti ti-brand-github text-white"></i></button>
                            </div>
                          </div>
                          <div class="text-center">
                            <a href="./terms_condition.html" class="text-secondary text-decoration-underline">Terms of use &amp; Conditions</a>
                          </div>
                        </form>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Login to your Account end -->
      </main>
      <!-- Body main section ends -->
    </div>
  </div>
  <!-- latest jquery-->
  <script src="<?php echo $base_url; ?>/assets/js/jquery-3.6.3.min.js"></script>

  <!-- Bootstrap js-->
  <script src="<?php echo $base_url; ?>/assets/vendor/bootstrap/bootstrap.bundle.min.js"></script>

</body>

</html>