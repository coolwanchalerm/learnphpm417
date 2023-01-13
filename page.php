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
    
 
    $id = $_GET["page_id"]; //page_id
    

    // show post detail
    $stmt = $conn->query("SELECT * FROM `tbl_post` INNER JOIN tbl_user ON tbl_user.user_id = tbl_post.post_by WHERE post_id = $id");
    $stmt->execute();
    $re = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="card mb-3 ">

      <div class="card-body bg-success bg-opacity-25  text-dark">
        <h6 class="fw-semibold"><?= $re['post_title'] ?></h6>
        <p class="card-text "><?= $re['post_detail'] ?></p>
        <footer class="blockquote-footer mt-1"><?= $re['fname'] . ' ' . $re['lname'] ?> </footer>
      </div>

    </div>

 
    <?php

    // show comment
    $stmt_comment = $conn->query("SELECT * FROM tbl_comment INNER JOIN tbl_user ON tbl_comment.comment_by = tbl_user.user_id WHERE comment_post = $id");
    $stmt_comment->execute();
    if ($stmt_comment->rowCount() > 0) {
      $comments = $stmt_comment->fetchALL();
      foreach ($comments as $comment) { ?>
        <div class="row">
          <div class="col">
            <div class="card mb-3">
              <div class="card-body  text-dark bg-light">
                <h6>ความเห็นจากคุณ : <?= $comment['fname'] . ' ' . $comment['lname'] ?></h6>
                <p class="card-text"><?= $comment['comment_msg'] ?></p>
                <?php if (isset($_SESSION['userLogin']) && $_SESSION['userLogin'] == "admin") { ?>
                  <a href="delete_comment.php?comment_id=<?=$comment['comment_id']?>" class="btn float-end " onclick="return confirm('คุณต้องการลบคอมเม้นนี้ใช่หรือไม่..');">
                    <i class="fa-solid fa-trash-can"></i>
                  </a>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>

    <?php }
    } ?>


    <div class="col-lg-12">
      <h4 class="my-4">แสดงความคิดเห็น</h4>
    </div>
    <?php if (isset($_SESSION['userLogin'])) { ?>
      <div class="row">
        <div class="col">
          <form action="addComment.php" method="post">
            <div class="mb-3">
              <textarea name="comment_msg" class="form-control " placeholder="ข้อความ" rows="3" required ></textarea>
            </div>
            <div class="mb-3">
              <input value="<?= $_SESSION['userLoginName']; ?>" type="text" disabled class="form-control" placeholder="พิมพ์ชื่อ">
              <input value="<?= $_SESSION['userLoginID']; ?>" type="hidden" name="comment_by">
            </div>
            <div class="clearfix">
              <input value="<?= $re['post_id'] ?>" type="hidden" name="comment_post">
              <button type="submit" name="addComment" class="btn  btn-success  float-end">แสดงความคิดเห็น</button>

            </div>
          </form>
        </div>
      </div>
    <?php } else { ?>
      กรุณา <a href="login.php">เข้าสู่ระบบ</a> เพื่อแสดงความคิดเห็น

    <?php } ?>




  </div>
  <?php
  include 'inc/footer.php';
  ?>
</body>

</html>