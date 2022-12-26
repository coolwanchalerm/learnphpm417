<!doctype html>
<html lang="en">
  <?php 
  include 'inc/conn.php';
  include 'inc/header.php';
  ?>
  <body>
    <?php 
     include 'inc/nav.php';
     session_start();
    ?>
    <!-- main -->
    
    <div class="container mt-5">
        <div class="row text-center callout callout-info">
            <div class="h2 pb-2 mb-4 text-success border-bottom border-success">
                สร้างควมม่วนให้บ้านเฮา ด้วยการเว้าพื้น
                <?=$_SESSION['userLogin']?>
            </div>
            
        </div>
        
        <?php
          $sql = 'SELECT * FROM tbl_post';
          $stmt = $conn->prepare($sql);
          $stmt->execute();
          if($stmt->rowCount() > 1){
          $result = $stmt->fetchAll();
            foreach($result as $re){ ?>

              <div class="row mb-3">
                <div class="col">
                  <div class="card bg-light" >
                      <div class="row">
                          <div class="col">
                              <div class="card-body">
                                  <h5 class="card-title"><?=$re['post_title']?></h5>
                                  <p class="card-text"><?=$re['post_detail']?></p>
                                  <a href="page.php?page_id=<?=$re['post_id']?>" class="btn btn-success">อ่านบทความ</a>
                                  <button type="button" class="btn btn-danger">
                                      <i class="fa-solid fa-trash-can"></i> ลบ
                                    </button>
                                    
                              </div>
                          </div>
                    </div>
                  </div>
                </div>
              </div>
         <?php }
         }else{

            echo "no record";
          }
          
        ?>
        
    </div>
    <?php 
     include 'inc/footer.php';
    ?>
  </body>
</html>