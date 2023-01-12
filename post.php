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
                สร้างควมม่วนให้บ้านเฮา ด้วยการเว้าพื้น
            </div>
            
        </div>
        <div class="container mt-5">
          <div class="row p-5 border border-success rounded-2 shadow-lg">  
            <form action="addpost.php" method="post">
                  <div class="mb-3">
                    <label class="form-label">ชื่อเรื่อง</label>
                    <input name="post_name" type="text" class="form-control"  placeholder="ชื่อเรื่อง">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">เนื้อเรื่องที่ต้องการโพสต์</label>
                    <textarea name="post_detail" class="form-control"  rows="3"></textarea>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">ชื่อผู้โพสต์</label>
                    <input value="<?=$_SESSION['userLoginName'];?>" type="text" disabled class="form-control"  placeholder="พิมพ์ชื่อ">
                    <input value="<?=$_SESSION['userLoginID'];?>" type="hidden" name="post_by" >
                  </div>
                  <div class="clearfix">
                    <button name="submit" type="submit" class="btn  btn-success btn-lg float-end">โพสต์</button>
                  </div>  
            </form>
          </div>
        </div>
        

        
    </div>
    <?php 
     include 'inc/footer.php';
    ?>
  </body>
</html>

