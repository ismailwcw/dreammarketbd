<?php
session_start();

// If the user is already logged in, redirect to dashboard
if(isset($_SESSION['userlogin'])){
    header("Location: /"); // redirect to dashboard
    exit;
}?>
<?php
$errors = [];
$success = "";

// SIGNUP VALIDATION
if (isset($_POST['signup'])) {

    $name = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($name)) {
        $errors[] = "Full name is required";
    }

    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    if (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters";
    }

    if (empty($errors)) {
        $success = "Signup successful!";


        // here you would save data to database
        $roles = "user";
          $sql="INSERT INTO users (fName, email, pass, roles) VALUES(?,?,?,?)";
          $stmtinsert =$conn->prepare($sql);
          $result = $stmtinsert->execute([$name, $email, $password, $roles]);
            if($result){
              echo 'successfully saved';
              $success = true;
            }
            else{
              echo 'there was a problm while saving data';
            }
          }
          var_dump($name, $email, $password, $roles);

    }

// LOGIN VALIDATION
$email = "";
if (isset($_POST['login'])) {

    $email = trim($_POST['email']);
    $passwords = trim($_POST['pass']);

    if (empty($email) || empty($passwords)) {
        $errors[] = "All login fields are required";
    }

    if (empty($errors)) {
        // here you would check database

        $emails =$_POST['email'];
        $passwords =$_POST['pass'];

          $sql="SELECT * FROM users WHERE email = ? AND pass = ? LIMIT 1";
          $stmtselect =$conn->prepare($sql);
          $result = $stmtselect->execute([$emails, $passwords]);
            if($result){
              $user = $stmtselect->fetch(PDO::FETCH_ASSOC);
              if($email !== $user['email'] ){
                $errors[] = "User not found";
              }elseif( $passwords !== $user['pass']){
                $errors[] = "User not found";
              }
              if($stmtselect->rowCount() > 0){
                if ($user['roles'] === 'user') {
                    if( $user['status'] != 0){

                    $_SESSION['userlogin'] = $user;
                        if(isset($_SESSION['userlogin'])){
                        header("location: /");}
                        exit;
                    }
                    else{
                        $inactive = "User " . $user['email'] . " is inactive please contact with admin";
                    }
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
