<?php require_once __DIR__ . '/includes/db.php';?>

<?php

    $email = $pass = "";
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
        var_dump($email, $pass);
        
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