<html>
	<head>
		<title>Login Admin</title>
		{{HTML::style('source/css/admin/login.css')}}
	</head>
	<body>
		<div id="login">
			<div id="login_header">
				<div id="logo">
					{{HTML::image('source/images/logo.png')}}
				</div>
				<div id="judul">
					Judul Website
				</div>
			</div>
			<div id="login_content">
				<div id="title">Log In</div>
				<form action="" method="post">
					<label for="">Username</label>
					<input type="text" name="username"><br>
					<label for="">Password</label>
					<input type="password" name="password"><br>
					<label for="">&nbsp;</label>
					<input type="submit" name="submit" value="Log In">
				</form>
			</div>
		</div>
	</body>
</html>