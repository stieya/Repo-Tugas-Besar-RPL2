<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="tempat cari magang di Indonesia">
    <meta name="author" content="UNIKOM, Ahmad Paudji, Ismail Zakky, Andrew, Handoyo, Wupi, Mahmudi">
    <title>Magang | tempat magang Mahasiswa, Bekerja, kantor, Bandung, pelajar Indonesia</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>css3/bootstrap.css" rel="stylesheet">
 	 <link rel="icon" type="image/png" href="img/logo-emagang.png"/>
    <!-- Custom Google Web Font -->
    <link href="<?php echo base_url(); ?>font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <!-- Add custom CSS here -->
    <link href="<?php echo base_url(); ?>css3/landing-page.css" rel="stylesheet">
	
	<!-- JavaScript -->
    <script src="<?php echo base_url(); ?>js2/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url(); ?>js2/bootstrap.js"></script>

<!--Scrolling Page -->	
<link rel="stylesheet" type="text/css" href="css3/jquery.fullPage.css" />
<script src="<?php echo base_url(); ?>js2/jquery-ui.min.js"></script>
<!-- This following line is needed in case of using the default easing option or when using another
 one rather than "linear" or "swing". You can also add the full jQuery UI instead of this file if you prefer -->
<script src="<?php echo base_url(); ?>js2/jquery.easings.min.js"></script>
<!-- This following line needed in the case of using the plugin option `scrollOverflow:true` -->
<script type="text/javascript" src="<?php echo base_url(); ?>js2/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js2/jquery.fullPage.js"></script>
<!--End Scrolling-->

<script type="text/javascript">
		$(document).ready(function() {
			$('#fullpage').fullpage({
				slidesColor: ['#fffff', '#FFFFFF', '#FFFFFFF', 'FFFFFF', '#FFFFFF', '#FFFFFF'],
				anchors: ['firstPage', 'secondPage', '3rdPage', '4thPage','5thPage', 'lastPage'],
				menu: '#menu',
				easing: 'easeOutBack'	
			});
			
		});
	</script>
	
	<!--LOGIN Mahasiswa-->
	
				<div class="modal fade" id="myModal-mh" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
					<div class="modal-content-Mahasiswa">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

						<h4 class="modal-title" id="myModalLabel"><i class="fa fa-users"></i> Login Mahasiswa</h4>
					  </div>
					  <div class="modal-body">
										  
										  <form class="form-horizontal" role="form">
										  <div class="form-group">
											<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
											<div class="col-sm-10">
											  <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
											</div>
										  </div>
										  <div class="form-group">
											<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
											<div class="col-sm-10">
											  <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
											</div>
										  </div>
										
										  <div class="form-group">
											<div class="col-sm-offset-2 col-sm-10">
											  
											  <button type="reset" class="btn btn-default">Ulang</button>
										
											  <button type="submit" class="btn btn-primary">Login</button>

											</div>
										  </div>
										</form>
										
					  </div>
					</div>
				  </div>
				</div>
				
		<!-- END LOGIN Mahasiswa-->

			<!--SIGN Mahsiswa-->
	
				<div class="modal fade" id="myModal-signup-mh" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
					<div class="modal-content-signup-Mahasiswa">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

						<h4 class="modal-title" id="myModalLabel"><i class="fa fa-users"></i> Sign up Mahasiswa</h4>
					  </div>
					  <div class="modal-body">
						  <form class="form-horizontal" role="form">
										  <div class="form-group">
											<label for="inputEmail3" class="col-md-2 control-label">Email</label>
											<div class="col-sm-10">
											  <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
											</div>
										  </div>
										  <div class="form-group">
											<label for="inputPassword3" class="col-md-2 control-label">Password</label>
											<div class="col-sm-10">
											  <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
											</div>
										  </div>
										  <div class="form-group">
											<div class="col-sm-offset-2 col-sm-10">
											   <button type="reset" class="btn btn-default">Ulang</button>
										
											  <button type="submit" class="btn btn-primary">Sign up</button>

											</div>
										  </div>
										</form>
					  </div>
					</div>
				  </div>
				</div>
				
		<!-- END SIGNUP Mahsiswa-->
		
		<!--LOGIN PERUSAHAAN-->
	
				<div class="modal fade" id="myModal-ph" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
					<div class="modal-content-perusahaan">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

						<h4 class="modal-title" id="myModalLabel"><i class="fa fa-user"></i> Login Perusahaan</h4>
					  </div>
					  <div class="modal-body">
						  <form class="form-horizontal" role="form">
										  <div class="form-group">
											<label for="inputEmail3" class="col-md-2 control-label">Email</label>
											<div class="col-sm-10">
											  <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
											</div>
										  </div>
										  <div class="form-group">
											<label for="inputPassword3" class="col-md-2 control-label">Password</label>
											<div class="col-sm-10">
											  <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
											</div>
										  </div>
										  <div class="form-group">
											<div class="col-sm-offset-2 col-sm-10">
											   <button type="reset" class="btn btn-default">Ulang</button>
										
											  <button type="submit" class="btn btn-primary">Login</button>

											</div>
										  </div>
										</form>
					  </div>
					</div>
				  </div>
				</div>
				
		<!-- END LOGIN PERUSAHAAN-->


			<!--SIGN PERUSAHAAN-->
	
				<div class="modal fade" id="myModal-signup-ph" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
					<div class="modal-content-signup-perusahaan">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

						<h4 class="modal-title" id="myModalLabel"><i class="fa fa-user"></i> Sign up Perusahaan</h4>
					  </div>
					  <div class="modal-body">
						  <form class="form-horizontal" role="form">
										  <div class="form-group">
											<label for="inputEmail3" class="col-md-2 control-label">Email</label>
											<div class="col-sm-10">
											  <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
											</div>
										  </div>
										  <div class="form-group">
											<label for="inputPassword3" class="col-md-2 control-label">Password</label>
											<div class="col-sm-10">
											  <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
											</div>
										  </div>
										  <div class="form-group">
											<div class="col-sm-offset-2 col-sm-10">
											   <button type="reset" class="btn btn-default">Ulang</button>
										
											  <button type="submit" class="btn btn-primary">Sign up</button>

											</div>
										  </div>
										</form>
					  </div>
					</div>
				  </div>
				</div>
				
		<!-- END SIGNUP PERUSAHAAN-->
		
	</head>
<body>
	<header>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="head">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
				<span style="background-color:#f1c40f;  padding:8px 8px; color:#fff;">Mari</span>
				<span style="background-color:#7f8c8d; padding:8px 8px; color:#fff; margin-left:0px;">magang.com</span>
				</a>
				</div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-ex1-collapse">
                <ul class="nav navbar-nav" id="menu">
                  <li data-menuanchor="firstPage" class="active"><a href="#firstPage">Beranda</a></li>
                  <li data-menuanchor="secondPage"><a href="#secondPage">Perusahaan</a></li>
                   <li data-menuanchor="3rdPage"><a href="#3rdPage">Mahasiswa</a></li>
					<li data-menuanchor="4thPage"><a href="#4thPage">Tentang</a></li>	
					<li data-menuanchor="5thPage"><a href="#5thPage">Testimoni</a></li>
					<li data-menuanchor="lastPage"><a href="#lastPage">Kontak</a></li>
                </ul>
            </div>
			
			
            <!-- /.navbar-collapse -->
        </div>
		</div>
        <!-- /.container -->
    </nav>
	</header>

	<div id="fullpage">
	<div id="section0" class="section active">
	<div class="intro-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>Mari! Kita Magang</h1>
                        <h3>Dapatkan pengalaman mengesankan bersama kami</h3>
                       
                        <ul class="list-inline intro-social-buttons">
                          
						  <li>
								<a href="<?php echo base_url();?>user/login"class="btn btn-primary btn-lg" data-toggle="modal" >
								<i class="fa fa-users fa-fw"></i> <span class="network-name">Login Mahasiswa </a>
                           
						   </li>
						   
						   <li>
								<a href="<?php echo base_url();?>company/login" class="btn btn-primary btn-lg" >
								<i class="fa fa-user fa-fw"></i> <span class="network-name">Login Perusahaan </a>
						   </li>
						   
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->
	</div>
	</div>
    <!-- /.intro-header -->

<div id="section1" class="section">

        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
          			
          			<div class="ganjil"><h1>Perusahaan</h1></div>

                    <div class="clearfix"></div>
                    <p class="lead" align="justify">

                    	Informasikan kesempatan magang perusahaan anda kepada mahasiswa/i Indonesia dan lakukan <i>monitoring</i> kinerja mereka 
                 		, mari kita bantu pemerintah Indonesia dalam 
                    	meningkatkan kualitas Sumber Daya Manusia melalui aplikasi ini. 
                    </p>

                    <a href="<?php echo base_url();?>company/signup" class="btn btn-success btn-lg">
					<i class="fa fa-user fa-fw"></i> <span class="network-name">Sign up Perusahaan</a>


                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="<?php echo base_url(); ?>img/company.gif"
                    alt="">
                </div>
            </div>
			
							
		


        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

	<div id="section2" class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
             		
             		<div class="ganjil"><h1>Mahasiswa</h1></div>
                    <div class="clearfix"></div>
                 	<p class="lead" align="justify">
                    	Cari tempat magang dengan mudah sesuai jurusan dan daerah yang kamu inginkan, kemudian langsung di <i>monitoring</i> serta dinilai kinerja kamu oleh pembimbing magang secara online melalui aplikasi ini.
                    </p>

                    <a href="<?php echo base_url();?>user/signup" class="btn btn-success btn-lg"  >
					<i class="fa fa-user fa-fw"></i> <span class="network-name">Sign up Mahasiswa</a>

                </div>
                <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                    <img class="img-responsive" src="<?php echo base_url(); ?>img/mahasiswa.jpg" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->
	</div>
	
	
    <!-- /.content-section-b -->

	<div id="section3" class="section">
 
        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-sm-6">
                 	<div class="ganjil"><h1>Tentang</h1></div>
                    <div class="clearfix"></div>
                    <p class="lead" align="justify">
                    
                    	Situs ini membantu Perusahaan yang ingin memberikan 
                    	kesempatan magang bagi mahasiswa/i Indonesia sebagai 
                    	bentuk kepedulian dalam meningkatkan kualitas SDM masyarakat, serta membantu mahasiswa/i untuk mendapatkan tempat magang yang sesuai dengan keinginan mereka.
                    </p>

                    <p class="lead" align="justify">
                   		Situs ini dibuat oleh mahasiswa/i UNIKOM Bandung jurusan Teknik Informatika dalam memenuhi syarat kelulusan tugas besar mata kuliah. 
                    </p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="<?php echo base_url(); ?>img/company.png" alt="">
                </div>
            </div>

        </section>
        <!-- /.container -->

    </div>
	</div>
    <!-- /.content-section-a -->
	
	
	<div id="section4" class="section">
 
        <div class="container">

            <div class="row">
         	<div class="ganjil"><h1 class="visible-lg">Testimoni</h1></div>
         	<div class="clearfix"></div>
         	  <div class="col-xs-12 col-sm-12 col-md-4">
	                	
	                	<blockquote class="quote-text">
		                	
		                	Aplikasi ini membuat aku gak bingung pas cari 
		                	tempat magang yang sesuai keinginan ku, dengan aplikasi ini aku telah diterima magang dan langsung diterima kerja setelah aku lulus kuliah, hasilnya Luar Biasa.

	                	</blockquote>
	                	<img class="quote-author-pic" src="<?php echo base_url(); ?>img/testimoni/foto.jpg">
	                	<p class="quote-author"><strong>Asih Joko P | UNIKOM </strong></a></p>

                </div>

                <div class="col-xs-12 col-sm-6 col-md-4">
	                	<blockquote class="quote-text">

	                		Benar-benar sangat membantu sekali untuk melihat kinerja kerja aku selama magang, pembimbing aku meskipun sering pulang pergi luar kota, dia bisa tetap monitor aku dari jauh, Terima kasih Marimagang.com
	                	</blockquote>

	                	<img class="quote-author-pic" src="<?php echo base_url(); ?>img/testimoni/foto (1).jpg">
	                	<p class="quote-author"><strong>Vicy Adhani | UNPAS </strong></a></p>
                	</div>

              	  <div class="col-xs-12 col-sm-6 col-md-4">
	                	<blockquote class="quote-text" >
	                		Sangat inovatif banget sih nih aplikasi, aku daftar kemudian login eh... langsung deh keterima untuk magang di Chevron Balikpapan seperti yang aku inginkan, dan yang paling aku senang ketika aku keterima kerja langsung.
	                	</blockquote>

	                	<img class="quote-author-pic" src="<?php echo base_url(); ?>img/testimoni/foto (2).jpg">
	                	<p class="quote-author"><strong>Wati Fitria | ITB </strong></a></p>
                	</div>
            
                </div>
            </div>

        </div>
        <!-- /.container -->

 


    <!-- /.content-section-a -->
	
	
	
	<div id="section5" class="section">
    <!-- /.content-section-a -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="visible-lg">
					<span style="background-color:#f1c40f;  padding:10px 10px; color:#fff; font-size:30px;">Mari</span>
					<span style="background-color:#7f8c8d; padding:10px 10px; color:#fff; margin-left:0px; font-size:30px;">magang.com</span>
					</div>
					 <ul class="list-inline banner-social-buttons">
                        <li><a href="https://twitter.com/ahmadpaudji" class="btn btn-primary btn-sm" target="_blank"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                        
                        <a href="https://facebook.com/ahmadpaudji" class="btn btn-primary btn-sm" target="_blank"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
                        </li>
                    </ul>
					
					
					<p class="footer-address">
						Indonesia <br>
						<small>Jalan Titiran No.2, Bandung</small><br>
						<small>0857 5222 5126</small><br>
						<small>ahmadpaudji@gmail.com</small><br>
					</p>
					 
				
					
                </div>
				
                <div class="col-lg-6">
					<h3 class="number">00000000</h3> <h4>Pengunjung</h4>
					<h3 class="number">00000000</h3> <h4>Pengguna</h4>
					<h3 class="number">00000000</h4> <h4>Pengguna Online</h4>
					
                </div>
					
					
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.banner -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li><a href="#firstPage">Beranda</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li><a href="#secondPage">Perusahaan</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li><a href="#3rdPage">Mahasiswa</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li><a href="#4thPage">Tentang</a>
                        </li>
						<li class="footer-menu-divider">&sdot;</li>
                        <li><a href="#faq">FAQ</a>
                        </li>
						<li class="footer-menu-divider">&sdot;</li>
                        <li><a href="#help">Bantuan</a>
                        </li>
						
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; Ozan Soft Teknologi Utama 2014. All Rights Reserved</p>

                    
                    	<img src="<?php echo base_url(); ?>img/media.gif" class="col-lg-5 col-sm-6" id="media">
                    
                </div>
            </div>
        </div>
    </footer>
				</div>

	

</body>

</html>
