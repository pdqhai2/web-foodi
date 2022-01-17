<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Đăng kí quản trị viên</title>
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
      <form method="post" action="{{route('ad.new2')}}">
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
        <div class="txt_field">
          <input name="admin_pass2" type="password" required>
          <span></span>
          <label>Nhập lại mật khẩu</label>
        </div>
        <input type="submit" value="Đăng kí">
       
      </form>
    </div>

  </body>
</html>
