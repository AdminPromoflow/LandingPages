class Login {
  constructor() {

   // Event listener to close the login form
    closeLogin.addEventListener("click",function () {
      loginClass.closeLogin();
      registerClass.closeRegister();
      loginClass.showLogin(700);
      registerClass.hideRegister(700);
    });



    // Event listener to open the login form from the register screen
    openLoginFromRegister.addEventListener("click",function () {
      loginClass.showLogin(0);
      registerClass.hideRegister(0);
    });


  }
  openLogin(){
     // Set the position and transformation of the "login" element
     login.style.left = "50%";
     login.style.transform = "translate(-50%,  -50%)";
    // registerClass.openRegister();
  }
  closeLogin(){
    if (closeLoginSide == "left") {
      login.style.left = "100%";
      closeLoginSide = "right";
    } else if (closeLoginSide == "right") {
      login.style.left = "-100%";
      closeLoginSide = "left";
    }
    login.style.transform = "translateY(-50%)";

    /*this.hideLogin();
    registerClass.closeRegister();
    registerClass.hideRegister();*/
  }
  showLogin(time){
    setTimeout(function() {

      // Perform rotation animations on login and register elements
      containerLogin.style.transform = "perspective(600px) rotateY(0deg)";

      // Control the visibility of the front and back faces of the elements
      containerLogin.style.backfaceVisibility = "visible";

      // Adjust the Z-index to display the login form on top
      login.style.zIndex = "14";
    }, time);
  }

  hideLogin(time){
    setTimeout(function() {
      containerLogin.style.transform = "perspective(600px) rotateY(0deg)";
      containerLogin.style.backfaceVisibility = "visible";
      login.style.zIndex = "14";
    }, time);
  }

}

const openLoginFromRegister = document.getElementById("openLoginFromRegister");
const login = document.getElementById("login");
const closeLogin = document.getElementById("closeLogin"); // Button to close mobile menu
var containerLogin = document.getElementById("containerLogin");

var closeLoginSide = "left";

// Create an instance of the Login class
const loginClass = new Login();
