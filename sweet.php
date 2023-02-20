<!doctype html>
<html lang="en">
<?php
  include 'inc/conn.php';
  include 'inc/header.php';
  ?>
  <body>
    <?php 
     include 'inc/nav.php';
     
    ?>

    <!-- main -->
    <div class="container mt-5">
        <div class="row text-center callout callout-info">
            <div class="h2 text-success ">
                เข้าสู่ระบบ
            </div>
            
        </div>
        <div class="row p-5 border border-success rounded-2 shadow-lg">
        <button type="button" class="btn btn-primary" id="alert">Alert</button>
          
           
              
        </div>
    </div>

    <?php
  include 'inc/footer.php';
  
  ?>
  <script>
        $(function() {
            $('#alert').click(function() {
                Swal.fire(
                    'Good job!',
                    'You clicked the button!',
                    'success'
                );
            });
        });
    </script>
  </body>
</html>