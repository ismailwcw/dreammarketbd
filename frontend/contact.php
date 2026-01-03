<!DOCTYPE html>
<html>
   <?php require_once __DIR__ . '/includes/head.php';?>
   <body>
      <?php require_once __DIR__ . '/includes/header.php'?>
      <!-- header section end -->
      <!-- contact section start -->
      <div class="contact_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <h1 class="contact_taital contact_heading">Contact Us</h1>
               </div>
            </div>
            <div class="contact_section_2">
               <div class="row">
                  <div class="col-md-12">
                     <div class="mail_section map_form_container">
                        <form action="">
                           <input type="text" class="mail_text" placeholder="Your Name" name="Your Name">
                           <input type="text" class="mail_text" placeholder="Email" name="Email">
                           <textarea class="massage-bt" placeholder="Massage" rows="5" id="comment" name="Massage"></textarea>
                           <div class="contact_btn_main">
                              <div class="send_bt active"><a href="#">Send</a></div>
                              <div class="map_bt"><a href="#" id="showMap">Map</a></div>
                           </div>
                        </form>
                        <div class="map_main map_container">
                           <div class="map-responsive">
                              <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Eiffel+Tower+Paris+France" width="600" height="368" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
                              <div class="btn_main">
                                 <div class="map_bt d-flex justify-content-center w-100 map_center"><a href="#" id="showForm">Form</a></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- contact section end -->
             <!-- footer section start -->
     <?php require_once __DIR__ . '/includes/footer.php'?>
      <!-- footer section end -->

      <!-- copyright section start -->
      <?php require_once __DIR__ . '/includes/copyright.php'?>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <?php require_once __DIR__ . '/includes/js.php' ?>
   </body>
</html>