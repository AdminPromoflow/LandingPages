// Define a class called "Login"
class Login {
  constructor() {
    // Event listener to close the login form
    closeLogin.addEventListener("click", function () {
      // Call the closeLogin method of the Login class
      loginClass.closeLogin();
      // Call the closeRegister method of the Register class
      registerClass.closeRegister();
      // Show the login form with a sliding animation
      loginClass.showLogin(700);
      // Hide the register form with a sliding animation
      registerClass.hideRegister(700);
    });

    // Event listener to open the login form from the register screen
    openLoginFromRegister.addEventListener("click", function () {
      // Show the login form with a sliding animation
      loginClass.showLogin(0);
      // Hide the register form with a sliding animation
      registerClass.hideRegister(0);
    });


    // Event listener to open the register form from the login screen
    loginButton.addEventListener("click", function () {
      alert(nameLogin.value + passwordLogin.value);
    });
  }

  openLogin() {
    // Set the position and transformation of the "login" element
    login.style.left = "50%";
    login.style.transform = "translate(-50%, -50%)";
    // registerClass.openRegister();
  }

  closeLogin() {
    if (closeLoginSide == "left") {
      login.style.left = "100%";
      closeLoginSide = "right";
    } else if (closeLoginSide == "right") {
      login.style.left = "-100%";
      closeLoginSide = "left";
    }
    login.style.transform = "translateY(-50%)";


  }

  showLogin(time) {
    setTimeout(function () {
      // Perform rotation animations on login and register elements
      containerLogin.style.transform = "perspective(600px) rotateY(0deg)";
      containerLogin.style.backfaceVisibility = "visible";
      login.style.zIndex = "14";
    }, time);
  }

  hideLogin(time) {
    setTimeout(function () {
    containerLogin.style.transform = "perspective(600px) rotateY(-180deg)";
    containerLogin.style.backfaceVisibility = "hidden";
    login.style.zIndex = "13";
    }, time);
  }
}

// Get DOM elements
const openLoginFromRegister = document.getElementById("openLoginFromRegister");
const login = document.getElementById("login");
const closeLogin = document.getElementById("closeLogin"); // Button to close the login form
var containerLogin = document.getElementById("containerLogin");



var nameLogin = document.getElementById("nameLogin");
var passwordLogin = document.getElementById("passwordLogin");
var loginButton = document.getElementById("loginButton");





var closeLoginSide = "left";

// Create an instance of the Login class
const loginClass = new Login();
