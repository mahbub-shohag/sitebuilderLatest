<?php //print_r($menus);exit(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Search ,  Build And Host your website</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Vide" />
<meta name="keywords" content="Big store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="<?php echo base_url();?>/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="<?php echo base_url();?>/css/style.css" rel='stylesheet' type='text/css' />
<!-- js -->
   <script src="<?php echo base_url();?>/js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="<?php echo base_url();?>/js/move-top.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
<!--- start-rate---->
<script src="<?php echo base_url();?>/js/jstarbox.js"></script>
	<link rel="stylesheet" href="<?php echo base_url();?>/css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
		<script type="text/javascript">
			jQuery(function() {
			jQuery('.starbox').each(function() {
				var starbox = jQuery(this);
					starbox.starbox({
					average: starbox.attr('data-start-value'),
					changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
					ghosting: starbox.hasClass('ghosting'),
					autoUpdateAverage: starbox.hasClass('autoupdate'),
					buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
					stars: starbox.attr('data-star-count') || 5
					}).bind('starbox-value-changed', function(event, value) {
					if(starbox.hasClass('random')) {
					var val = Math.random();
					starbox.next().text(' '+val);
					return val;
					} 
				})
			});
		});
		</script>
<!---//End-rate---->

</head>
<body>
<a href="offer.html"><img src="images/download.png" class="img-head" alt=""></a>
<div class="header">

		<div class="container">
			
			<div class="logo">
				<h1 ><a href="index.html"><b>T<br>H<br>E</b>Mini Bangladesh<span>We are free and always will be.</span></a></h1>
			</div>
			<div class="head-t">
				<ul class="card">
                                        
					<li><a href="<?php echo base_url();?>/index.php/Main_Site/login"><i class="fa fa-user" aria-hidden="true"></i>Login</a></li>
					<li><a href="<?php echo base_url();?>/index.php/Main_Site/registration" ><i class="fa fa-arrow-right" aria-hidden="true"></i>Register</a></li>
				</ul>	
			</div>
			
			<div class="header-ri">
				<ul class="social-top">
					<li><a href="#" class="icon facebook"><i class="fa fa-facebook" aria-hidden="true"></i><span></span></a></li>
					<li><a href="#" class="icon twitter"><i class="fa fa-twitter" aria-hidden="true"></i><span></span></a></li>
					<li><a href="#" class="icon pinterest"><i class="fa fa-pinterest-square" aria-hidden="true"></i><span></span></a></li>
					<li><a href="#" class="icon dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i><span></span></a></li>
				</ul>	
			</div>
		

				<div class="nav-top">
					<nav class="navbar navbar-default">
					
					<div class="navbar-header nav_2">
						<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						

					</div> 
					<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
						<ul class="nav navbar-nav ">
							<li class=" active"><a href="index.html" class="hyper "><span>Home</span></a></li>	
									<?php 
                                                                       $all_menus=$menus; 
                                          foreach ($menus as $group)
                                          {
                                              if($group['parent']==1)
                                              {    
                                              $group_name = $group['slug'];
                                              $group_id = $group['id'];
                                              echo '<li class="dropdown">';
                                              echo '<a href="#" class="dropdown-toggle hyper" data-toggle="dropdown" ><span>'.$group['slug'].'<b class="caret"></b></span></a>'; //Group
                                              echo '<ul class="dropdown-menu multi">';
                                              echo '<div class="row">';
                                              category($all_menus, $group_name,$group_id);
                                              echo '</div>';
                                              echo '</ul>';
                                              echo '</li>';
                                              
                                              }
                                              }
                                              
                                              function category($all_menus,$group_name,$group_id)
                                              {?>
                                                                                
                                                                                <?php 
                                                                                $all_menus=$all_menus;
                                                                                $menus=$all_menus;
                                                                                foreach ($menus as $cat)
                                                                                  {
                                                                                    if($cat['parent']==$group_id)
                                                                                    {
                                                                                    $cat_id=$cat['id'];    
                                                                                ?>
                                                                                  
                                                        
                                                                              <div class="col-sm-3">
                                                                                    <a style="color: green" href="hold.html"><i class="fa fa-angle-right" aria-hidden="true"></i><?php echo $cat['slug'];?></a>
										<ul class="multi-column-dropdown">	
										  <?php subcategory($all_menus,$cat_id); ?>
                                                                                </ul>
										</div> 
                                                        
                                                        
                                                                                  <?php }
                                                                                  
                                                                                    }
                                              }
                                              
                                              
                                              function subcategory($menus,$cat_id)
                                              {
                                                  //print_r($menus);
                                                  //echo $cat_id;
                                                  foreach ($menus as $sub)
                                                  {
                                                      //echo $sub['parent']."</br>";
                                                      if($sub['parent']==$cat_id)
                                                      {
                                                          
                                                          echo '<li><a href="'.base_url()."index.php/Main_site/websites_list_subcategorywise?id=".$sub['id'].'"> <i class="fa fa-angle-right" aria-hidden="true"></i>'.$sub['slug'].' </a></li>';
                                                      }
                                                  }
                                              }
                                                                                ?>
							
						</ul>
					</div>
					</nav>
					 <div class="cart" >
					
						<span class="fa fa-shopping-cart my-cart-icon"><span class="badge badge-notify my-cart-badge"></span></span>
					</div>
					<div class="clearfix"></div>
				</div>
					
				</div>			
</div>
  <!---->