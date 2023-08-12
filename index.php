
<!Doctype html>
<html>
    <head>

      
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible"content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       

        <title>My portfolio</title>
        <link rel="stylesheet" href="styles.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

     
       </head>

        <body>

         



            <header class="header">
                <a href="#" class="logo">portfolio</a>
                <nav class="navbar">
                    <a href="#"class="active">Home </a>
                    <a href="#skills">Skills</a>
                    <a href="#portfolio">Portfolio</a>
                    <a href="#Contact-us">Contact</a>
                    <a href="login.php">Login</a>
                    <a href="projectfile.php">Project upload</a>
                   
                </nav>

                </header>


<section class="Home"> 
  
 <div class="home-scmedia">
    <a href="https://mobile.facebook.com/login/?locale=en_GB&_rdc=1&_rdr&refsrc=deprecated"><i class='bx bxl-facebook'></i></a>
    <a href="https://www.whatsapp.com/"><i class='bx bxl-whatsapp-square'></i></a>
    <a href="https://twitter.com/i/flow/login"><i class='bx bxl-twitter'></i></a>
   </div>

    <div class="h-content">
        <h1>I'm Pasan Weerasuriya</h1>
        <h2 >Interested: photography, Nature, Karate, Music, Chemistry</h2>
        <p id="pasan">I do photography as a mind relaxing hobby and specially interested about plants and animals.
            Karate builds my physical fitness while music builds my mental fitness. Actually chemistry is my favourite subject.
        </p>
    </div>
<div class="home-image">
    <div class="glowing-circle">
        <span></span>
        <span></span>
    <div class="image">
        <img src="2023041117501512_IMG_9504.JPG"alt>
        <br>
   
</div>


<br>
</section>



<button id="Button">See more about myself</button>
<div id="moreinfo" style="display: none;align-items: center;align-content: center;">
  <video src="VID-20221004-WA0001.mp4"controls style="align-items: center;"></video>
    
</div>

<br>
<section class="reveal" id="slider">
<div class="slider">
  <div class="slide">
    <img src="20230514_221955.jpg" alt="Image 1">
  </div>
  <div class="slide">
    <img src="20230411_202704.jpg" alt="Image 2">
  </div>
 
   <div class="slide">
    <img src="IMG_5151.JPG" alt="Image 3">
  </div>
  <div class="slide">
    <img src="20220724_200008.jpg" alt="Image 4">
  </div>
</div>

</section>
<br>




<section class="reveal" id="portfolio">

<h2>Portfolio</h2>
    <div class="video">
      <div class="video1">
        <video width="640" height="360" controls>
            <source src="VID-20230513-WA0015 (online-video-cutter.com).mp4">
        </video>
        <p>2023 Faculty day performance.</p>
    </div>
    


<div class="video3">
    <video width="640" height="360" controls>
    <source src="VID-20230514-WA0001.mp4">
        </video>
        <p>2023 Faculty day video</p>
    </div>
    

       
    
    </div>


<br>
<br><br><br>


   
    
    

<div class="photo-container">

    <img src="IMG_2962 copy.JPG">
    
    <img src="20210707_191619.jpg">
    
    <img src="20210729_110646.jpg">
    
    <img src="20200517092253_IMG_7876.jpg">
    
    <img src="IMG_0244.JPG">
    
    <img src="IMG_2069.JPG">
    
    <img src="20210520_070034.jpg">
    
    <img src="IMG_4573.JPG">
    
    <img src="IMG_5017 (2).JPG">

   <img src="IMG_5070 (2).JPG">
    
    <img src="IMG_7826.JPG">
    
    <img src="IMG_7862.JPG">
    
    <img src="IMG_7887.JPG">
    
    <img src="IMG_8322.JPG">
    
    <img src="IMG_8352.JPG">

</div>

<div class="video2">
    <video width="500" height="300" controls>
    <source src="VID-20230513-WA0020 (online-video-cutter.com).mp4">
        </video>
        <p>Clarinet performance by me</p>
    </div>


</section>

<section class="reveal" id="skills">

 <h2>Skills</h2>
    <div class="grid-container">
      <div class="column left">
        <h3>Photography Skills</h3>
        <ul>
          <li>Wildlife <span class="bar"><span style="width: 70%;">70%</span></span></li>
          <li>Event <span class="bar"><span style="width: 20%;">20%</span></span></li>
          <li>Portrait <span class="bar"><span style="width: 10%;">10%</span></span></li>
        </ul>
      </div>
      <div class="column right">
        <h3>Music Skills</h3>
        <ul>
          <li>Instruments Playing <span class="bar"><span style="width: 60%;">60%</span></span></li>
          <li>Singing <span class="bar"><span style="width: 40%;">40%</span></span></li>
        </ul>
      </div>
    </div>
  </section>
  

      
      <section class="reveal" id="Contact-us">
      
        <h1>Contact Us</h1>

        <?php

$name = $email = $message = $error = '';


function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


function is_valid_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    if (empty($_POST['name'])) {
        $error = 'Name is required';
    } else {
        $name = sanitize_input($_POST['name']);
    }

   
    if (empty($_POST['email'])) {
        $error = 'Email is required';
    } elseif (!is_valid_email($_POST['email'])) {
        $error = 'Invalid email format';
    } else {
        $email = sanitize_input($_POST['email']);
    }

    
    if (empty($_POST['message'])) {
        $error = 'Message is required';
    } else {
        $message = sanitize_input($_POST['message']);
    }

    
    if (empty($error)) {
        
        $to = 'weerasuriyapasan@gmail.com';
        $subject = 'Contact Form Submission';
        $headers = "From: $email\r\n" .
                   "Reply-To: $email\r\n" .
                   "X-Mailer: PHP/" . phpversion();

        
        mail($to, $subject, $message, $headers);

       
        $success_message = 'Thank you for contacting us! We will get back to you shortly.';
    }
}
?>

        <?php if (!empty($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <?php if (isset($success_message)): ?>
        <p style="color: green;"><?php echo $success_message; ?></p>
    <?php else: ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?php echo $name; ?>"><br>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?php echo $email; ?>"><br>

            <label for="message">Message:</label><br>
            <textarea name="message" id="message" rows="5" cols="40"><?php echo $message; ?></textarea><br>

            <input type="submit" value="Submit">
        </form>
    <?php endif; ?>

      

      </section>

      <br>
      <br>
  
      <footer>
        <ul class="social-icons">
          <li><a href="https://mobile.facebook.com/login/?locale=en_GB&_rdc=1&_rdr&refsrc=deprecated" class="facebook"><i class='bx bxl-facebook'></i></a></li>
          <li><a href="https://twitter.com/i/flow/login" class="twitter"><i class='bx bxl-twitter'></i></a></li>
          <li><a href="https://www.instagram.com/accounts/login/" class="instagram"><i class='bx bxl-instagram'></i></a></li>
          
        </ul>
      </footer>

    
      

<script src="Script.js"></script>

                </body>
                </html>