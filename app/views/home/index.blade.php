<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Laravel: A Framework For Web Artisans</title>
	<meta name="viewport" content="width=device-width">
	{{ HTML::style('laravel/css/style.css') }}
</head>
<body>
	<div class="wrapper">
		<header>
			<h1>Laravel + Engine</h1>
			<h2>A Framework For iBEC Developers</h2>

			<p class="intro-text" style="margin-top: 45px;">
			</p>
		</header>
		<div role="main" class="main">
			<div class="home">
				<h2>Installation</h2>

				<p>&bull; Just copy laravel.ibecsystems.kz folder from FTP to local machine.</p>
				<p>&bull; Install and run migrations.</p>
				<p>&bull; Done.</p>

				<h2>Grow in knowledge.</h2>

				<p>
					Learning to use Laravel is amazingly simple thanks to
					its {{ HTML::link('docs', 'wonderful documentation') }}.
				</p>

				<h2>Create something beautiful.</h2>

				<p>
					Now that you're up and running, it's time to start creating!
					Here are some links to help you get started:
				</p>

				<ul class="out-links">
					<li><a href="http://laravel.com">Official Website</a></li>
					<li><a href="http://github.com/laravel/laravel">GitHub Repository</a></li>
					<li><a href="https://github.com/mobileka/laravel-engine">GitHub Laravel Engine</a></li>
					<li><a title="login:admin@example.com pass:12345678" href="{{ route('admin_home') }}">Control panel</a></li>
				</ul>
			</div>
		</div>
	</div>
</body>
</html>
