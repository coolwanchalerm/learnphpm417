<nav class="navbar bg-success text-bg-dark">
        <div class="container-fluid">
          <a href="index.php" class="navbar-brand text-light">ศาลาโสเหล่</a>
          <div class="d-flex" role="search">
            <?php if(isset($_SESSION['userLogin'])){ ?>
              <a class="btn btn-outline-light" href="post.php" style="margin-right: 10px">
                <i class="fa-solid fa-comments"></i> สร้างโพสต์ใหม่
              </a>
              <a class="btn  btn-danger" href="inc/logout.php" >
              <i class="fa-solid fa-right-from-bracket"></i> ออกจากระบบ
              </a>
          <?php  }else { ?>
              <a class="btn btn-outline-light" href="login.php">
                <i class="fa-solid fa-right-to-bracket"></i> เข้าสู่ระบบ
              </a>
          <?php  } ?>
            
          </div>
        </div>
    </nav>