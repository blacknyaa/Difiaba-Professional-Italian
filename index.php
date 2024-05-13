<?php

  require_once "backend/session.php";



if (!$login || $_SESSION['level'] != 'user') {

  header('Location: login.php');
  exit();

} else {


?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MMR Beauty Salon</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- header -->
    <section class="header">
        <a href="#" class="logo"> MMR Beauty Salon </a>
     
        <nav class="navbar">
           <div id="close-navbar" class="fas fa-times"></div>
           <a href="#home">home</a>
           <a href="#about">about</a>
           <a href="#pricing">offers</a>
           <a href="#contact">contact</a>
           <a href="bookavisit.php" class="action-btn">Book a Visit</a>
           <a href="backend/logout.php" class="action-btn">Logout</a>
     
        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>
     
     </section>
<!-- header -->

<!-- home -->

<section class="home" id="home">

    <div class="content">
      <span>Welcome!</span>
        <h3>We make</h3>
        <h3>hair beautiful</h3>
        <h3>& unique</h3>
    </div>

</section>

<!-- home -->

<section class="about" id="about">

    <h1 class="heading">about us</h1>
            

    <div class="row" >

        <div class="content">
            <h5 class="title">We are a group of stylists</h5>
            <p>Our main focus is on quality and hygiene. Our parlor is well equipped with technology equipment and provides best quality services.</p>        
            <p>our staff is well trained and experienced, offering advanced services in skin,hair, and body shaping that will provide you with a luxurious experience that leave you feeling relaxed and stress free.
                The specialities in the parlor are, apart from regular bleaching and facials, many types of hairstyles, bridal and cine make up and different types of facials & fashion hair colourings.
            </p>
            
            <div class="icons-container">
                <div class="icons">
                   <img src="images/about-icon-1.png" alt="">
                   <h3>Professional tools</h3>
                </div>
                <div class="icons">
                   <img src="images/about-icon-2.png" alt="">
                   <h3>quality products</h3>
                </div>
                <div class="icons">
                   <img src="images/about-icon-3.png" alt="">
                   <h3>hair washing</h3>
                </div>
             </div>
        </div>

    </div>

</section>

<!-- about us end -->
<!-- pricing -->

<section class="pricing" id="pricing">

    <h1 class="heading">Offers</h1>

    <div class="box-container">

        <div class="box">
          <h3 class="title">Hair Color</h3>
          <ul>
            <li> <i class="fas fa-check"></i> Short</li>
            <li> <i class="fas fa-check"></i> Medium </li>
            <li> <i class="fas fa-check"></i> Long</li>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
          </ul>
          <a href="#"><button>book a visit</button></a>
        </div>
        
        <div class="box">
          <h3 class="title">Hair Treatment</h3>
          <ul>
            <li> <i class="fas fa-check"></i> Rebond with Brazillian</li>
            <li> <i class="fas fa-check"></i> Color w/ Brazillian Botox </li>
            <li> <i class="fas fa-check"></i> Brazillian</li>
            <li> <i class="fas fa-check"></i> Rebond</li>
            <li> <i class="fas fa-check"></i> Cellophane</li>
            <br>
          </ul>
          <a href="#"><button>book a visit</button></a>
        </div>
        
        <div class="box">
          <h3 class="title">Eyelash Extension</h3>
          <ul>
            <li> <i class="fas fa-check"></i>Classic </li>
            <li> <i class="fas fa-check"></i>Hybrid </li>
            <li> <i class="fas fa-check"></i>Volume </li>
            <li> <i class="fas fa-check"></i>Cat Eye</li>
            <br>
            <br>
            <br>
          </ul>
          <a href="#"><button>book a visit</button></a>
        </div>

        <div class="box">
            <h3 class="title">Nails</h3>
            <ul>
              <li> <i class="fas fa-check"></i>Manicure & Pedicure </li>
              <li> <i class="fas fa-check"></i>Foot Spa with Free Massage </li>
              <li> <i class="fas fa-check"></i>Foot Spa with Massage</li>
              <li> <i class="fas fa-check"></i>Gel Polish</li>
              <li> <i class="fas fa-check"></i>Softgel Extension</li>
              <li> <i class="fas fa-check"></i>Polygel Extension</li>
            </ul>
            <a href="#"><button>book a visit</button></a>
          </div>
        
    </div>
    
</section>

<!-- pricing end -->


<!-- footer -->

<section class="footer" id="contact">

    <div class="box-container">
 
       <div class="box">
          <h3> Find us here </h3>
          <p>MMR Beauty Salon</p>
          <div class="share">
             <a href="#" class="fab fa-facebook-f"></a>
             <a href="#" class="fab fa-twitter"></a>
             <a href="#" class="fab fa-instagram"></a>
          </div>
       </div>
 
       <div class="box">
          <h3>contact us</h3>
          <p>Tel.(02) 83 762249 <br> +639511656712
          </p>
          <a href="#" class="link">mmrbeautysalon@gmail.com</a>
       </div>
 
       <div class="box">
          <h3>localization</h3>
          <p>#80 VP Cruz Street Purok 4, <br>
            Lower Bicutan, <br>
            Taguig City</p>
       </div>
 
    </div>
 
    <div class="credit"> created by <span>MATRIX</span> | all rights reserved! </div>
 
 </section>
<!-- footer end-->
<script src="js/script.js"></script>

</body>
</html>
<?php 

}

?>