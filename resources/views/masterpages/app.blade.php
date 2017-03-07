<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

     <!--styles-->

    <link type="text/css" href="assets/metro/css/metro.css" rel="stylesheet">
    <link type="text/css" href="assets/metro/css/metro-icons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('static/css/reset.css')}}"> <!-- CSS reset -->

    <link href="{{asset('static/bodo/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('static/bodo/css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('static/bodo/css/owl.theme.css')}}" rel="stylesheet">
    <link href="{{asset('static/bodo/css/magnific-popup.css')}}" rel="stylesheet">
    
    <link href="{{asset('static/bodo/css/responsive.css')}}" rel="stylesheet">


    <link rel="stylesheet" href="http://cdn.metroui.org.ua/css/metro.min.css">

	<link rel="stylesheet" href="{{asset('static/css/navstyle.css')}}"> <!-- Resource style -->
	<script src="{{asset('static/js/modernizr.js')}}"></script> <!-- Modernizr -->

    <link href="{{asset('static/bodo/css/style.css')}}" rel="stylesheet">


      <!--fonts google-->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
    
    <!--[if lt IE 9]>
       <script type="text/javascript" src="js/html5shiv.min.js"></script>
    <![endif]-->

    <style>

        .title-small, .title-small-center{
            color : #ffb300;
            font-size : 21px;
        }

        .footer-bottom {
            background: #2f2f2f;
            padding: 50px 0;
            color: #636363;
        }

        .bg-about {
            background: url('http://placehold.it/1440x768&amp;text=IMAGE+PLACEHOLDER');
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            background-repeat: no-repeat;
            position: relative;
            padding: 0;
            margin: 0;
            min-height: 660px;
            width: 100%;
            height: 100%;
            float: left;    
        }

    </style>

  	
	<title>LMJF | Acceuil</title>
</head>
<body>

     <!--PRELOADER-->
    <div id="preloader">
      <div id="status">
        {{-- <img alt="logo" src="images/logo-big.png"> --}}
      </div>
    </div>
    <!--/.PRELOADER END-->

       <!--HEADER -->
    <div class="header" style="display:none !important;">
      {{-- <div class="for-sticky">
        <!--LOGO-->
        <div class="col-md-2 col-xs-6 logo">
          <a href="index.html"><img alt="logo" class="logo-nav" src="images/logo.png"></a>
        </div>
        <!--/.LOGO END-->
      </div> --}}
      <div class="menu-wrap">
        <nav class="menu">
          <div class="menu-list">
            <a data-scroll="" href="#home" class="active">
              <span>Home</span>
            </a>
            <a data-scroll="" href="#about">
              <span>About</span>
            </a>
            <a data-scroll="" href="#work">
              <span>Work</span>
            </a>
             <a data-scroll="" href="#services">
              <span>Services</span>
            </a>
            <a data-scroll="" href="#employement">
              <span>Employement</span>
            </a>
            <a data-scroll="" href="#skill">
              <span>Skills</span>
            </a>
            <a data-scroll="" href="#education">
              <span>Education</span>
            </a>
            <a data-scroll="" href="#testimonial">
              <span>Testimonial</span>
            </a>
            <a data-scroll="" href="#blog">
              <span>Blog</span>
            </a>
            <a data-scroll="" href="#contact">
              <span>Contact</span>
            </a>
          </div>
        </nav>
        <button class="close-button" id="close-button">Close Menu</button>
      </div>
      <button class="menu-button" id="open-button">
        <span></span>
        <span></span>
        <span></span>
      </button><!--/.for-sticky-->
  
    </div>
    <!--/.HEADER END-->

	<header class="cd-main-header">
		<a class="cd-logo" href="#"><img src="{{asset('img/logolmjjf.png')}}" alt="Logo"></a>

		<ul class="cd-header-buttons">
			<li><a class="cd-search-trigger" href="#cd-search"><span></span></a></li>
			<li><a class="cd-nav-trigger" href="#cd-primary-nav"><span></span></a></li>
		</ul> <!-- cd-header-buttons -->
	</header>
  
	<main class="cd-main-content">

                 <!--ABOUT-->
                    <section id="about">
                        <div class="content">
                            <div class="col-md-7 col-xs-12">
                               <div class="bg-about"></div>
                            </div>
                            <div class="col-md-5 col-sm-12 col-xs-12 white-col">
                                <div class="row">
                                <!--OWL CAROUSEL2-->
                                <div class="owl-carousel2" style="height:100% !important;">
                                    <div class="col-md-12">
                                        <div class="wrap-about">
                                            <div class="w-content">
                                                <p class="head-about">
                                                    Design is the method of putting form and content together. Design, just as art, has multiple definitions there is no single definition. Design can be art. Design can be aesthetics. Design is so simple, that's why it is so complicated.
                                                </p>
                                                
                                                <h5 class="name">
                                                   Le Proviseur
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                                <!--/.OWL CAROUSEL2 END-->
                                </div>
                            </div>
                        </div>
                    
                    </section>
                <!--/.ABOUT END-->

                 <!--WORK-->
                    <section class="grey-bg" >
                        <div class="container">
                            <div class="row">

                             <div class="col-md-3">
                                    <h3 class="title-small">
                                    <span>Nos installations</span>
                                    </h3>
                                    <p class="content-detail">
                                    Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. <br><br>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros.
                                    </p>
                               </div>
                            
                                <div class="col-md-9 content-right">
                                    <!--PORTFOLIO IMAGE-->
                                    <ul class="portfolio-image">
                                    <li class="col-md-6">
                                        <a href="images/bw-1.png"><img alt="image" src="http://placehold.it/320x295&amp;text=IMAGE+PLACEHOLDER">
                                        <div class="decription-wrap">
                                            <div class="image-bg">
                                            <p class="desc">Bibliotheque</p>
                                            </div>

                                        </div>
                                        </a>
                                    </li>
                                    <li class="col-md-6">
                                        <a href="images/bw-2.png"><img alt="image" src="http://placehold.it/320x295&amp;text=IMAGE+PLACEHOLDER">
                                        <div class="decription-wrap">
                                            <div class="image-bg">
                                            <p class="desc">
                                                Salle informatique
                                            </p>
                                            </div>
                                        </div>
                                        </a>
                                    </li>
                                    <li class="col-md-6">
                                        <a href="images/bw-3.png"><img alt="image" src="http://placehold.it/320x295&amp;text=IMAGE+PLACEHOLDER">
                                        <div class="decription-wrap">
                                            <div class="image-bg">
                                            <p class="desc">
                                                Black Mug
                                            </p>
                                            </div>
                                        </div>
                                        </a>
                                    </li>
                                    <li class="col-md-6">
                                        <a href="images/bw-4.png"><img alt="image" src="http://placehold.it/320x295&amp;text=IMAGE+PLACEHOLDER">
                                        <div class="decription-wrap">
                                            <div class="image-bg">
                                            <p class="desc">
                                                Notebook Mockup
                                            </p>
                                            </div>
                                        </div>
                                        </a>
                                    </li>
                                    <li class="col-md-6">
                                        <a href="images/bw-5.png"><img alt="image" src="http://placehold.it/320x295&amp;text=IMAGE+PLACEHOLDER">
                                        <div class="decription-wrap">
                                            <div class="image-bg">
                                            <p class="desc">
                                                Complexe sportif
                                            </p>  
                                            </div>
                                        </div>
                                        </a>
                                    </li>
                                    <li class="col-md-6">
                                        <a href="images/bw-6.png"><img alt="image" src="http://placehold.it/320x295&amp;text=IMAGE+PLACEHOLDER">
                                        <div class="decription-wrap">
                                            <div class="image-bg">
                                            <p class="desc">
                                                Cantine scolaire
                                            </p>
                                            </div>
                                        </div>
                                        </a>
                                    </li>
                                    </ul>
                                    <!--/.PORTFOLIO IMAGE END-->
                                </div>
                               

                            </div>
                        </div>
                    </section>
                 <!--/.WORK END-->

                 <!--SERVICES-->
                    <section class="white-bg">
                        <div class="container">
                             <div class="presenter" data-role="presenter" data-height="170" data-easing="swing" style="height: 170px; width: 100%;">
                        <div class="scene">
                       
                            <div class="act fg-black" style="display: none;">
                                {{-- <img src="http://placehold.it/1440x600&amp;text=IMAGE+PLACEHOLDER" class="actor" data-position="10,10" style="height: 200px; opacity: 1; position: absolute; display: block; left: 10px; top: 10px;"> --}}
                                <h1 class="actor" data-position="10,0" style="opacity: 1; position: absolute; display: block; top: 10px;"> Lorem Ipsum  Startup</h1>
                                <p class="actor" data-position="100,0" style="opacity: 1; position: absolute; display: block; top: 100px;">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book..</p>
                                <p class="actor" data-position="130,0" style="opacity: 1; position: absolute; display: block;  top: 130px;"></p>
                            </div>
                            <div class="act fg-blacke" style="display: none;">
                                {{-- <img src="http://placehold.it/1440x600&amp;text=IMAGE+PLACEHOLDER" class="actor" data-position="10,10" style="height: 200px; opacity: 1; position: absolute; display: block; top: 10px; left: 10px;"> --}}
                                <h1 class="actor" data-position="10,0" style="opacity: 1; position: absolute; display: block; left: 300px; top: 10px;">The standard Lorem Ipsum </h1>
                                <p class="actor padding-top" data-position="100,0" style="opacity: 1; position: absolute; display: block; top: 100px;">The standard chunk of Lorem Ipsum used
                                 since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from
                                 "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied
                                 by English versions from the 1914 translation by H. Rackham.
                                </p>
                            </div> 
                        </div> <!-- end scene -->
                        
                    </div> <!-- end presenter -->
                        </div>
                    </section>
                <!--/.SERVICES END-->


                <!--BLOG-->
                <section class="grey-bg" id="blog">
                    <div class="container">
                        <div class="row">
                        <div class="col-md-12">
                            <h3 class="title-small-center text-center">
                            <span>Mur de l’excellence  </span>
                            </h3>
                            <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <p class="content-details text-center">
                                    Nos élèves en valeur sur le Mur de l’excellence            
                                </p>
                            </div>
                            </div>
                            <!--GRID BLOG-->
                            <div class="grid">
                            <div class="grid-item">
                                <div class="wrap-article">
                                <img alt="blog-1" class="img-circle text-center" src="http://placehold.it/320x295&amp;text=IMAGE+PLACEHOLDER">
                                <p class="subtitle fancy">
                                    {{-- <span>09/01/2015</span> --}}
                                </p>
                                <a href="#">
                                    <h3 class="title">
                                    Lorem ipsum 
                                    </h3>
                                </a>
                                <p class="content-blog">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation.
                                </p>
                                </div>
                            </div>

                            <div class="grid-item">
                                <div class="wrap-article">
                                <img alt="blog-4" class="img-circle text-center" src="http://placehold.it/320x295&amp;text=IMAGE+PLACEHOLDER">
                                <p class="subtitle fancy">
                                    {{-- <span>08/20/2015</span> --}}
                                </p>
                                <a href="#">
                                    <h3 class="title">
                                    Lorem ipsum
                                    </h3>
                                </a>
                                <p class="content-blog">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. 
                                </p>
                                </div>
                            </div>

                            <div class="grid-item">
                                <div class="wrap-article">
                                <img alt="blog6" class="img-circle text-center" src="http://placehold.it/320x295&amp;text=IMAGE+PLACEHOLDER">
                                <p class="subtitle fancy">
                                    {{-- <span>08/11/2015</span> --}}
                                </p>
                                <a href="#">
                                    <h3 class="title">
                                   Lorem ipsum
                                    </h3>
                                </a>
                                <p class="content-blog">
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. 
                                </p>
                                </div>
                            </div>
                            
                            <div class="grid-item">
                                <div class="wrap-article">
                                <img alt="blog2" class="img-circle text-center" src="http://placehold.it/320x295&amp;text=IMAGE+PLACEHOLDER">
                                <p class="subtitle fancy">
                                    {{-- <span>08/03/2015</span> --}}
                                </p>
                                <a href="#">
                                    <h3 class="title">
                                    Lorem ipsum
                                    </h3>
                                </a>
                                <p class="content-blog">
                                    {{-- Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.  --}}
                                </p>
                                </div>
                            </div>

                            <div class="grid-item">
                                <div class="wrap-article">
                                <img alt="blog5" class="img-circle text-center" src="http://placehold.it/320x295&amp;text=IMAGE+PLACEHOLDER">
                                <p class="subtitle fancy">
                                    {{-- <span>07/26/2015</span> --}}
                                </p>
                                <a href="#">
                                    <h3 class="title">
                                    Lorem ipsum
                                    </h3>
                                </a>
                                <p class="content-blog">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. 
                                </p>
                                </div>
                            </div>

                            <div class="grid-item">
                                <div class="wrap-article">
                                <img alt="blog-3" class="img-circle text-center" src="http://placehold.it/320x295&amp;text=IMAGE+PLACEHOLDER">
                                <p class="subtitle fancy">
                                    {{-- <span>08/03/2015</span> --}}
                                </p>
                                <a href="#">
                                    <h3 class="title">
                                    Lorem ipsum
                                    </h3>
                                </a>
                                <p class="content-blog">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit.
                                </p>
                                </div>
                            </div>                  

                            </div>
                            <!--/.GRID BLOG END-->
                        </div>
                        </div>
                    </div>
                </section>
                <!--/.BLOG END-->

                <footer>
                    <div class="footer-top">
                        <ul class="socials">
                        <li class="facebook">
                            <a href="#" data-hover="Facebook">Facebook</a>
                        </li>
                        <li class="twitter">
                            <a href="#" data-hover="Twitter">Twitter</a>
                        </li>
                        <li class="gplus">
                            <a href="#" data-hover="Google +">Google +</a>
                        </li>
                        </ul>
                    </div>

                    <div class="footer-bottom">
                        <div class="container">

                        <div class="row">
                            <div class="align-left">
                                <p>© 2017 Lycée Jeunes filles de Bouaké. Tous droits reservés </p>
                            </div>
                        </div>
                        </div>
                    </div>
                    </footer>
                    <!--/.FOOTER-END-->

	</main>

	<div class="cd-overlay"></div>

	<nav class="cd-nav">
		<ul id="cd-primary-nav" class="cd-primary-nav">


			<li class="has-children">
				<a href="#">Vie scolaire</a>
				<ul class="cd-nav-icons is-hidden">
					<li class="go-back"><a href="#0">Menu</a></li>
					{{-- <li class="see-all"><a href="#">Browse Services</a></li> --}}
					<li>
						<a class="cd-nav-item item-1" href="#">
							<h3>Vie scolaire #1</h3>
							<p>This is the item description</p>
						</a>
					</li>

					<li>
						<a class="cd-nav-item item-2" href="#">
							<h3>Vie scolaire #2</h3>
							<p>This is the item description</p>
						</a>
					</li>

					<li>
						<a class="cd-nav-item item-3" href="#">
							<h3>Vie scolaire #3</h3>
							<p>This is the item description</p>
						</a>
					</li>

					<li>
						<a class="cd-nav-item item-4" href="#">
							<h3>Vie scolaire #4</h3>
							<p>This is the item description</p>
						</a>
					</li>

					<li>
						<a class="cd-nav-item item-5" href="#">
							<h3>Vie scolaire #5</h3>
							<p>This is the item description</p>
						</a>
					</li>

					<li>
						<a class="cd-nav-item item-6" href="#">
							<h3>Vie scolaire #6</h3>
							<p>This is the item description</p>
						</a>
					</li>

					<li>
						<a class="cd-nav-item item-7" href="#">
							<h3>Vie scolaire #7</h3>
							<p>This is the item description</p>
						</a>
					</li>

					<li>
						<a class="cd-nav-item item-8" href="#">
							<h3>Vie scolaire #8</h3>
							<p>This is the item description</p>
						</a>
					</li>
				</ul>
			</li>

			
            <li class="has-children">
				<a href="#">Informations pratiques</a>

				<ul class="cd-secondary-nav is-hidden">
					<li class="go-back"><a href="#0">facilisis at</a></li>
					<li class="see-all"><a href="#">All facilisis atClothing</a></li>
					<li class="has-children">
						<a href="#">Accefacilisis atssories</a>

						<ul class="is-hidden">
							<li class="go-back"><a href="#0">facilisis at</a></li>
							<li class="see-all"><a href="#">All</a></li>
							<li class="has-children">
								<a href="#0">facilisis at</a>

								<ul class="is-hidden">
									<li class="go-back"><a href="#0">Accfacilisis atessories</a></li>
									<li class="see-all"><a href="#">All Befacilisis atnies</a></li>
									<li><a href="#">Gifacilisis atfts</a></li>
									<li><a href="#">Scarvesfacilisis atods</a></li>
								</ul>
							</li>
							<li class="has-children">
								<a href="#0">Cafacilisis atps &amp;</a>

								<ul class="is-hidden">
									<li class="go-back"><a href="#0">facilisis at</a></li>
									<li class="see-all"><a href="#">facilisis at</a></li>
									<li><a href="#">Befacilisis atanies</a></li>
									<li><a href="#">Cfacilisis ataps</a></li>
									<li><a href="#">Hafacilisis atts</a></li>
								</ul>
							</li>
							<li><a href="#">facilisis at</a></li>
							<li><a href="#">Glovfacilisis ates</a></li>
							<li><a href="#">Jewelfacilisis atlery</a></li>
							<li><a href="#">Sfacilisis atcarves</a></li>
							<li><a href="#">Wafacilisis atllets</a></li>
							<li><a href="#">Watchfacilisis ates</a></li>
						</ul>
					</li>

					<li class="has-children">
						<a href="#">facilisis at</a>

						<ul class="is-hidden">
							<li class="go-back"><a href="#0">facilisis at</a></li>
							<li class="see-all"><a href="#">facilisis at</a></li>
							<li><a href="#">facilisis at </a></li>
							<li class="has-children">
								<a href="#0">Jeafacilisis atns</a>

								<ul class="is-hidden">
									<li class="go-back"><a href="#0">facilisis at</a></li>
									<li class="see-all"><a href="#">facilisis at</a></li>
									<li><a href="#">facilisis at</a></li>
									<li><a href="#">facilisis at</a></li>
									<li><a href="#">facilisis at</a></li>
									<li><a href="#">facilisis at</a></li>
								</ul>
							</li>
							<li><a href="#0">facilisis at</a></li>
							<li><a href="#0">facilisis at</a></li>
						</ul>
					</li>

					<li class="has-children">
						<a href="#">facilisis at</a>

						<ul class="is-hidden">
							<li class="go-back"><a href="#0">Clothfacilisis ating</a></li>
							<li class="see-all"><a href="#">All</a></li>
							<li><a href="#">facilisis at</a></li>
							<li><a href="#">facilisis at</a></li>
							<li><a href="#">Denim </a></li>
							
						</ul>
					</li>

					<li class="has-children">
						<a href="#">Tops</a>

						<ul class="is-hidden">
							<li class="go-back"><a href="#0">facilisis at</a></li>
							<li class="see-all"><a href="#">facilisis at</a></li>
							<li><a href="#">facilisis at</a></li>
							<li><a href="#">facilisis at</a></li>
							<li><a href="#">facilisis at</a></li>
							<li><a href="#">facilisis at</a></li>
							<li><a href="#">facilisis at</a></li>
							<li><a href="#">facilisis atShirts</a></li>
							<li class="has-children">
								<a href="#0">facilisis at</a>

								<ul class="is-hidden">
									<li class="go-back"><a href="#0">facilisis at</a></li>
									<li class="see-all"><a href="#">facilisis at</a></li>
									<li><a href="#">facilisis at</a></li>
									<li><a href="#">facilisis at</a></li>
									<li><a href="#">facilisis at</a></li>
								</ul>
							</li>
							<li><a href="#">facilisis at</a></li>
						</ul>
					</li>
				</ul>
			</li>

            <li class="has-children">
				<a href="#">Galerie photos</a>

				<ul class="cd-nav-gallery is-hidden">
					<li class="go-back"><a href="#0">Menu</a></li>
					{{-- <li class="see-all"><a href="#">Browse Gallery</a></li> --}}
					<li>
						<a class="cd-nav-item" href="#">
							<img src="http://placehold.it/320x295&amp;text=IMAGE+PLACEHOLDER" alt="Product Image">
							<h3>Event #1</h3>
						</a>
					</li>

					<li>
						<a class="cd-nav-item" href="#">
							<img src="http://placehold.it/320x295&amp;text=IMAGE+PLACEHOLDER" alt="Product Image">
							<h3>Event #2</h3>
						</a>
					</li>

					<li>
						<a class="cd-nav-item" href="#">
							<img src="http://placehold.it/320x295&amp;text=IMAGE+PLACEHOLDER" alt="Product Image">
							<h3>Event #3</h3>
						</a>
					</li>

					<li>
						<a class="cd-nav-item" href="#">
							<img src="http://placehold.it/320x295&amp;text=IMAGE+PLACEHOLDER" alt="Product Image">
							<h3>Event #4</h3>
						</a>
					</li>
				</ul>
			</li>

           <li><a href="{{url('/Enseignants')}}">Espace de Travail</a></li>

		</ul> <!-- primary-nav -->
	</nav> <!-- cd-nav -->


    {{-- <li><a href="#">Standard</a></li> --}}

	<div id="cd-search" class="cd-search">
		<form>
			<input type="search" placeholder="Recherches...">
		</form>
	</div>


<script src="{{asset('static/js/jquery-2.1.1.js')}}"></script>


<script src="{{asset('static/js/jquery.mobile.custom.min.js')}}"></script>
<script src="{{asset('static/js/main.js')}}"></script> <!-- Resource jQuery -->

<script src="{{asset('static/bodo/js/jquery.appear.js')}}" type="text/javascript"></script>
<script src="{{asset('static/bodo/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('static/bodo/js/classie.js')}}" type="text/javascript"></script>
<script src="{{asset('static/bodo/js/owl.carousel.min.js')}}" type="text/javascript"></script>
<script src="{{asset('static/bodo/js/jquery.magnific-popup.min.js')}}" type="text/javascript"></script>
<script src="{{asset('static/bodo/js/masonry.pkgd.min.js')}}" type="text/javascript"></script>
<script src="{{asset('static/bodo/js/masonry.js')}}" type="text/javascript"></script>
<script src="{{asset('static/bodo/js/smooth-scroll.min.js')}}" type="text/javascript"></script>
<script src="{{asset('static/bodo/js/typed.js')}}" type="text/javascript"></script>
<script src="{{asset('static/bodo/js/main.js')}}" type="text/javascript"></script>
<script src="{{asset('static/js/main.js')}}"></script> <!-- Resource jQuery -->

 <script src="assets/metro/js/metro.js"></script>


</body>
</html>