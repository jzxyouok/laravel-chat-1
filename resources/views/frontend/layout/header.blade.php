<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand page-scroll" href="#page-top">Start Bootstrap</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a  href="{{ route('/') }}">Home</a>
				</li>
				<li>
					<a class="page-scroll" href="{{ route('/') }}#about">About</a>
				</li>
				<li>
					<a class="page-scroll" href="{{ route('/') }}#services">Services</a>
				</li>
				<li>
					<a class="page-scroll" href="{{ route('/') }}#portfolio">Portfolio</a>
				</li>
				<li>
					<a class="page-scroll" href="{{ route('/') }}#contact">Contact</a>
				</li>
				<li>
					<a class="page-scroll" href="{{ route('login') }}">Login</a>
				</li>
			</ul>
		</div>
	</div>
</nav>