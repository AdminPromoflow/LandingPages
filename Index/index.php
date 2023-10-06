<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Include Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,200&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

  <title></title>
</head>
<body>
  <style media="screen">
    body{
      margin: 0px;
      padding: 0px;
      background: #051527;
      font-family: 'IBM Plex Sans Condensed', sans-serif;
    }
    .background{
      position: relative;
      background-image: url('../Index/img/background.png');
      position: relative;
      height: 120vh;
      width: auto;
      background-size: cover;
      filter: brightness(1.7);
      background-color: #cccccc; /* Used if the image is unavailable */
      background-position: center; /* Center the image */
      background-repeat: no-repeat; /* Do not repeat the image */
      padding: 3vw;
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
    }
    .container{
      position: relative;
      height: 90%;
      width: 80vw;
      background: rgb(8,12,20);
      background: linear-gradient(90deg, rgba(8,12,20,1) 0%, rgba(78,121,116,1) 49%, rgba(44,71,76,1) 100%);
      overflow-y: scroll;
      overflow-x: hidden;
      box-shadow: 30px 30px  40px black;
      border-radius: 10px;
      box-shadow: 30px 30px  40px rgba(20,20,20,.5), -30px -30px  40px rgba(30,30,30,.5);
      filter: brightness(0.6);
      min-width: 300px;
    }
    .content{
      position: relative;
      height: auto;
    }
    .content img{
      position: relative;
      width: 100%;
    }
  </style>
  <section>
    <!-- Background section -->
    <div class="background">
      <!-- Container for content -->
      <div class="container">
        <!-- Content section -->
        <div class="content">
          <!-- Include the menu component -->
          <?php include "../General/Menu/Menu.php" ?>

          <!-- Include the slider component for the index page -->
          <?php include "../Index/Slider/Slider.php" ?>
        </div>

        <!-- Include the login component -->
        <?php include "../General/Login/Login.php" ?>

        <!-- Include the register component -->
        <?php include "../General/Register/Register.php" ?>

        <!-- Include the materials component for the index page -->
        <?php include "../Index/Materials/Materials.php" ?>

        <!-- Example image for the section -->
        <img src="../Index/img/Example.png" alt="">
      </div>
    </div>
  </section>

  <script type="text/javascript">
    // JavaScript code
    // Select HTML elements by class and ID for login
    const openLogin = document.querySelectorAll('.openLogin');
    var login = document.getElementById("login");
    var closeLogin = document.getElementById("closeLogin");

    // Set the initial position of the "login" element
    login.style.left = "-100%";
    var closeLoginSide = "left";

    // Event listener to close the login form
    closeLogin.addEventListener("click", function() {
      closeLoginAndRegister();
    });

    // Event listeners to open the login form
    for (let i = 0; i < openLogin.length; i++) {
      openLogin[i].addEventListener("click", function() {
        // Set the position and transformation of the "login" element
        login.style.left = "50%";
        login.style.transform = "translate(-50%,  -50%)";
      });
    }

    // Select HTML elements by class and ID for register
    const openRegister = document.querySelectorAll('.openRegister');
    var register = document.getElementById("register");
    var closeRegister = document.getElementById("closeRegister");

    // Set the initial position of the "register" element
    register.style.left = "50%";
    register.style.transform = "translate(-50%,  -50%)";
    var closeRegisterSide = "left";

    // Event listener to close the register form
    closeRegister.addEventListener("click", function() {
      closeLoginAndRegister();
    });

    // Event listener to open the register form from the login screen
    var openRegisterFromLogin = document.getElementById("openRegisterFromLogin");
    openRegisterFromLogin.addEventListener("click", function() {
      // Set the position and transformation of the "register" element
      register.style.left = "50%";
      register.style.transform = "translate(-50%,  -50%)";

      // Delay the animation to allow time for the transition
      setTimeout(function() {
        // Perform rotation animations on login and register elements
        containerLogin.style.transform = "perspective(600px) rotateY(-180deg)";
        containerRegister.style.transform = "perspective(600px) rotateY(-360deg)";

        // Control the visibility of the front and back faces of the elements
        containerLogin.style.backfaceVisibility = "hidden";
        containerRegister.style.backfaceVisibility = "visible";

        // Adjust the Z-index to display the register form on top
        login.style.zIndex = "13";
        register.style.zIndex = "14";
      }, 700); // 700 milliseconds delay
    });

    // Event listener to open the login form from the register screen
    var openLoginFromRegister = document.getElementById("openLoginFromRegister");
    openLoginFromRegister.addEventListener("click", function() {
      // Set the position and transformation of the "login" element
      login.style.left = "50%";
      login.style.transform = "translate(-50%,  -50%)";

      // Delay the animation to allow time for the transition
      setTimeout(function() {
        // Perform rotation animations on login and register elements
        containerRegister.style.transform = "perspective(600px) rotateY(-180deg)";
        containerLogin.style.transform = "perspective(600px) rotateY(0deg)";

        // Control the visibility of the front and back faces of the elements
        containerRegister.style.backfaceVisibility = "hidden";
        containerLogin.style.backfaceVisibility = "visible";

        // Adjust the Z-index to display the login form on top
        register.style.zIndex = "13";
        login.style.zIndex = "14";
      }, 700); // 700 milliseconds delay
    });

    // Function to close the login and register forms
    function closeLoginAndRegister() {
      if (closeLoginSide == "left") {
        login.style.left = "100%";
        closeLoginSide = "right";
      } else if (closeLoginSide == "right") {
        login.style.left = "-100%";
        closeLoginSide = "left";
      }

      if (closeRegisterSide == "left") {
        register.style.left = "100%";
        closeRegisterSide = "right";
      } else if (closeRegisterSide == "right") {
        register.style.left = "-100%";
        closeRegisterSide = "left";
      }

      login.style.transform = "translateY(-50%)";

      // Delay the animation to allow time for the transition
      setTimeout(function() {
        // Perform rotation animations on login and register elements
        containerLogin.style.transform = "perspective(600px) rotateY(0deg)";
        containerRegister.style.transform = "perspective(600px) rotateY(-180deg)";

        // Control the visibility of the front and back faces of the elements
        containerLogin.style.backfaceVisibility = "visible";
        containerRegister.style.backfaceVisibility = "hidden";

        // Adjust the Z-index to display the login form on top
        login.style.zIndex = "14";
        register.style.zIndex = "13";
      }, 700); // 700 milliseconds delay
    }
  </script>
</body>
</html>
