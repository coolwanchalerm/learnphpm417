<!doctype html>
<html lang="en">
<?php
  session_start(); 
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
        <?php if (isset($_SESSION['err'])) { ?>
            <div class="alert alert-danger" role="alert">
            <?=$_SESSION['err']; unset($_SESSION['err']);?>
            </div>
          <?php }?>
          
            <form method="POST" action="inc/checkLogin.php">
                <div class="mb-3">
                  <label  class="form-label">Username</label>
                  <input type="text" name="username" class="form-control" >
                  
                </div>
                <div class="mb-3">
                  <label  class="form-label">Password</label>
                  <input type="password" name="password" class="form-control">
                  
                </div>
                <div class="mb-3 ">
                  <span>หากคุณยังไม่เป็นสมาชิก <a href="register.php">คลิกที่นี่</a> เพื่อสมัครสมาชิก</span>
                </div>
                <button type="submit" name="submit" class="btn btn-success">เข้าสู่ระบบ</button>
              </form>
              
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>