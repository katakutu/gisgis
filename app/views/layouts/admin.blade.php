<html>
	<head>
		<title>Admin Area</title>
		{{HTML::style('source/css/admin/home.css')}}
		{{HTML::style('source/css/admin/menubar.css')}}
		{{HTML::style('source/js/jquery.js')}}
		@yield('include')
	</head>
	<body>
		<div id="menubar">
			<div id="menubar_header">
				<div id="logo">
					{{HTML::image('source/images/logo.png')}}
				</div>
				<div id="judul">
					Judul Website
				</div>
			</div>
			<div id="menubar_content">
				@yield('menu_item')
			</div>
		</div>
		<div id="content">
			@yield('content')
		</div>
	</body>
</html>