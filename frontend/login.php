<?php require_once __DIR__ . '/includes/db.php';?>
<?php require_once __DIR__ . '/includes/head.php';?>
<?php require_once __DIR__ . '/includes/formValidation.php'; ?>
<?php require_once __DIR__ . '/includes/login_head.php'; ?>
<?php $login_info= "Test account: " . "</br>" . "Email: admin@test.com" . "</br>" . "Password: 123456" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page 01</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php require_once __DIR__ . '/includes/navbar.php'?>
    <main class="page-center">
        <section class="wrapper active">
            <div class="form singup">
                <?php require_once __DIR__ . '/includes/formValidationErrorMsg.php'; ?>
    
                <header>Signup</header>
                <form method="POST" id="singupForm" onsubmit="return validatesingup();" novalidate>
                    <input type="text" placeholder="Full name" name="fullname" id="singupName" required>
                    <p class="error" id="nameError"></p>
                    <!-- <label class="error" id="nameError"></label> -->
                    <input type="text" placeholder="Email address" name="email" id="singupEmail" required>
                    <input type="password" placeholder="Password" name="password" id="singupPass" required>
                    <div class="checkbox">
                        <input type="checkbox" name="" id="singupCheck">
                        <label for="singupCheck ">I accept all terms & conditions</label>
                    </div>
                    <input type="submit" name="signup" value="Signup">
                </form>
            </div>
    
    
            <div class="form login">
                <header>Login</header>
                <form method="POST" id="loginForm" onsubmit="return validatelogin();" novalidate>
                    <input type="text" placeholder="Email address" name="email" value="<?php echo htmlspecialchars($email); ?>" id="loginEmail" required>
                    <input type="password" placeholder="Password" name="pass" id="loginPass" required>
                    <a href="#">forget password</a>
                    <input type="submit" name="login" value="Login">
                </form>
                <h3><?php echo $login_info ?></h3>
            </div>
        </section>
    
    
        <!-- JS Start -->
        <section class="js script">
            <!-- wrapper js -->
            <script>
                const wrapper=document.querySelector(".wrapper"),
                singupHeader = document.querySelector(".singup header"),
                loginHeader = document.querySelector(".login header");
    
                loginHeader.addEventListener("click", () => {
                    wrapper.classList.add("active");
                });
                singupHeader.addEventListener("click", () => {
                    wrapper.classList.remove("active");
                });
                
            </script>
    
            
            <!-- Singup Validation -->
    
            <script>
                function clearErrors() {
                document.querySelectorAll(".error").forEach(el => el.textContent = "");
            }
                function validatesingup(){
    
                    clearErrors();
            let isValid = true;
    
                    let name = document.getElementById("singupName").value.trim();
                    let email = document.getElementById("singupEmail").value.trim();
                    let password = document.getElementById("singupPass").value;
                    let terms = document.getElementById("singupCheck").checked;
    
                    if (name === ""){
                        document.getElementById("nameError").textContent = "Full name is required";
            isValid = false;
                        alert("full name is reuired");
                        return false;
                    }
                    if (email === ""){
                        alert("Email is reuired");
                        return false;
                    }
                    if (!email.includes("@" && ".")){
                        alert("enter valid Email")
                        return false;
                    }
                    if(password.lenght < 6){
                        alert("password must be at least 6 characters")
                        return false;
                    }
                    if(!terms){
                        alert("you must accept terms & coditions")
                        return false;
                    }
    
                    return true;
    
                }
            </script>
    
                <!-- Login Validation -->
    
            <script>
                function validatelogin(){
                    let email = document.getElementById("loginEmail").value.trim();
                    let password = document.getElementById("loginPass").value;
                    if (email === ""){
                        alert("Email is reuired");
                        return false;
                    }
                    if (!email.includes("@" && ".")){
                        alert("enter valid Email")
                        return false;
                    }
                    if(password.lenght < 6){
                        alert("password must be at least 6 characters")
                        return false;
                    }
                    return true;
    
                }
            </script>
        </section>
    </main>
</body>
</html>