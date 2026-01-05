<?php require_once __DIR__ . '/includes/db.php';?>

<?php

    $fName = $lName = $username = $email = $pass = $confirmpass = "";
    $errors = [];
    $success = false;
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        if(empty($fName = trim($_POST["fName"]))) {
            $errors["fName"] = "First name is required.";

        }else{
            $fName = htmlspecialchars($fName);
        }
        if(empty($lName = trim($_POST["lName"]))) {
            $errors["lName"] = "Last name is required.";

        }else{
            $lName = htmlspecialchars($lName);
        }
        if(empty($username = trim($_POST["username"]))) {
            $errors["username"] = "Username is required.";

        }else{
            $username = htmlspecialchars($username);
        }
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
        if(empty($confirmpass = trim($_POST["confirmpass"]))) {
            $errors["confirmpass"] = "confirm password is required.";

        }else{
            $confirmpass = htmlspecialchars($confirmpass);
        }

        if($pass != $confirmpass){
            $errors["general_error"] = "password and confirmed password not match!";
        }

        if (empty($errors)) {
    // DB query here
          $sql="INSERT INTO users (fName, lName, username, email, pass) VALUES(?,?,?,?,?)";
          $stmtinsert =$conn->prepare($sql);
          $result = $stmtinsert->execute([$fName, $lName, $username, $email, $pass]);
            if($result){
              echo 'successfully saved';
              $success = true;
            }
            else{
              echo 'there was a problm while saving data';
            }
          }
          var_dump($fName, $lName, $username, $email, $pass, $confirmpass);

          
      }




      // $sql="INSERT INTO users (fName, lName, email, pass) VALUES(?,?,?,?)";
      // $stmtinsert =$conn->prepare($sql);
      // $result = $stmtinsert->execute([$fName, $lName, $email, $pass]);
      // if($result){
      //   echo 'successfully saved';
      // }
      // else{
      //   echo 'there was a problm while saving data';
      // }




?>





<!DOCTYPE html>
<html lang="en">
  <!-- head -->
<?php require_once __DIR__ . '/includes/head.php';?>
<body class="bg-gradient-login">
 <!-- Register Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-7 col-lg-9 col-md-6 col-sm-10">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Register</h1>
                  </div>
                  <form class="col-xl-12 col-md-12 col-sm-12" novalidate autocomplete="off" method="POST">
                    <p class="text-danger text-center"><?php echo isset($errors['general_error']) ? $errors['general_error'] : "" ?></p>
                    <div class="row">
                        <div class="form-group col-xl-6 col-md-6 col-sm-12">
                          <label>First Name</label>
                          <input type="text" class="form-control" id="exampleInputFirstName" name="fName" value="<?php echo htmlspecialchars($fName); ?>" placeholder="Enter First Name">
                          <p class="text-danger mt-1 mb-2"><?php echo isset($errors['fName']) ? $errors['fName'] : "" ?></p>
                        </div>
                        <div class="form-group col-xl-6 col-md-6 col-sm-12">
                          <label>Last Name</label>
                          <input type="text" class="form-control" id="exampleInputLastName" name="lName" value="<?php echo htmlspecialchars($lName); ?>" placeholder="Enter Last Name">
                          <p class="text-danger mt-1 mb-2"><?php echo isset($errors['lName']) ? $errors['lName'] : "" ?></p>
                        </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xl-6 col-md-6 col-sm-12">
                        <label>Username</label>
                        <input type="text" class="form-control" id="exampleInputEmail" name="username" value="<?php echo htmlspecialchars($username); ?>" aria-describedby="emailHelp"
                          placeholder="Enter Username">
                          <p class="text-danger mt-1 mb-2"><?php echo isset($errors['username']) ? $errors['username'] : "" ?></p>
                      </div>
                      <div class="form-group col-xl-6 col-md-6 col-sm-12">
                        <label>Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail" name="email" value="<?php echo htmlspecialchars($email); ?>" aria-describedby="emailHelp"
                          placeholder="Enter Email Address">
                          <p class="text-danger mt-1 mb-2"><?php echo isset($errors['email']) ? $errors['email'] : "" ?></p>
                      </div>
                      </div>


                    <div class="row">
                        <div class="form-group col-xl-6 col-md-6 col-sm-12">
                          <label>Password</label>
                          <input type="password" class="form-control" id="exampleInputPassword" name="pass" value="<?php echo htmlspecialchars($pass); ?>"placeholder="Password">
                          <p class="text-danger mt-1 mb-2"><?php echo isset($errors['pass']) ? $errors['pass'] : "" ?></p>
                          <p class="text-danger mt-1 mb-2"><?php echo isset($errors['general_error']) ? $errors['general_error'] : "" ?></p>

                        </div>
                        <div class="form-group col-xl-6 col-md-6 col-sm-12">
                          <label id="confirmpass">Repeat Password</label>
                          <input type="password" class="form-control" id="confirmpass" name="confirmpass" value="<?php echo htmlspecialchars($confirmpass); ?>"
                            placeholder="Repeat Password">
                            <p class="text-danger mt-1 mb-2"><?php echo isset($errors['confirmpass']) ? $errors['confirmpass'] : "" ?></p>
                            <p class="text-danger mt-1 mb-2"><?php echo isset($errors['general_error']) ? $errors['general_error'] : "" ?></p>

                        </div>
                    </div>

                    <div class="form-group">
                      <button type="submit" id="register" class="btn btn-primary btn-block">Register</button>
                    </div>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="font-weight-bold small" href="/admin/login">Already have an account?</a>
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
  <!-- Register Content -->
  <!-- js cript -->
  <?php require_once __DIR__ . '/includes/js.php';?>
  <!-- Login Content -->

<?php if ($success): ?>
  <script>
    Swal.fire({
      title: "Successfully Registerd",
      text: "click button to login",
      icon: "success",
      confirmButtonText: "Go to Login"
    }).then((result) => {
    if (result.isConfirmed) {
        window.location.href = "/admin/login";
    }
});
  </script>
  <?php endif; ?>
</body>
</html>