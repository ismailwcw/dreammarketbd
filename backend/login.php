<?php
session_start();


// If the user is already logged in, redirect to dashboard
if(isset($_SESSION['userlogin'])){
  $user = $_SESSION['userlogin']; // retrieve user from session
  if ($user['roles'] !== 'admin') {
                         http_response_code(403);
                          require_once __DIR__ . '/includes/403.php';
                          exit;
                      }
    else{header("Location: /admin"); // redirect to dashboard
    exit;}
} 
  ?>
<?php require_once __DIR__ . '/includes/db.php';?>
<?php $login_info= "Test account: " . "</br>" . "Email: admin@test.com" . "</br>" . "Password: 123" ?>


<?php

    $email = $pass = $inactive = $invalid = "";
    $errors = [];
    if($_SERVER["REQUEST_METHOD"]== "POST"){
       
        if(empty($email = trim($_POST["email"]))) {
            $errors["email"] = "email is required.";

        }elseif(! filter_var($email, FILTER_VALIDATE_EMAIL)){
           $errors["email"] = "Invalid email format.";
        }
        else{
            $email = htmlspecialchars($email);
        }
        if(empty($pass = trim($_POST["pass"]))) {
            $errors["pass"] = "Password is required.";

        }else{
            $pass = htmlspecialchars($pass);
        }
      echo "<pre>";
        var_dump($email, $pass);
        echo "</pre>";
        if (empty($errors)) {
            // DB query here

            $emails =$_POST['email'];
            $passwords =$_POST['pass'];

          $sql="SELECT * FROM users WHERE email = ? AND pass = ? LIMIT 1";
          $stmtselect =$conn->prepare($sql);
          $result = $stmtselect->execute([$emails, $passwords]);
            if($result){
              $user = $stmtselect->fetch(PDO::FETCH_ASSOC);
              if($stmtselect->rowCount() > 0){
                      if ($user['roles'] !== 'admin') {
                         var_dump($user['roles']);
                          http_response_code(403);
                          exit('Access denied: Admin only');
                      }
                if( $user['status'] != 0){

                  $_SESSION['userlogin'] = $user;
                    if(isset($_SESSION['userlogin'])){
                      header("location: /admin");}
                      exit;
                }else{
                $inactive = "User " . $user['email'] . " is inactive please contact with admin";

                }
              }else{
                $invalid = "Invalid User!";
              }
            
            }
            else{
              echo 'there was a problm while saving data';
            }
          }
        
    }

?>


<!DOCTYPE html>
<html lang="en">
  <!-- head -->
<?php require_once __DIR__ . '/includes/head.php';?>
<body class="bg-gradient-login">
    <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <form class="user" method="POST" novalidate autocomplete="off">
                    <p class="text-danger text-center"><?php echo $inactive . $invalid ?></p>
                    <div class="form-group">
                        <input type="email" class="form-control" id="exampleInputEmail" name="email" value="<?php echo htmlspecialchars($email); ?>" aria-describedby="emailHelp"
                        placeholder="Enter Email Address">
                        <p class="text-danger mt-1 mb-2"><?php echo isset($errors['email']) ? $errors['email'] : "" ?></p>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" id="exampleInputPassword" name="pass" value="<?php echo htmlspecialchars($pass); ?>" placeholder="Password">
                      <p class="text-danger mt-1 mb-2"><?php echo isset($errors['pass']) ? $errors['pass'] : "" ?></p>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember
                          Me</label>
                      </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="font-weight-bold small" href="/admin/register">Create an Account!</a>
                  </div>
                  <div class="text-center">
                                    <h4><?php echo $login_info ?></h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- js cript -->
  <?php require_once __DIR__ . '/includes/js.php';?>
  <!-- Login Content -->
</body>
</html>