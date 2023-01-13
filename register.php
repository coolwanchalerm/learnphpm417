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
    <div class="row p-5 border border-success rounded-2 shadow-lg">
      <?php if (isset($_SESSION['error'])) { ?>
        <div class="alert alert-danger" role="alert">
          <?= $_SESSION['error'];
          unset($_SESSION['error']); ?>
        </div>
      <?php } ?>
      <?php if (isset($_SESSION['success'])) { ?>
        <div class="alert alert-success" role="alert">
          <?= $_SESSION['success'];
          unset($_SESSION['success']); ?>
        </div>
      <?php } ?>
      <form action="addUser.php" method="post">
        <div class="mb-3">
          <label class="form-label">Firstname</label>
          <input name="fname" type="text" class="form-control" required>

        </div>
        <div class="mb-3">
          <div class="mb-3">
            <label class="form-label">Lastname</label>
            <input name="lname" type="text" class="form-control" required>

          </div>
          <label class="form-label">Username</label>
          <input name="username" type="text" class="form-control" required>

        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input name="password" type="password" class="form-control" required>

        </div>
        <div class="mb-3">
          <label class="form-label">Comfirm Password</label>
          <input name="comPass" type="password" class="form-control" required>

        </div>
        <button name="addUser" type="submit" class="btn btn-success">สมัครสมาชิก</button>
      </form>
    </div>
  </div>

  <?php
  include 'inc/footer.php';
  ?>
</body>

</html>