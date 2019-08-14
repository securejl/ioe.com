<?php
session_start();
require_once('functions.php');
require_once('header.php');


/*printHeader("About");*/
printPicTitle("About Me");
?>
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <!--<header class="intro-header" style="background-image: url('img/about-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">
                        <h1>About Me</h1>
                        <hr class="small">
                        <span class="subheading">Hi! My name is Joshua Lower. I'm an enerjetic, passionate student of life, with a strong interest
                        in business. 
                        Thanks for visiting this site.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>-->
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <p>I created this site as the answer to an issue that I've been having for years, when talking with friends about
                        business. We always wanted a common virtual space where we could discuss ideas and share opinions and points of view together.
                        I hope that this site is what you are looking for.</p>
                <p> IOE.com is an anagram for In Omnia Excellentia, which is the theme for this site, as well as a personal life motto. It means:
                Excellence in Everything. </p>
               
            </div>
        </div>
    </div>

    <hr>

    <!-- Footer -->
<?php
        include('footer.php');
?>
    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/clean-blog.min.js"></script>

</body>

</html>
