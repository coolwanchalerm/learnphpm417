<!doctype html>
<html lang="en">
<?php
session_start();
include 'inc/conn.php';
include 'inc/header.php';

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];

  // Prepare the DELETE statement
  $sql = "DELETE FROM tbl_post WHERE post_id = :id";
  $sql_comment = "DELETE FROM tbl_comment WHERE comment_post = :id";
  $stmt = $conn->prepare($sql);
  $stmt_comment = $conn->prepare($sql_comment);

  // Bind the values to the statement
  $stmt->bindValue(':id', $id);
  $stmt_comment->bindValue(':id', $id);

  // Execute the DELETE statement
  $stmt->execute();
  $stmt_comment->execute();

  if ($stmt) {
    $_SESSION['success'] = 'ลบข้อมูลสำเร็จ..';
    header("refresh:0; url=index.php");
  }
}

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
    <!-- alert -->
    <div class="row"> 
      <div class="col">
          
            <?php if (isset($_SESSION['success'])) { ?>
              <div class="alert alert-danger" role="alert">
               <?=$_SESSION['success']; unset($_SESSION['success']); ?>
              </div>
           <?php } ?>
          
      </div>

    </div>
    <?php
    $sql = 'SELECT * FROM tbl_post';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
      $result = $stmt->fetchAll();
      foreach ($result as $re) { ?>

        <div class="row mb-3">

          <div class="col">
            <div class="card bg-light">

              <div class="row">
                <div class="col">
                  <div class="card-body">
                    <h5 class="card-title"><?= $re['post_title'] ?></h5>
                    <p class="card-text"><?= $re['post_detail'] ?></p>
                    <a href="page.php?page_id=<?= $re['post_id'] ?>" class="btn btn-success">อ่านบทความ</a>
                    <?php if (isset($_SESSION['userLogin']) && $_SESSION['userLogin'] == "admin") { ?>
                      <a href="?delete=<?= $re['post_id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?');">
                        <i class="fa-solid fa-trash-can"></i> ลบ
                      </a>
                    <?php } ?>


                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    <?php }
    } else {

      echo '<div class="alert alert-warning" role="alert">
      ยังไม่มีโพสต์
    </div>';
    }

    ?>

  </div>

  <?php
  include 'inc/footer.php';
  ?>
</body>

</html>