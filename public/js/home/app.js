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
