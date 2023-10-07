class Login {
  constructor() {

   // Event listener to close the login form
    closeLogin.addEventListener("click", this.closeLogin.bind(this));

    closeLogin.addEventListener("click", function() {
      registerClass.closeRegister();
    });
    // Event listener to open the login form from the register screen

  /*   openLoginFromRegister.addEventListener("click", function() {
      //openLoginFromRegister()
    });*/

  }
  openLogin(){
     // Set the position and transformation of the "login" element
     login.style.left = "50%";
     login.style.transform = "translate(-50%,  -50%)";
  }
   closeLogin(){
     if (closeLoginSide == "left") {
       login.style.left = "100%";
       closeLoginSide = "right";
     } else if (closeLoginSide == "right") {
       login.style.left = "-100%";
       closeLoginSide = "left";
     }

     // Delay the animation to allow time for the transition
     setTimeout(function() {
       // Perform rotation animations on login and register elements
       containerLogin.style.transform = "perspective(600px) rotateY(0deg)";

       // Control the visibility of the front and back faces of the elements
       containerLogin.style.backfaceVisibility = "visible";

       // Adjust the Z-index to display the login form on top
       login.style.zIndex = "14";
       login.style.transform = "translateY(-50%)";

     }, 700);
   }
}

//const openLoginFromRegister = document.getElementById("openLoginFromRegister");
const login = document.getElementById("login");
const closeLogin = document.getElementById("closeLogin"); // Button to close mobile menu
var closeLoginSide = "left";

// Create an instance of the Login class
const loginClass = new Login();
