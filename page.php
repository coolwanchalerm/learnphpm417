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
            <div class="h2 pb-2 mb-4 text-success">
                สร้างควมม่วนให้บ้านเฮา ด้วยการเว้าพื้น
            </div>
            
        </div>
       <?php
        include 'inc/conn.php';
        $id = $_GET["page_id"];
        $stmt = $conn->query("SELECT * FROM `tbl_post` INNER JOIN tbl_user ON tbl_user.user_id = tbl_post.post_by WHERE post_id = $id");
        $stmt->execute();
        $re = $stmt->fetch(PDO::FETCH_ASSOC);
       ?>
        <div class="card mb-3 " >
          
            <div class="card-body bg-success bg-opacity-25  text-dark">
              <h6 class="fw-semibold"><?=$re['post_title']?></h6>
              <p class="card-text "><?=$re['post_detail']?></p>
              <footer class="blockquote-footer mt-1"><?=$re['fname'].' '.$re['lname']?> </footer>
            </div>
            
        </div>
        
        <div class="col-lg-12">
          <h4 class="my-4">Comments</h4>
        </div>
        <?php
          $id = $_GET["page_id"];
          $stmt_comment = $conn->query("SELECT * FROM tbl_comment INNER JOIN tbl_user ON tbl_comment.comment_by = tbl_user.user_id WHERE comment_post = $id");
          $stmt_comment->execute();
          if($stmt_comment->rowCount() > 0){
            $comments = $stmt_comment->fetchALL();
              foreach($comments as $comment){ ?>
              <div class="row">
                  <div class="col">
                      <div class="card mb-3" >
                          <div class="card-body  text-dark bg-light">
                            <h6>ความเห็นจากคุณ : <?=$comment['fname'].' '.$comment['lname']?></h6>
                            <p class="card-text"><?=$comment['comment_msg']?></p>
                            <button type="button" class="btn float-end"><i class="fa-regular fa-trash-can"></i></button>
                          </div>
                      </div>
                  </div>
              </div>
        
            <?php }}?>
        
        
        <div class="col-lg-12">
          <h4 class="my-4">แสดงความคิดเห็น</h4>
        </div>
          <div class="row">
            <div class="col">
              <form action="#" method="post">
                    <div class="mb-3">
                      <textarea class="form-control " placeholder="ข้อความ"  rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                      <input type="text" class="form-control "  placeholder="พิมพ์ชื่อ">
                    </div>
                    <div class="clearfix">
                      <button type="submit" class="btn  btn-success  float-end">แสดงความคิดเห็น</button>
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

