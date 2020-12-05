<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>

<head>
	<title>Visitors an Admin Panel Category Bootstrap Responsive Website Template | Login :: w3layouts</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- bootstrap-css -->
	<link rel="stylesheet" href="{{('public/backend/css/bootstrap.min.css')}}">
	<!-- //bootstrap-css -->
	<!-- Custom CSS -->
	<link href="{{('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
	<link href="{{('public/backend/css/style-responsive.css')}}" rel="stylesheet" />
	<!-- font CSS -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<!-- font-awesome icons -->
	<link rel="stylesheet" href="{{('public/backend/css/font.css')}}" type="text/css" />
	<link href="{{('public/backend/css/font-awesome.css')}}" rel="stylesheet">
	<!-- //font-awesome icons -->
	<script src="{{('public/backend/js/jquery2.0.3.min.js')}}"></script>

</head>

<body>
	<div class="log-w3">
		<div class="w3layouts-main">
			<h2>Đăng nhập ngay</h2>
			@if(session()->has('error'))
			<div class="alert alert-info text-center " style="font-size:16px">
				{{ session()->get('error') }}
			</div>
			@elseif(session()->has('success'))
			<div class="alert alert-info text-center " style="font-size:16px">
				{{ session()->get('success') }}
			</div>
			@endif
			<form action="{{URL::to('/permission')}}" method="post">
				{{ csrf_field()}}
				<input type="text" class="ggg" name="user_email" placeholder="Nhập email" required="">
				<input type="password" class="ggg" name="user_matkhau" placeholder="Nhập mật khẩu" required="">
				<span><input type="checkbox" />Lưu mật khẩu</span>
				<h6><a href="#">Quên mật khẩu?</a></h6>
				<div class="clearfix"></div>
				<input type="submit" value="Sign In" name="login">
			</form>
			<p>Bạn chưa có tài khoản?<a href="{{URL :: to('/dang-ki-uv')}}">Đăng ký ngay</a></p>
		</div>
	</div>
	<scrip src="{{('public/backend/js/bootstrap.js')}}"></scrip>
	<scrip src="{{('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></scrip>
	<script src="{{('public/backend/js/scripts.js')}}"></script>
	<script src="{{('public/backend/js/jquery.slimscroll.js')}}"></script>
	<script src="{{('public/backend/js/jquery.nicescroll.js')}}"></script>
	<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
	<script src="{{('public/backend/js/jquery.scrollTo.js')}}"></script>
</body>

</html>