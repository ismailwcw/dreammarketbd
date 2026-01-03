<script src="/frontend/assets/js/jquery.min.js"></script>
      <script src="/frontend/assets/js/popper.min.js"></script>
      <script src="/frontend/assets/js/bootstrap.bundle.min.js"></script>
      <script src="/frontend/assets/js/jquery-3.0.0.min.js"></script>
      <script src="/frontend/assets/js/plugin.js"></script>
      <!-- sidebar -->
      <script src="/frontend/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="/frontend/assets/js/custom.js"></script>
      <!-- javascript --> 
      <script>
         // Material Select Initialization
         $(document).ready(function() {
         $('.mdb-select').materialSelect();
         $('.select-wrapper.md-form.md-outline input.select-dropdown').bind('focus blur', function () {
         $(this).closest('.select-outline').find('label').toggleClass('active');
         $(this).closest('.select-outline').find('.caret').toggleClass('active');
         });
         });
      </script>