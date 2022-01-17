<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Đăng nhập quản trị viên</title>
    <link rel="shortcut icon" href="{{asset('public/backend/images/icon.png')}}">
    <link rel="stylesheet" href="{{asset('public/backend/css/login-admin.css')}}">
  </head>
  <body>
    <div class="center">
    <h1>Đăng nhập</h1>
    <?php
        $message = Session::get('message');
        if($message) {
            echo '<span style="text-align:center;color:red;font-weight:bolder;width:100%">'.$message.'</span>';
            Session::put('message',null);
        }
    ?>
      <form method="post" action="{{URL::to('/admin-check')}}">
        {{ csrf_field() }}
        <div class="txt_field">
          <input name="admin_usename" type="text" required>
          <span></span>
          <label>Tên đăng nhập</label>
        </div>
        <div class="txt_field">
          <input name="admin_pass" type="password" required>
          <span></span>
          <label>Mật khẩu</label>
        </div>
        <div class="pass">Quên mật khẩu?</div>
        <input type="submit" value="Đăng nhập">
       
      </form>
    </div>

  </body>
</html>
