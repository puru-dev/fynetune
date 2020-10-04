<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <p class="text-danger">Powered by <a href="#" style="color: #ffffff; text-decoration: underline;">Fynetune Solution Pvt. Limited</a></p>
            </div>
        </div>
    </div>
</footer>

<script type="text/javascript">
        $(document).ready(function() {
          $(".btn-submit").click(function(e){
              e.preventDefault();
              $.ajax({
                  url: $(this).closest('form').attr('action'),

                  type:$(this).closest('form').attr('method'),

                  data: $("#form").serialize(),

                  dataType: "json",
                  success: function(data) {
                      if(data.error){

                        $(".alert-danger").css('display','block');

                        $(".alert-danger").html(data.error);

                      }else if(data.code=='201'){
                         $(".alert-danger").css('display','block');

                        $(".alert-danger").html(data.message);
                      }else{
                        $(".alert-danger").css('display','none');
                        window.location.href = "<?php echo site_url('dashboard'); ?>";

                      }

                  }

              });

          }); 

        });

</script>

</body>
</html>