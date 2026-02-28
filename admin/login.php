<?php  
include "database/database.php";
include "database/settings.php";
include "database/users.php";
$database = new database();
$db = $database->connect();

$users = new users($db);

$settings = new settings($db);
$settings->id = 1;
$settings->read();

if($_SERVER['REQUEST_METHOD']=='POST'){
  $username = $_POST['username'];
  $password = sha1($_POST['password']);

  $users->username = $username;
  $users->password = $password;
  
  /*Signup admin*/
  if($users->roleAdmin()->rowCount()==0){
    $users->name = $_POST['name'];
    $users->email = $_POST['email'];
    $users->phone = $_POST['phone'];
    $users->role = 2;
    $users->image = "guest.jpg";
    $users->email_verified = "verified";
    $users->status = 1;

    date_default_timezone_set($settings->site_timezone);
    $users->created_at = date("Y-m-d h:i:s",time());
    $users->updated_at = date("Y-m-d h:i:s",time());
    
    $users->create();
  }

  /*Signin user*/
  if($users->userLogin()->rowCount()>0){
    $row = $users->userLogin()->fetch();
    
    session_start();
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user_role'] = $row['role'];

    header("location:index.php");
  }else{
    $error = "Login false!";
  }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <title><?php echo $settings->site_name ?></title>
  <link rel="icon" href="<?php echo "../images/".$settings->site_favicon ?>">
  

  <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.css" rel="stylesheet">



  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>

  
  <!-- Custom styles for this template -->
  <link href="assets/css/signin.css" rel="stylesheet">
</head>
<body class="text-center">

<?php
if($users->roleAdmin()->rowCount()>0){
?>
  <!-- Sign in user --> 
  
  <form class="form-signin" action="" method="POST">
    <?php  
    if(isset($error)){
    ?>    
      <div class="alert alert-danger"><?php echo $error ?></div>    
    <?php  
    }
    ?>
    
    <?php  
    if($settings->site_logo){
    ?>
    <img class="mb-4" src="<?php echo "../images/".$settings->site_logo; ?>" alt="" width="72" height="72">
    <?php  
    }else{
    ?>
    <img class="mb-4" src="assets/img/bootstrap-solid.svg" alt="" width="72" height="72">
    <?php  
    }
    ?>
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="inputEmail" class="sr-only">Username</label>
    <input type="text"  class="form-control" placeholder="Username" name="username" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" class="form-control" placeholder="Password" name="password" required>
    <div class="form-group">
      <label class="checkbox-inline">
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <div style="padding-top: 15px;">
      <p class="mt-5 mb-3 text-muted"><?php echo $settings->site_footer ?></p>
    </div>
  </form>
  <?php  
  }else{
  /*Sign up Admin*/
  ?>
  <form class="form-signin" method="POST" action="">
    
    <?php  
    if($settings->site_logo){
    ?>
    <img class="mb-4" src="<?php echo "../images/".$settings->site_logo; ?>" alt="" width="72" height="72">
    <?php  
    }else{
    ?>
    <img class="mb-4" src="assets/img/bootstrap-solid.svg" alt="" width="72" height="72">
    <?php  
    }
    ?>
    <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
    <label for="inputEmail" class="sr-only">Name</label>
    <input type="text"  class="form-control" placeholder="Name" name="name" required autofocus>
    <label for="inputEmail" class="sr-only">Email</label>
    <input type="text"  class="form-control" placeholder="Email" name="email" required autofocus>
    <label for="inputEmail" class="sr-only">Phone</label>
    <input type="text"  class="form-control" placeholder="Phone" name="phone" required autofocus>
    <label for="inputEmail" class="sr-only">Username</label>
    <input type="text"  class="form-control" placeholder="Username" name="username" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" class="form-control" placeholder="Password" name="password" required>
    <div class="form-group">
      <label class="checkbox-inline">
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
    <div style="padding-top: 15px;">
      <p class="mt-5 mb-3 text-muted"><?php echo $settings->site_footer ?></p>
    </div>
  </form>

<?php  
}
?>

</body>
</html>
