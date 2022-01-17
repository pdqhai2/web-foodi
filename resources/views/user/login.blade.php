<!DOCTYPE html>
<html>
<head>
	<title>Đăng nhập / đăng ký</title>
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/login.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="shortcut icon" href="{{asset('public/frontend/images/icon.png')}}">
</head>
<body>
<div style="text-align:center;padding:10px">
        <?php
            $message = Session::get('message');
            if($message) {
                echo '<span style="text-align:center;color:red;font-weight:bolder;width:100%;font-size:30px">'.$message.'</span>';
                Session::put('message',null);
            }
        ?>
    </div>
<div class="container" id="container">
    <div class="form-container sign-up-container">
        <form action="{{URL::to('/user-new-account')}}" method="post">
            {{csrf_field()}}
            <h1>Đăng ký</h1>
            <div class="social-container">
                <a href="#" class="social"><i class="fa fa-facebook"></i></a>
                <a href="#" class="social"><i class="fa fa-google"></i></a>
                <a href="#" class="social"><i class="fa fa-linkedin"></i></a>
            </div>

            <input type="text" name="user_usename" placeholder="Tên đăng nhập">
            <input type="password" name="user_pass" placeholder="Mật khẩu">
            <input type="password" name="user_pass2" placeholder="Nhập lại mật khẩu">
            <button>Đăng ký</button>
        </form>
    </div>

    <div class="form-container sign-in-container">
        <form action="{{route('us.checklogin')}}" method="post">
            {{csrf_field()}}
            <h1>Đăng nhập</h1>
            <div class="social-container">
                <a href="#" class="social"><i class="fa fa-facebook"></i></a>
                <a href="#" class="social"><i class="fa fa-google"></i></a>
                <a href="#" class="social"><i class="fa fa-linkedin"></i></a>
            </div>
            <input type="text" name="user_usename" placeholder="Tên đăng nhập">
            <input type="password" name="user_pass" placeholder="Mật khẩu">
            <a href="#">Quên mật khẩu.???</a>
            <button>Đăng nhập</button>
        </form>
    </div>

    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Chào mừng bạn đến với FOODI</h1>
                <p>Tạo tài khoản để sử dụng Foodi dễ dàng hơn</p>
                <button class="ghost" id="signIn">Đăng nhập</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Hello</h1>
                <p>Vào Foodi thôi..!!!!</p>
                <button class="ghost" id="signUp"><a href="infor.html"></a> Đăng ký</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
	const signUpButton = document.getElementById('signUp');
	const signInButton = document.getElementById('signIn');
	const container = document.getElementById('container');

	signUpButton.addEventListener('click', () => {
		container.classList.add("right-panel-active");
	});
	signInButton.addEventListener('click', () => {
		container.classList.remove("right-panel-active");
	});
</script>


</body>
</html>