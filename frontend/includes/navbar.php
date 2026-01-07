<?php
$login_btn = $login_link = $logout_btn= $logout_link="";
if(isset($_SESSION['userlogin'])){
   $logout_btn= "Logout";
   $logout_link= "/logout";
   
$user = $_SESSION['userlogin']; // retrieve user from session
}else{
   $login_btn= "Login";
   $login_link= "/login";
   
}
?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
               <a class="navbar-brand"href="/"><img src="/frontend/assets/images/logo.png"></a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ml-auto">
                     <li class="nav-item active">
                        <a class="nav-link" href="/">Home</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="/about">About</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="/pricing">Pricing Plans</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="/shop">Shop</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="/services">Services</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="/blog">Blog</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="/contact">Contact</a>
                     </li>
                  </ul>
                  <form class="form-inline my-2 my-lg-0">
                     <div class="login_bt">
                        <ul>
                           <li class="active"><a href="#">Buy Now</a></li>
                           <li><a href="<?php echo $login_link . $logout_link; ?>"><?php echo $login_btn . $logout_btn; ?></a></li>
                           <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                        </ul>
                     </div>
                  </form>
               </div>
            </nav>