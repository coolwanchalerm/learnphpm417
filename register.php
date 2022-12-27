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
        <div class="row p-5 border border-success rounded-2 shadow-lg">
            <form>
                <div class="mb-3">
                    <label  class="form-label">Firstname</label>
                    <input type="text" class="form-control" required >
                    <div  class="form-text text-danger">error msg</div>
                  </div>
                <div class="mb-3">
                    <div class="mb-3">
                        <label  class="form-label">Lastname</label>
                        <input type="text" class="form-control" required >
                        <div  class="form-text text-danger">error msg</div>
                      </div>
                  <label  class="form-label">Username</label>
                  <input type="text" class="form-control" required >
                  <div  class="form-text text-danger">error msg</div>
                </div>
                <div class="mb-3">
                  <label  class="form-label">Password</label>
                  <input type="password" class="form-control" required>
                  <div  class="form-text text-danger">error msg</div>
                </div>
                <div class="mb-3">
                    <label  class="form-label">Comfirm Password</label>
                    <input type="password" class="form-control" required>
                    <div  class="form-text text-danger">error msg</div>
                  </div>
                <button type="submit" class="btn btn-success">สมัครสมาชิก</button>
              </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>