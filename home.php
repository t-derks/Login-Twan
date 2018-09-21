<?php

session_start();
include_once 'include/class.user.php';
$user = new User(); $uid = $_SESSION['uid'];
if (!$user->get_session()){
 header("location:index.php");
}

if (isset($_GET['q'])){
 $user->Gebruiker_uitloggen();
 header("location:home.php");
 }


 ?>
 <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

     <!-- Navigation -->
     <nav class="navbar navbar-default navbar-transparent navbar-fixed-top" role="navigation">
         <div class="container">
             <div class="navbar-header page-scroll">
                 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                     <span class="sr-only">Toggle navigation</span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                 </button>
                 <a class="navbar-brand page-scroll" href="#page-top"> <h4>Hallo, <?php $user->naam_gebruiker($uid); ?></h4>
             </div>

             <!-- Collect the nav links, forms, and other content for toggling -->
             <div class="collapse navbar-collapse navbar-ex1-collapse">
                 <ul class="nav navbar-nav navbar-right">
                     <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                     <li class="hidden">
                         <a class="page-scroll" href="#page-top"></a>
                     </li>
                     <li>
                         <a class="page-scroll" href="#about">Over Ons</a>
                     </li>
                     <li>
                         <a class="page-scroll" href="#contact">Contact</a>
                     </li>
                     <li>
                        <a href="home.php?q=uitloggen">Uitloggen</a>
                     </li>
                 </ul>
             </div>
             <!-- /.navbar-collapse -->
         </div>
         <!-- /.container -->
     </nav>

     <head>
     <title>Home</title>
     <link rel="stylesheet" type="text/css" href="css/home.css">
     <?php include_once "include/boostrap.html";?>
     </head>
     <!-- Intro Section -->
     <section id="intro" class="intro-section">
         <div class="container">
             <div class="row">
                 <div class="col-lg-12">
                     <h1>Welkom</h1>
                     <a class="btn btn-default page-scroll" href="#about">Klik hier om naar bendenden te scrollen!</a>
                 </div>
             </div>
         </div>
     </section>

     <!-- About Section -->
     <section id="about" class="about-section">
         <div class="container">
             <div class="row">
                 <div class="col-lg-12">
                     <h1>Over ons</h1>
                 </div>
             </div>
         </div>
     </section>


     <!-- Contact Section -->
     <section id="contact" class="contact-section">
         <div class="container">
             <div class="row">
                 <div class="col-lg-12">
                     <h1>Contact</h1>
                 </div>
             </div>
         </div>
     </section>
     <div id="footer">
     <h2>Copyright 2018 Twan Derks </h2>
     </div>
 </body>
