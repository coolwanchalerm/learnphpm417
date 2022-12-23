<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ศาลาโสเหล่</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <style> @import url('https://fonts.googleapis.com/css2?family=Mali:wght@200;400&display=swap'); </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <style>
    *{
        font-family: 'Mali', cursive;
    }
  </style>
  <body>
    <nav class="navbar bg-success text-bg-dark">
        <div class="container-fluid">
          <a href="index.html" class="navbar-brand text-light">ศาลาโสเหล่</a>
          <div class="d-flex" role="search">
            
            <a class="btn btn-outline-light" href="post.html">
                <i class="fa-solid fa-comments"></i> สร้างโพสต์ใหม่</a>
          </div>
        </div>
    </nav>

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
        $stmt = $conn->query("SELECT * FROM tbl_post WHERE post_id = $id");
        $stmt->execute();
        $re = $stmt->fetch(PDO::FETCH_ASSOC);
       ?>
        <div class="card mb-3 " >
          
            <div class="card-body bg-success bg-opacity-25  text-dark">
              <h6 class="fw-semibold"><?=$re['post_title']?></h6>
              <p class="card-text "><?=$re['post_detail']?></p>
              <footer class="blockquote-footer mt-1"><?=$re['post_by']?> </footer>
            </div>
            
        </div>
        
        <div class="col-lg-12">
          <h4 class="my-4">Comments</h4>
        </div>
        <?php
          $id = $_GET["page_id"];
          $stmt_comment = $conn->query("SELECT * FROM tbl_comment WHERE comment_post = $id");
          $stmt_comment->execute();
          if($stmt_comment->rowCount() > 1){
            $comments = $stmt_comment->fetchALL();
              foreach($comments as $comment){ ?>
              <div class="row">
                  <div class="col">
                      <div class="card mb-1" >
                          <div class="card-body  text-dark bg-light">
                            <h6>ความเห็นจากคุณ : <?=$comment['comment_by']?></h6>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>

