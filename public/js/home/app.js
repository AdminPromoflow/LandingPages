// JavaScript code
function openLoginFromRegister(){
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
}

function openRegisterFromLogin(){
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
}
