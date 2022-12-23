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
            <div class="h2 pb-2 mb-4 text-success border-bottom border-success">
                สร้างควมม่วนให้บ้านเฮา ด้วยการเว้าพื้น
            </div>
            
        </div>
        

        <div class="row mb-3">
            <div class="col">
                <div class="card bg-light" >
                    <div class="row">
                        <div class="col">
                            <div class="card-body">
                                <h5 class="card-title">ไผหม่าข้าวเปลือกมา 4 กัน</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="page.html" class="btn btn-success">อ่านบทความ</a>
                                <button type="button" class="btn btn-danger">
                                    <i class="fa-solid fa-trash-can"></i> ลบ
                                  </button>
                                  
                            </div>
                        </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
     include 'inc/footer.php';
    ?>
  </body>
</html>