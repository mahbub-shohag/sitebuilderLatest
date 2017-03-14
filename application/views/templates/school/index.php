<body>
	<div class="header">
		<div class="container">
			<div class="w3l_header_left"> 
				<ul>
					<li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>+ (123) 111 222 333</li>
					<li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a href="mailto:info@example.com">info@example.com</a></li>
				</ul>
			</div>
			
			<div class="w3l_header_right">
				<ul>
					<li><a class="book popup-with-zoom-anim button-isi zoomIn animated" data-wow-delay=".5s" href="#small-dialog"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Sign In</a></li>
					<li><a class="book popup-with-zoom-anim button-isi zoomIn animated" data-wow-delay=".5s" href="#small-dialog2"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Sign Up</a></li>
				</ul>
			</div>
			
			<div class="clearfix"> </div>
			
		</div>
	</div>
	<div class="logo-navigation-w3layouts">
		<div class="container">
		<div class="logo-w3">
			<a href="#"><h1><img src="<?php echo base_url();?>image/school/logo.png" alt=" " /><span>Inspire</span></h1></a>
		</div>
		<div class="navigation agileits w3layouts">
			<nav class="navbar agileits w3layouts navbar-default">
				<div class="navbar-header agileits w3layouts">
					<button type="button" class="navbar-toggle agileits w3layouts collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
						<span class="sr-only agileits w3layouts">Toggle navigation</span>
						<span class="icon-bar agileits w3layouts"></span>
						<span class="icon-bar agileits w3layouts"></span>
						<span class="icon-bar agileits w3layouts"></span>
					</button>
				</div>
				<div class="navbar-collapse agileits w3layouts collapse hover-effect" id="navbar">
					<ul class="agileits w3layouts">
						<li class="agileits w3layouts"><a href="#" class="active">Home</a></li>
						<li class="agileits w3layouts"><a class="scroll" href="#about">About</a></li>
						<li class="agileits w3layouts"><a class="scroll" href="#team">Team</a></li>
						<li class="agileits w3layouts"><a class="scroll" href="#services">Services</a></li>
						<li class="agileits w3layouts"><a class="scroll" href="#gallery">Gallery</a></li>
						<li class="agileits w3layouts"><a class="scroll" href="#contact">Contact</a></li>
					</ul>
				</div>
			</nav>
		</div>
		<div class="clearfix"></div>
		</div>
	</div>

    <div style="background:url('<?php echo base_url();?>image/school/banner3.jpg') no-repeat 0px 0px;
	background-size:cover;
	min-height:650px;">
		<h3>Teach students how</h3>
		<h2><span>To </span>learn</h2>
		<h4>Our goal is to transform them</h4>
		<div class="arrow">
			<a href="#contact" class="scroll"><img src="<?php echo base_url();?>image/school/arrow.png" alt=" " /></a>
		</div>
	</div>
	<!-- about -->
	<div class="about-w3-agile" id="about">
		<div class="container">
			<div class="wthree_about_grids">
				<div class="col-md-6 wthree_about_grid_left">
					<h3>About us</h3>
							<p>Fusce semper, nibh eu sollicitudin imperdiet, dolor magna vestibulum mi, 
								vel tincidunt augue ipsum nec erat. Vestibulum congue leo elementum 
								ullamcorper commodo. Class aptent taciti sociosqu ad litora torquent 
								per conubia nostra, per inceptos himenaeos.</p>
								<a href="#" data-toggle="modal" data-target="#myModal">Read More</a>
				</div>
				<div id="myModal" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Modal Header</h4>
						  </div>
						  <div class="modal-body">
							<p>Nam tincidunt leo nec molestie accumsan. Fusce iaculis sit amet tellus vel ultrices. Phasellus in tellus ut orci accumsan facilisis eget in ante. Aliquam laoreet finibus augue non pharetra. Nullam tincidunt ex quis massa auctor, quis auctor erat semper. Morbi a justo auctor, semper mi viverra, lacinia libero. Praesent sodales augue tristique tellus eleifend, eu placerat eros hendrerit. Cras imperdiet lorem nec magna congue, blandit auctor arcu posuere. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						  </div>
						</div>
					</div>
				</div>

				<div class="col-md-6 wthree_about_grid_right">
					<img src="<?php echo base_url();?>image/school/11.jpg" alt=" " class="img-responsive" />
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //about -->
	<div class="featured-work">
		<div class="container">
			<h3>Featured work</h3>
			<div class="col-md-6 featured-left">
				<div class="wmuSlider example1 animated wow slideInUp" data-wow-delay=".5s">
					<div class="wmuSliderWrapper">
						<article style="position: absolute; width: 100%; opacity: 0;"> 
							<div class="banner-wrap">
								<img src="<?php echo base_url();?>image/school/f1.jpg" alt=" " class="img-responsive" />
							</div>
						</article>
						<article style="position: absolute; width: 100%; opacity: 0;"> 
							<div class="banner-wrap">
								<img src="<?php echo base_url();?>image/school/f2.jpg" alt=" " class="img-responsive" />
							</div>
						</article>
						<article style="position: absolute; width: 100%; opacity: 0;"> 
							<div class="banner-wrap">
								<img src="<?php echo base_url();?>image/school/f3.jpg" alt=" " class="img-responsive" />
							</div>
						</article>
					</div>
				</div>
			</div>
			<script src="<?php echo base_url();?>js/school/jquery.wmuSlider.js"></script> 
								<script>
									$('.example1').wmuSlider();         
								</script> 

			<div class="col-md-6 featured-right">
				<h4>Quisque lobortis</h4>
				<p>Nam a leo porta, pulvinar eros id, facilisis nisi. Proin ut blandit tortor, in tempor tellus. Sed lacus metus, hendrerit eu orci ac, aliquam commodo lacus.Morbi gravida pulvinar orci, et consectetur enim consectetur non. Proin nunc leo, tincidunt sed lacinia</p>
				<p>Fusce eu felis et sapien malesuada pretium a ac eros. Praesent quis hendrerit quam. Integer mollis est a cursus pulvinar. Proin leo neque, posuere eu metus </p>
				<a href="#" data-toggle="modal" data-target="#myModal">Read More</a>
			</div>
			<div class="clearfix">
			</div>
		</div>
	</div>
<div class="feat-bottom" style="background:url(<?php echo base_url(); ?>image/school/bg.jpg) no-repeat 0px 0px; background-size:cover;
	min-height:800px;">
		<h4>THE PURPOSE OF EDUCATION IS TO MAKE MINDS NOT CAREERS</h4>
	</div>
	<!-- team -->
	<div class="team" id="team">
		<div class="container">
			<h3>Meet Our Team</h3>
			<div class="agile_team_grids">
				<div class="col-md-3 agile_team_grid  agile_team_gridf">
					<div class="agile_team_grid_main">
						<img src="<?php echo base_url();?>image/school/t1.jpg" alt=" " class="img-responsive" />
						<div class="p-mask">
							<ul class="social-icons">
								<li><a href="#" class="icon-button twitter"><i class="icon-twitter"></i><span></span></a></li>
								<li><a href="#" class="icon-button google"><i class="icon-google"></i><span></span></a></li>
								<li><a href="#" class="icon-button v"><i class="icon-v"></i><span></span></a></li>
								<li><a href="#" class="icon-button pinterest"><i class="pinterest"></i><span></span></a></li>
							</ul>
						</div>
					</div>
					<div class="agile_team_grid1">
						<h4>Guy Ritchie</h4>
						<p>Professor</p>
					</div>
				</div>
				<div class="col-md-3 agile_team_grid agile_team_grid2">
					<div class="agile_team_grid_main">
						<img src="<?php echo base_url();?>image/school/t2.jpg" alt=" " class="img-responsive" />
						<div class="p-mask">
							<ul class="social-icons">
								<li><a href="#" class="icon-button twitter"><i class="icon-twitter"></i><span></span></a></li>
								<li><a href="#" class="icon-button google"><i class="icon-google"></i><span></span></a></li>
								<li><a href="#" class="icon-button v"><i class="icon-v"></i><span></span></a></li>
								<li><a href="#" class="icon-button pinterest"><i class="pinterest"></i><span></span></a></li>
							</ul>
						</div>
					</div>
					<div class="agile_team_grid1">
						<h4>Martina</h4>
						<p>Asst.Proffesor</p>
					</div>
				</div>
				<div class="col-md-3 agile_team_grid agile_team_grid3">
					<div class="agile_team_grid_main">
						<img src="<?php echo base_url();?>image/school/t3.jpg" alt=" " class="img-responsive" />
						<div class="p-mask">
							<ul class="social-icons">
								<li><a href="#" class="icon-button twitter"><i class="icon-twitter"></i><span></span></a></li>
								<li><a href="#" class="icon-button google"><i class="icon-google"></i><span></span></a></li>
								<li><a href="#" class="icon-button v"><i class="icon-v"></i><span></span></a></li>
								<li><a href="#" class="icon-button pinterest"><i class="pinterest"></i><span></span></a></li>
							</ul>
						</div>
					</div>
					<div class="agile_team_grid1">
						<h4>Lisa kristen</h4>
						<p>College Dean</p>
					</div>
				</div>
				<div class="col-md-3 agile_team_grid agile_team_grid4">
					<div class="agile_team_grid_main">
						<img src="<?php echo base_url();?>image/school/t4.jpg" alt=" " class="img-responsive" />
						<div class="p-mask">
							<ul class="social-icons">
								<li><a href="#" class="icon-button twitter"><i class="icon-twitter"></i><span></span></a></li>
								<li><a href="#" class="icon-button google"><i class="icon-google"></i><span></span></a></li>
								<li><a href="#" class="icon-button v"><i class="icon-v"></i><span></span></a></li>
								<li><a href="#" class="icon-button pinterest"><i class="pinterest"></i><span></span></a></li>
							</ul>
						</div>
					</div>
					<div class="agile_team_grid1">
						<h4>Rose Alba</h4>
						<p>HOD</p>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //team -->
	<div class="services" id="services">
		<div class="container">
			<h3>Our services</h3>
			<div class="col-md-4 services-grids services-grids1">
				<span class="glyphicon glyphicon-education" aria-hidden="true"></span>
				<h4>Curabitur eget</h4>
				<p>Integer sapien dolor, commodo non enim eu, faucibus luctus odio. </p>
			</div>
			<div class="col-md-4 services-grids services-grids2">
				<span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>
				<h4>Dolor magna</h4>
				<p>Vivamus efficitur consequat ante, vel tincidunt dui volutpat in. Etiam blandit</p>
			</div>
			<div class="col-md-4 services-grids services-grids3">
				<span class="glyphicon glyphicon-book" aria-hidden="true"></span>
				<h4>lacinia posuere</h4>
				<p>Maecenas ante lorem, sollicitudin eu risus a, dignissim tincidunt est.  </p>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- Gallery -->
	<div class="gallery" id="gallery">
		<div class="container">
			<h3>GALLERY</h3>
			<div class="gallery-grids">
				<div class="col-md-6 col-sm-6 gallery-grids-left gallery-grids-left-gallery1-top">
					<div class="gallery-grid">
						<a class="example-image-link" href="<?php echo base_url();?>image/school/gallery-1.jpg" data-lightbox="example-set" data-title="">
							<div class="grid">
								<figure class="effect-apollo">
									<img src="<?php echo base_url();?>image/school/gallery-1.jpg" alt=""/>
										<figcaption></figcaption>
								</figure>
							</div>
						</a>
					</div>
					<div class="gallery-grids-left-sub">
						<div class="col-md-6 col-sm-6 gallery-grids-left-subl">
							<div class="gallery-grid">
								<a class="example-image-link" href="<?php echo base_url();?>image/school/gallery-4.jpg" data-lightbox="example-set" data-title="">
									<div class="grid">
										<figure class="effect-apollo">
											<img src="<?php echo base_url();?>image/school/gallery-4.jpg" alt=""/>
												<figcaption></figcaption>
										</figure>
									</div>
								</a>
							</div>
							<div class="gallery-grid gallery-grid-sub grid-middle gallery-grid-sub-left-bottom">
								<a class="example-image-link" href="<?php echo base_url();?>image/school/gallery-5.jpg" data-lightbox="example-set" data-title="">
									<div class="grid">
										<figure class="effect-apollo">
											<img src="<?php echo base_url();?>image/school/gallery-5.jpg" alt=""/>
												<figcaption></figcaption>
										</figure>
									</div>
								</a>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 gallery-grids-left-subr gallery-grids-left-subr-long">
							<div class="gallery-grid">
								<a class="example-image-link" href="<?php echo base_url();?>image/school/gallery-7.jpg" data-lightbox="example-set" data-title="">
									<div class="grid">
										<figure class="effect-apollo">
											<img src="<?php echo base_url();?>image/school/gallery-7.jpg" alt=""/>
												<figcaption></figcaption>
										</figure>
									</div>
								</a>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 gallery-grids-left">
					<div class="col-md-6 col-sm-6 gallery-grids-right gallery-grids-right-first">
						<div class="gallery-grid">
							<a class="example-image-link" href="<?php echo base_url();?>image/school/gallery-2.jpg" data-lightbox="example-set" data-title="">
								<div class="grid">
									<figure class="effect-apollo">
										<img src="<?php echo base_url();?>image/school/gallery-2.jpg" alt=""/>
											<figcaption></figcaption>
									</figure>
								</div>
							</a>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 gallery-grids-right gallery-grids-right-two">
						<div class="gallery-grid">
							<a class="example-image-link" href="<?php echo base_url();?>image/school/gallery-3.jpg" data-lightbox="example-set" data-title="">
								<div class="grid">
									<figure class="effect-apollo">
										<img src="<?php echo base_url();?>image/school/gallery-3.jpg" alt=""/>
											<figcaption></figcaption>
									</figure>
								</div>
							</a>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="gallery-grids-right1 gallery-grids-right-hand">
						<div class="gallery-grid">
							<a class="example-image-link" href="<?php echo base_url();?>image/school/gallery-6.jpg" data-lightbox="example-set" data-title="">
								<div class="grid">
									<figure class="effect-apollo">
										<img src="<?php echo base_url();?>image/school/gallery-6.jpg" alt=""/>
											<figcaption></figcaption>
									</figure>
								</div>
							</a>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 gallery-grids-right gallery-8">
						<div class="gallery-grid">
							<a class="example-image-link" href="<?php echo base_url();?>image/school/gallery-8.jpg" data-lightbox="example-set" data-title="">
								<div class="grid">
									<figure class="effect-apollo">
										<img src="<?php echo base_url();?>image/school/gallery-8.jpg" alt=""/>
											<figcaption></figcaption>
									</figure>
								</div>
							</a>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 gallery-grids-right gallery-9">
						<div class="gallery-grid">
							<a class="example-image-link" href="<?php echo base_url();?>image/school/gallery-9.jpg" data-lightbox="example-set" data-title="">
								<div class="grid">
									<figure class="effect-apollo">
										<img src="<?php echo base_url();?>image/school/gallery-9.jpg" alt=""/>
											<figcaption></figcaption>
									</figure>
								</div>
							</a>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>

		</div>
	</div>
	<!-- //Gallery -->

	<div class="contact-w3-agileits" id="contact">
		<div class="container">
			<div class="col-md-5 contact-left-w3ls">
				<h3>Contact info</h3>
				<div class="visit">
					<div class="col-md-2 contact-icon-wthree">
						<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
					</div>
					<div class="col-md-10 contact-text-agileinf0">
						<h4>Visit us</h4>
						<h5>Parma Via Modena,BO, Italy</h5>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="mail">
					<div class="col-md-2 contact-icon-wthree">
						<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
					</div>
					<div class="col-md-10 contact-text-agileinf0">
						<h4>Mail us</h4>
						<h5><a href="mailto:info@example.com">info@example.com</a></h5>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="call">
					<div class="col-md-2 contact-icon-wthree">
						<span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
					</div>
					<div class="col-md-10 contact-text-agileinf0">
						<h4>Call us</h4>
						<h5>+18044261149</h5>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="visit">
					<div class="col-md-2 contact-icon-wthree">
						<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
					</div>
					<div class="col-md-10 contact-text-agileinf0">
						<h4>Work hours</h4>
						<h5>Mon-Sat 09:00 AM - 05:00PM</h5>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="col-md-7 contact-right-w3l">
				<h3>Leave message</h3>
				<form action="#" method="post">
					<input type="text"  class="name" name="name" placeholder="First Name" required="">
					<input type="text"  class="name" name="name" placeholder="Last Name" required="">
					<input type="text"  class="name" name="name" placeholder="Email" required="">
					<input type="text"  class="name" name="name" placeholder="Subject" required="">
					<textarea placeholder="Your Message" required=""></textarea>
					<input type="submit" value="SEND MESSAGE">
				</form>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="footer-w3l">
		<p> &copy; 2017 Inspire . All Rights Reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
	</div>
<div class="pop-up"> 
	<div id="small-dialog" class="mfp-hide book-form">
		<h3>Sign In </h3>
			<form action="#" method="post">
				<input type="text" name="Email" class="email" placeholder="Email" required=""/>
				<input type="password" name="Password" class="password" placeholder="Password" required=""/>	
				<ul>
				<li>
					<input type="checkbox" id="brand1" value="">
					<label for="brand1"><span></span>Remember me</label>
				</li>
			</ul>
            <a href="#">Forgot Password?</a><br>
			<div class="clearfix"></div>
				<input type="submit" value="Sign In">
			</form>
	</div>
</div>
<div class="pop-up"> 
	<div id="small-dialog2" class="mfp-hide book-form">
		<h3>Sign Up</h3>
			<form action="#" method="post">
				<input type="text" name="Name" placeholder="Your Name" required=""/>
				<input type="text" name="Email" class="email" placeholder="Email" required=""/>
				<input type="password" name="Password" class="password" placeholder="Password" required=""/>	
				<input type="password" name="Password" class="password" placeholder="Confirm Password" required=""/>
				<input type="submit" value="Sign Up">
			</form>
	</div>
</div>	
</body>
</html>