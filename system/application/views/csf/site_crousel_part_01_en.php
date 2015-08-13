<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<!-- <li data-target="#myCarousel" data-slide-to="2"></li> -->
	</ol>
	<div class="carousel-inner" role="listbox">
		<div class="item active">
			<img class="first-slide" src="<?php echo base_url('img/photo-99.jpg');?>" alt="First slide">
			<div class="container">
				<div class="carousel-caption">
					<h1>We are 322 students CsF PUCPR the world.</h1>
					<p>
						Learn more about our fellows.
					</p>
					<p>
						<a class="btn btn-lg btn-primary botao-home" href="<?php echo base_url('index.php/csf/indicadores');?>" role="button">See indicators</a>
					</p>
				</div>
			</div>
		</div>
		<div class="item">
			<img class="second-slide" src="<?php echo base_url('img/photo-55.jpg');?>" alt="Second slide">
			<div class="container">
				<div class="carousel-caption">
					<h1>Testimonials of SwB exchange students of the PUCPR.</h1>
					<p>
						See what students from the PUCPR are saying aboutScience without Borders.
					</p>
					<p>
						<a class="btn btn-lg btn-primary botao-home" href="<?php echo base_url('index.php/csf/depoimentos');?>" role="button">See details</a>
					</p>
				</div>
			</div>
		</div>
		<!-- <div class="item">
		<img class="third-slide" src="img/photo-3.jpg" alt="Third slide">
		<div class="container">
		<div class="carousel-caption">
		<h1>One more for good measure.</h1>
		<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
		<p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
		</div>
		</div>
		</div> -->
	</div>
	<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"><i class="fa fa-chevron-left"></i></span> <!-- <span class="sr-only">Anterior</span> --> </a>
	<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"><i class="fa fa-chevron-right"></i></span> <!-- <span class="sr-only">Próximo</span> --> </a>
</div><!-- /.carousel -->