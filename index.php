<?php
        //If the HTTPS is not found to be "on"
        if(!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on")
        {
            //Tell the browser to redirect to the HTTPS URL.
            header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], true, 301);
            //Prevent the rest of the script from executing.
            exit;
        }
?>

<?php

function get_profile_scores($xpath, $xpath_query)
{
    $elements = $xpath->query($xpath_query);
    if (!is_null($elements)) {
        foreach ($elements as $element) {
            $nodes = $element->childNodes;
            foreach ($nodes as $node) {
                return $node->nodeValue;
            }
        }
    }

    return '0';
}

function crawl_google_scholar_profile($url)
{
    static $seen = array();

    $seen[$url] = true;

    $dom = new DOMDocument('1.0');
    @$dom->loadHTMLFile($url);
    #echo $dom->saveHTML();

    $xpath = new DOMXpath($dom);

    $total_citations = get_profile_scores($xpath,"//*[@id=\"gsc_rsb_st\"]/tbody/tr[1]/td[2]");
    $h_index = get_profile_scores($xpath,"//*[@id=\"gsc_rsb_st\"]/tbody/tr[2]/td[2]");
    $i10_index = get_profile_scores($xpath,"//*[@id=\"gsc_rsb_st\"]/tbody/tr[3]/td[2]");
}
crawl_google_scholar_profile("https://scholar.google.com/citations?user=xwSEAPsAAAAJ&hl=en");
?>



<!DOCTYPE html>
<!-- ==============================
    Project:        Metronic "Acecv" Frontend Freebie - Responsive HTML Template Based On Twitter Bootstrap 3.3.4
    Version:        1.0
    Author:         KeenThemes
    Primary use:    Corporate, Business Themes.
    Email:          support@keenthemes.com
    Follow:         http://www.twitter.com/keenthemes
    Like:           http://www.facebook.com/keenthemes
    Website:        http://www.keenthemes.com
    Premium:        Premium Metronic Admin Theme: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
================================== -->
<html lang="en" class="no-js">
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>Shuhan Mirza</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="Software Engineer | Blockchain Developer" name="description"/>
    <meta content="Shuhan Mirza" name="author"/>

    <!-- GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet" type="text/css">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css"/>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

    <!-- PAGE LEVEL PLUGIN STYLES -->
    <link href="css/animate.css" rel="stylesheet">
    <link href="vendor/swiper/css/swiper.min.css" rel="stylesheet" type="text/css"/>

    <!-- THEME STYLES -->
    <link href="css/layout.min.css" rel="stylesheet" type="text/css"/>

    <!-- Favicon -->
    <link rel="shortcut icon" href="fav.ico"/>
</head>
<!-- END HEAD -->

<!-- BODY -->
<body id="body" data-spy="scroll" data-target=".header">

<!--========== HEADER ==========-->
<header class="header navbar-fixed-top">
    <!-- Navbar -->
    <nav class="navbar" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="menu-container js_nav-item">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="toggle-icon"></span>
                </button>

                <!-- Logo -->
                <div class="logo">
                    <a class="logo-wrap" href="#body">
                        <!-- <span style="color: salmon;">SHUHAN</span>MIRZA -->
                        <img class="logo-img" src="img/header_logo.gif" alt="Asentus Logo">
                    </a>
                </div>
                <!-- End Logo -->
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse nav-collapse">
                <div class="menu-container">
                    <ul class="nav navbar-nav navbar-nav-right">
                        <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="#body">Home</a></li>
                        <!-- <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="#about">About</a></li>
                        <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="#experience">Experience</a></li>
                        <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="#work">Work</a></li> -->
                        <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
            <!-- End Navbar Collapse -->
        </div>
    </nav>
    <!-- Navbar -->
</header>
<!--========== END HEADER ==========-->

<!--========== SLIDER ==========-->
<div class="promo-block">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 sm-margin-b-60">
                <div class="margin-b-30">
                    <h1 class="promo-block-title">Shuhan<br/>Mirza</h1>
                    <p class="promo-block-text">Software Engineer | Blockchain Developer</p>
                </div>
                <ul class="list-inline">
                    <li><a href="https://www.facebook.com/shuhan.mirza/" class="social-icons"><i class="icon-social-facebook"></i></a></li>
                    <li><a href="https://github.com/shuhanmirza/" class="social-icons"><i class="icon-social-github"></i></a></li>
                    <li><a href="https://www.linkedin.com/in/shuhan-mirza/" class="social-icons"><i class="icon-social-linkedin"></i></a></li>
                </ul>
            </div>
            <div class="col-sm-6">
                <div class="promo-block-img-wrap">
                    <img class="promo-block-img img-responsive" src="img/mockup/avatar-01.png" align="Avatar">
                </div>
            </div>
        </div>
        <!--// end row -->
    </div>
</div>
<!--========== SLIDER ==========-->





<!--========== PAGE LAYOUT ==========-->
<!-- About -->
<div id="about">
    <div class="container content-lg">
        <div class="row">
            <div class="col-sm-5 sm-margin-b-60">
                <img class="full-width img-responsive" src="img/500x700/01.jpg" alt="Image">
            </div>
            <div class="col-sm-7">
                <div class="section-seperator margin-b-50">
                    <div class="margin-b-50">
                        <div class="margin-b-30">
                            <h2>About Me</h2>
                            <p> A speck of dust in this universe who finds true excitement in building impactful FinTech applications. A true believer of grit. Practice agile methodologies in every aspect of life.</p>
                        </div>
                        <a href="http://keenthemes.com/" class="btn-theme btn-theme-md btn-default-bg text-uppercase">Download my CV</a>
                    </div>
                </div>

                <h2>My Skills</h2>
                <!-- Progress Box -->
                <div class="progress-box">
                    <h5>Adobe Illustrator <span class="color-heading pull-right">87%</span></h5>
                    <div class="progress">
                        <div class="progress-bar bg-color-base" role="progressbar" data-width="87"></div>
                    </div>
                </div>
                <div class="progress-box">
                    <h5>Adobe Photoshop <span class="color-heading pull-right">96%</span></h5>
                    <div class="progress">
                        <div class="progress-bar bg-color-base" role="progressbar" data-width="96"></div>
                    </div>
                </div>
                <div class="progress-box">
                    <h5>Graphic Design <span class="color-heading pull-right">77%</span></h5>
                    <div class="progress">
                        <div class="progress-bar bg-color-base" role="progressbar" data-width="77"></div>
                    </div>
                </div>
                <!-- End Progress Box -->
            </div>
        </div>
        <!--// end row -->
    </div>
</div>
<!-- End About -->

<!-- Experience -->
<div id="experience">
    <div class="bg-color-sky-light" data-auto-height="true">
        <div class="container content-lg">
            <div class="row row-space-2 margin-b-4">
                <div class="col-md-3 col-sm-6 md-margin-b-4">
                    <div class="service" data-height="height">
                        <div class="service-element">
                            <i class="service-icon icon-mustache"></i>
                        </div>
                        <div class="service-info">
                            <h3>Illustrator</h3>
                            <p class="margin-b-5">Lorem ipsum dolor amet consectetur ut consequat siad esqudiat dolor</p>
                        </div>
                        <a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" class="content-wrapper-link"></a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 md-margin-b-4">
                    <div class="service bg-color-base wow zoomIn" data-height="height" data-wow-duration=".3" data-wow-delay=".1s">
                        <div class="service-element">
                            <i class="service-icon color-white icon-screen-tablet"></i>
                        </div>
                        <div class="service-info">
                            <h3 class="color-white">Graphic Design</h3>
                            <p class="color-white margin-b-5">Lorem ipsum dolor amet consectetur ut consequat siad esqudiat dolor</p>
                        </div>
                        <a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" class="content-wrapper-link"></a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 sm-margin-b-4">
                    <div class="service" data-height="height">
                        <div class="service-element">
                            <i class="service-icon icon-chemistry"></i>
                        </div>
                        <div class="service-info">
                            <h3>Photoshop</h3>
                            <p class="margin-b-5">Lorem ipsum dolor amet consectetur ut consequat siad esqudiat dolor</p>
                        </div>
                        <a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" class="content-wrapper-link"></a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="service" data-height="height">
                        <div class="service-element">
                            <i class="service-icon icon-badge"></i>
                        </div>
                        <div class="service-info">
                            <h3>Sketch</h3>
                            <p class="margin-b-5">Lorem ipsum dolor amet consectetur ut consequat siad esqudiat dolor</p>
                        </div>
                        <a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" class="content-wrapper-link"></a>
                    </div>
                </div>
            </div>
            <!--// end row -->
        </div>
    </div>
</div>
<!-- End Experience -->

<!-- Work -->
<div id="work">
    <div class="container content-lg">
        <div class="row margin-b-40">
            <div class="col-sm-6">
                <h2>Latest Products</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed tempor incididunt ut laboret dolore magna aliqua enim minim veniam exercitation</p>
            </div>
        </div>
        <!--// end row -->

        <div class="row">
            <!-- Latest Products -->
            <div class="col-sm-4 sm-margin-b-50">
                <div class="margin-b-20">
                    <div class="wow zoomIn" data-wow-duration=".3" data-wow-delay=".1s">
                        <img class="img-responsive" src="img/970x647/01.jpg" alt="Latest Products Image">
                    </div>
                </div>
                <h4><a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes">Triangle Roof</a> <span class="text-uppercase margin-l-20">Management</span></h4>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed tempor incdidunt ut laboret dolor magna ut consequat siad esqudiat dolor</p>
                <a class="link" href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes">Read More</a>
            </div>
            <!-- End Latest Products -->

            <!-- Latest Products -->
            <div class="col-sm-4 sm-margin-b-50">
                <div class="margin-b-20">
                    <div class="wow zoomIn" data-wow-duration=".3" data-wow-delay=".1s">
                        <img class="img-responsive" src="img/970x647/02.jpg" alt="Latest Products Image">
                    </div>
                </div>
                <h4><a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes">Curved Corners</a> <span class="text-uppercase margin-l-20">Developmeny</span></h4>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed tempor incdidunt ut laboret dolor magna ut consequat siad esqudiat dolor</p>
                <a class="link" href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes">Read More</a>
            </div>
            <!-- End Latest Products -->

            <!-- Latest Products -->
            <div class="col-sm-4 sm-margin-b-50">
                <div class="margin-b-20">
                    <div class="wow zoomIn" data-wow-duration=".3" data-wow-delay=".1s">
                        <img class="img-responsive" src="img/970x647/03.jpg" alt="Latest Products Image">
                    </div>
                </div>
                <h4><a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes">Bird On Green</a> <span class="text-uppercase margin-l-20">Design</span></h4>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed tempor incdidunt ut laboret dolor magna ut consequat siad esqudiat dolor</p>
                <a class="link" href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes">Read More</a>
            </div>
            <!-- End Latest Products -->
        </div>
        <!--// end row -->
    </div>
</div>
<!-- End Work -->

<!-- Clients -->
<div id="clients" class="bg-color-sky-light">
    <div class="content-lg container">
        <!-- Swiper Clients -->
        <div class="swiper-slider swiper-clients">
            <!-- Swiper Wrapper -->
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img class="swiper-clients-img" src="img/clients/01.png" alt="Clients Logo">
                </div>
                <div class="swiper-slide">
                    <img class="swiper-clients-img" src="img/clients/02.png" alt="Clients Logo">
                </div>
                <div class="swiper-slide">
                    <img class="swiper-clients-img" src="img/clients/03.png" alt="Clients Logo">
                </div>
                <div class="swiper-slide">
                    <img class="swiper-clients-img" src="img/clients/04.png" alt="Clients Logo">
                </div>
                <div class="swiper-slide">
                    <img class="swiper-clients-img" src="img/clients/05.png" alt="Clients Logo">
                </div>
                <div class="swiper-slide">
                    <img class="swiper-clients-img" src="img/clients/06.png" alt="Clients Logo">
                </div>
            </div>
            <!-- End Swiper Wrapper -->
        </div>
        <!-- End Swiper Clients -->
    </div>
</div>
<!-- End Clients -->

<!-- Promo Banner -->
<!-- <div id="promo_banner" class="promo-banner parallax-window" data-parallax="scroll" data-image-src="img/1920x1080/01.jpg">
    <div class="container-sm content-lg">
        <h2 class="promo-banner-title">Displaying the Result</h2>
        <p class="promo-banner-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
    </div>
</div> -->
<!-- End Promo Banner -->



<!-- Contact -->
<div id="contact">
    <div class="bg-color-sky-light">
        <div class="container content-lg">
            <div class="row margin-b-40">
                <div class="col-sm-6">
                    <h2>Contact Me</h2>
                    <p>"A potential friend is only a 'Hello' away."<br>- Paul Liebau</p>
                </div>
            </div>
            <!--// end row -->

            <div class="row">
                <div class="col-md-3 col-xs-6 md-margin-b-30">
                    <h4>Location</h4>
                    <a>Dhaka, Bangladesh</a>
                </div>
                <div class="col-md-3 col-xs-6 md-margin-b-30">
                    <h4>Phone</h4>
                    <a>+880 1621416121</a>
                </div>
                <div class="col-md-3 col-xs-6">
                    <h4>Email</h4>
                    <a href="mailto:shuhan.mirza@gmail.com">shuhan.mirza@gmail.com</a>
                </div>
                <div class="col-md-3 col-xs-6">
                    <h4>Web</h4>
                    <a href="https://shuhanmirza.com">shuhanmirza.com</a>
                </div>
            </div>
            <!--// end row -->
        </div>
    </div>
</div>
<!-- End Contact -->
<!--========== END PAGE LAYOUT ==========-->

<!--========== FOOTER ==========-->
<footer class="footer">
    <div class="content container">
        <div class="row">
            <div class="col-xs-6">
                <!-- <span style="color: salmon;">SHUHAN</span>MIRZA -->
                <img class="footer-logo" src="img/footer_logo.gif">
            </div>
            <div class="col-xs-6 text-right sm-text-left">
                <p class="margin-b-0"> Theme Powered by: <a class="fweight-700" href="http://www.keenthemes.com/">KeenThemes.com</a></p>
            </div>
        </div>
        <!--// end row -->
    </div>
</footer>
<!--========== END FOOTER ==========-->

<!-- Back To Top -->
<a href="javascript:void(0);" class="js-back-to-top back-to-top">Top</a>

<!-- JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- CORE PLUGINS -->
<script src="vendor/jquery.min.js" type="text/javascript"></script>
<script src="vendor/jquery-migrate.min.js" type="text/javascript"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

<!-- PAGE LEVEL PLUGINS -->
<script src="vendor/jquery.easing.js" type="text/javascript"></script>
<script src="vendor/jquery.back-to-top.js" type="text/javascript"></script>
<script src="vendor/jquery.smooth-scroll.js" type="text/javascript"></script>
<script src="vendor/jquery.wow.min.js" type="text/javascript"></script>
<script src="vendor/jquery.parallax.min.js" type="text/javascript"></script>
<script src="vendor/jquery.appear.js" type="text/javascript"></script>
<script src="vendor/swiper/js/swiper.jquery.min.js" type="text/javascript"></script>

<!-- PAGE LEVEL SCRIPTS -->
<script src="js/layout.min.js" type="text/javascript"></script>
<script src="js/components/progress-bar.min.js" type="text/javascript"></script>
<script src="js/components/swiper.min.js" type="text/javascript"></script>
<script src="js/components/wow.min.js" type="text/javascript"></script>

</body>
<!-- END BODY -->


<script>

    $('#about').hide()
    $('#experience').hide()
    $('#work').hide()
    $('#clients').hide()


</script>

</html>