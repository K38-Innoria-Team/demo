<div class="Content">
  <div class="container">

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        
        <label class="sr-only">Username</label>
        <input type="text" name="username" class="form-control" placeholder="Username" required>
        <label class="sr-only">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div>
<?php
//echo $check;
if($check==1) {
?>
<div class="alert alert-info" role="alert">
  <?php
      echo 'Đăng nhập thành công!';
      echo "<p>Sau 2s trang web sẽ tự động chuyển sang trang quản lý dành cho Admin</p>";
      echo "<p>Nếu trang web không tự chuyển bạn hãy nhấn vào đây: <a href='". base_url() ."index.php/viewreport'>continue</a> </p>";
      echo "<meta http-equiv='refresh' content='2;url=". base_url() ."index.php/viewreport'>";
  ?>
</div>
<?php
    }
else
    if($check==0) {
?>
<div class="alert alert-danger" role="alert">
<?php
        echo 'Đăng nhập thất bại!';
        echo "<meta http-equiv='refresh' content='1;url=". base_url() ."index.php/login'>";
?>
</div>
<?php
    }
?>
</div>