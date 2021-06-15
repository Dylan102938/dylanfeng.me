<?php
    require_once("config.php");
    
    $SITE_KEY = "6Ld-PsQZAAAAAJPAnHt-6uHpkkXsFxhDUHA_slqS";
    
    $sql = "SELECT * FROM work ORDER BY created_at DESC";
    $experiences = [];
    if ($stmt = mysqli_prepare($link, $sql)) {
        $stmt->execute();
	$result = $stmt->get_result();
	$experiences = $result->fetch_all(MYSQLI_ASSOC);

	mysqli_stmt_close($stmt);
    }

    $experiences_html = "";
    for ($i = 0; $i < sizeof($experiences); $i++) {
	$experiences_html .= "<li>
				<span></span>
				<div class='media'>
				  <div class='d-flex'>
				    <p>".$experiences[$i]['start']." to ".$experiences[$i]['end']."</p>
				  </div>
				  <div class='media-body'>
				    <h4>".$experiences[$i]['organization']."</h4>
				    <p>".$experiences[$i]['position']." <br />".$experiences[$i]['location']."</p>
				  </div>
				</div>
			      </li>";
    }

    $sql = "SELECT * FROM education ORDER BY created_at DESC";
    $education = [];
    if ($stmt = mysqli_prepare($link, $sql)) {
        $stmt->execute();
	$result = $stmt->get_result();
	$education = $result->fetch_all(MYSQLI_ASSOC);

	mysqli_stmt_close($stmt);
    }

    $education_html = "";
    for ($i = 0; $i < sizeof($education); $i++) {
        $education_html .= "<li>
				<span></span>
				<div class='media'>
				  <div class='d-flex'>
				    <p>".$education[$i]['start']." to ".$education[$i]['end']."</p>
				  </div>
				  <div class='media-body'>
				    <h4>".$education[$i]['organization']."</h4>
				    <p>Classes: ".$education[$i]['classes']." <br />GPA: ".$education[$i]['gpa']."</p>
				  </div>
				</div>
			      </li>";
    }		    

    $sql = "SELECT * FROM projects ORDER BY created_at DESC";
    $projects = [];
    if ($stmt = mysqli_prepare($link, $sql)) {
        $stmt->execute();
	$result = $stmt->get_result();
	$projects = $result->fetch_all(MYSQLI_ASSOC);

	mysqli_stmt_close($stmt);
    }
    $projects_html = "";
    for ($i = 0; $i < sizeof($projects); $i++) {
	    $projects_html .= "<div class='col-lg-4 col-md-4 col-sm-6 ".$projects[$i]['tags']."'>
        		     <div class='h_gallery_item'>
        		       <div class='g_img_item'>
        		         <img class='img-fluid' src='".$projects[$i]['image']."' alt=''>
        			 <a class='anchor' target='_blank' href='".$projects[$i]['button_link']."'><i class='lnr lnr-link' style='font-size:60px; color: white;'></i></a>
        		       </div>
        		       <div class='g_item_text'>
        		         <h4>".$projects[$i]['title']."</h4>
        			 <p>".$projects[$i]['date_of_completion']."</p>
        		       </div>
        		      </div>
        		    </div>";
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/favicon.png" type="image/png">
	<title>Dylan Feng</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="vendors/linericon/style.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="vendors/animate-css/animate.css">
        <link rel="stylesheet" href="vendors/popup/magnific-popup.css">
        <link rel="stylesheet" href="vendors/flaticon/flaticon.css">
        <!-- main css -->
        <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/responsive.css">
	<style type="text/css">
	    .anchor {
            	position: absolute;
	        left: 0px;
	        top: 50%;
	        transform: translateY(-50%);
	        width: 100%;
		text-align: center;
		opacity: 0;
            }
	</style>
    </head>
    <body>
        
        <!--================Header Menu Area =================-->
        <header class="header_area">
            <div class="main_menu">
            	<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container box_1620">
						<!-- Brand and toggle get grouped for better mobile display -->
						<a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" style="height:40px;" alt=""></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
							<ul class="nav navbar-nav menu_nav ml-auto">
								<li class="nav-item"><a class="nav-link" href="#about-me">About</a></li> 
								<li class="nav-item"><a class="nav-link" href="#experiences">Experiences</a></li> 
								<li class="nav-item"><a class="nav-link" href="#projects">Projects</a></li>
								<li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
							</ul>
						</div> 
					</div>
            	</nav>
            </div>
        </header>
        <!--================Header Menu Area =================-->
        
        <!--================Home Banner Area =================-->
        <section class="home_banner_area">
           	<div class="container box_1620">
           		<div class="banner_inner d-flex align-items-center">
					<div class="banner_content">
						<div class="media">
							<div class="d-flex">
								<img src="img/personal.jpg" style="border-radius:12px;" alt="">
							</div>
							<div class="media-body">
								<div class="personal_text">
									<h6>Hi there, Nice to meet you! I'm</h6>
									<h3>Dylan<br>Feng</h3>
									<h4>Student at UC Berkeley</h4>
									<p>Hi! My name's Dylan, and I'm a college student looking to hone my skills and learn through hands-on experiences. I'm currently pursuing a Computer Science Bachelor's and am looking forward to working with new people and learning from new experiences! </p>
									<ul class="list basic_info">
										<li><a href="#"><i class="lnr lnr-calendar-full"></i> Graduation: June 2023</a></li>
										<li><a href="#"><i class="lnr lnr-phone-handset"></i> +1 (510) 516-8659</a></li>
										<li><a href="#"><i class="lnr lnr-envelope"></i> dylan.feng.01@gmail.com</a></li>
										<li><a href="./resume.pdf" target="_blank" style="color: #766dff;"><i class="lnr lnr-bookmark"></i> My Resume</a></li>
									</ul>
									<ul class="list personal_social">
										<li><a href="https://github.com/Dylan102938" target="_blank"><i class="fa fa-github"></i></a></li>
										<li><a href="https://www.linkedin.com/in/dylan-feng-0aa2a0168/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Welcome Area =================-->
        <section class="welcome_area p_120" id="about-me">
        	<div class="container">
        		<div class="row welcome_inner">
        			<div class="col-lg-6">
        				<div class="welcome_text">
        					<h4>About Me</h4>
						<p>In addition to the CS theory I've learned at school, I've been honing my skills in full-stack development for 3 years now. I primarily use the LAMP and MEAN stacks when working on professional projects for clients, but I love working on side projects at hackathons, during school projects, or even just in my free time!</p>
        					<div class="row">
        						<div class="col-md-4">
        							<div class="wel_item">
        								<i class="lnr lnr-database"></i>
        								<h4>$10,000+</h4>
									<p>Earned</p>
        							</div>
        						</div>
        						<div class="col-md-4">
        							<div class="wel_item">
        								<i class="lnr lnr-book"></i>
        								<h4>40+</h4>
        								<p>Total Projects</p>
        							</div>
        						</div>
        						<div class="col-md-4">
        							<div class="wel_item">
        								<i class="lnr lnr-chart-bars"></i>
        								<h4>4.00</h4>
        								<p>GPA</p>
        							</div>
        						</div>
        					</div>
        				</div>
        			</div>
        			<div class="col-lg-6">
        				<div class="tools_expert">
        					<div class="skill_main">
								<div class="skill_item">
									<h4>Python <span class="counter">95</span>%</h4>
									<div class="progress_br">
										<div class="progress">
											<div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
								</div>
								<div class="skill_item">
									<h4>Javascript <span class="counter">90</span>%</h4>
									<div class="progress_br">
										<div class="progress">
											<div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
								</div>
								<div class="skill_item">
									<h4>Java <span class="counter">85</span>%</h4>
									<div class="progress_br">
										<div class="progress">
											<div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
								</div>
								<div class="skill_item">
									<h4>C/C++ <span class="counter">70</span>%</h4>
									<div class="progress_br">
										<div class="progress">
											<div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
								</div>
								<div class="skill_item">
									<h4>Linux/Unix <span class="counter">90</span>%</h4>
									<div class="progress_br">
										<div class="progress">
											<div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
								</div>
							</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Welcome Area =================-->
        
        <!--================My Tabs Area =================-->
        <section class="mytabs_area p_120" id="experiences">
        	<div class="container">
        		<div class="tabs_inner">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">My Work</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">My Education</a>
						</li>
					</ul>
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
							<ul class="list">
								<?php echo $experiences_html; ?>
							</ul>
						</div>
						<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
							<ul class="list">
								<?php echo $education_html; ?>
							</ul>
						</div>
					</div>
        		</div>
        	</div>
        </section>
        <!--================End My Tabs Area =================-->
        
        <!--================Home Gallery Area =================-->
        <section class="home_gallery_area p_120" id="projects">
        	<div class="container">
        		<div class="main_title">
        			<h2>My Projects</h2>
        			<p>A gallery of some cool things I've made this year</p>
        		</div>
        		<div class="isotope_fillter">
        			<ul class="gallery_filter list">
						<li class="active" data-filter="*"><a href="#">All</a></li>
						<li data-filter=".freelance"><a href="#">Freelance</a></li>
						<li data-filter=".school"><a href="#">School</a></li>
						<li data-filter=".aiml"><a href="#">AI/ML</a></li>
						<li data-filter=".design"><a href="#">System Design</a></li>
					</ul>
        		</div>
        	</div>
        	<div class="container">
        		<div class="gallery_f_inner row imageGallery1">
				<?php echo $projects_html; ?>
        		</div>
        	</div>
        </section>
        <!--================End Home Gallery Area =================-->
        
        <!--================Contact Me Area =================-->
        <section class="testimonials_area p_120" id="contact">
        	<div class="container">
        		<div class="main_title">
        			<h2>Contact Me</h2>
        			<p>Have a question or want to get in touch? Fill out the form below.</p>
        		</div>
        		<div class="contact_inner">
				<form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
				    <div class="col-md-6">
					<div class="form-group">
					    <input type="text" class="form-control" name="name" id="name" name="name" placeholder="Enter your name">
					</div>
					<div class="form-group">
					    <input type="email" class="form-control" name="email" id="email" name="email" placeholder="Enter email address">
					</div>
					<div class="form-group">
					    <input type="text" class="form-control" name="subject" id="subject" name="subject" placeholder="Enter Subject">
					</div>
				    </div>
				    <div class="col-md-6">
					<div class="form-group">
					    <textarea class="form-control" name="message" id="message" rows="1" placeholder="Enter Message"></textarea>
					</div>
				    </div>
				    <div class="col-md-12 text-right">
					<fieldset>
                                            <div class="g-recaptcha" data-sitekey="<?php echo $SITE_KEY; ?>"></div>
                                        </fieldset>
					<button type="submit" name="submit-contact" value="submit" class="btn submit_btn">Send Message</button>
				    </div>
				</form>
        		</div>
        	</div>
        </section>
        <!--================End Testimonials Area =================-->
       	
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.3.1.min.js"></script>

    	<script>
		var navigation = $('nav');
        
		//when a nav link is clicked, smooth scroll to the section
		navigation.on('click', 'a', function(event){
		    event.preventDefault(); //prevents previous event
		    smoothScroll($(this.hash));
		});

		function smoothScroll(target){
		    $('body,html').animate({
			scrollTop: target.offset().top
		    }, 800);
		} 
   	</script>
	
	<script src="js/popper.js"></script>
	<script src="https://www.google.com/recaptcha/api.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/stellar.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope.pkgd.min.js"></script>
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="vendors/popup/jquery.magnific-popup.min.js"></script>
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="vendors/counter-up/jquery.waypoints.min.js"></script>
        <script src="vendors/counter-up/jquery.counterup.min.js"></script>
        <script src="js/mail-script.js"></script>
        <script src="js/theme.js"></script>
    </body>
</html>
