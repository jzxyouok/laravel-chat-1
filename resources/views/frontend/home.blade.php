@extends('frontend_layout')
@section('content')
<header>
	<div class="header-content">
		<div class="header-content-inner">
			<h1>Your Favorite Source of Free Bootstrap Themes</h1>
			<hr>
			<p>Start Bootstrap can help you build better websites using the Bootstrap CSS framework! Just download your template and start going, no strings attached!</p>
			<a href="#about" class="btn btn-primary btn-xl page-scroll">Find Out More</a>
		</div>
	</div>
</header>
<section class="bg-primary" id="about">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 text-center">
				<h2 class="section-heading">We've got what you need!</h2>
				<hr class="light">
				<p class="text-faded">Start Bootstrap has everything you need to get your new website up and running in no time! All of the templates and themes on Start Bootstrap are open source, free to download, and easy to use. No strings attached!</p>
				<a href="#services" class="page-scroll btn btn-default btn-xl sr-button">Get Started!</a>
			</div>
		</div>
	</div>
</section>
<section id="services">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h2 class="section-heading">At Your Service</h2>
				<hr class="primary">
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6 text-center">
				<div class="service-box">
					<img src="{{asset('resources/assets/image')}}/admin.png" style="width:75px;">
					<h3>Sturdy Templates</h3>
					<p class="text-muted">Our templates are updated regularly so they don't break.</p>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="portfolio">
	<div class="container-fluid">
		<div class="row no-gutter popup-gallery">
			<div class="col-lg-4 col-sm-6" align="center">
				<a href="img/portfolio/fullsize/1.jpg" class="portfolio-box">
					<img src="{{asset('resources/assets/image')}}/admin.png" class="img-responsive" alt="">
					<div class="portfolio-box-caption">
						<div class="portfolio-box-caption-content">
							<div class="project-category text-faded">
								Category
							</div>
							<div class="project-name">
								Project Name
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-lg-4 col-sm-6" align="center">
				<a href="img/portfolio/fullsize/1.jpg" class="portfolio-box">
					<img src="{{asset('resources/assets/image')}}/admin.png" class="img-responsive" alt="">
					<div class="portfolio-box-caption">
						<div class="portfolio-box-caption-content">
							<div class="project-category text-faded">
								Category
							</div>
							<div class="project-name">
								Project Name
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-lg-4 col-sm-6" align="center">
				<a href="img/portfolio/fullsize/1.jpg" class="portfolio-box">
					<img src="{{asset('resources/assets/image')}}/admin.png" class="img-responsive" alt="">
					<div class="portfolio-box-caption">
						<div class="portfolio-box-caption-content">
							<div class="project-category text-faded">
								Category
							</div>
							<div class="project-name">
								Project Name
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</section>
<aside class="bg-dark">
	<div class="container text-center">
		<div class="call-to-action">
			<h2>Free Download at Start Bootstrap!</h2>
			<a href="http://startbootstrap.com/template-overviews/creative/" class="btn btn-default btn-xl sr-button">Download Now!</a>
		</div>
	</div>
</aside>
@stop