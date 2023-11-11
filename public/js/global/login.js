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
      // Call validation functions and display error or success messages
      if (loginClass.validateEmail() && loginClass.validatePassword()) {

        // Define the URL and the JSON data you want to send
        const url = "../../controller/users/login.php"; // Replace with your API endpoint URL
        const data = {
          action: "login",
          emailLogin: emailLogin.value,
          passwordLogin: passwordLogin.value
        };

        // Make the AJAX request
        loginClass.makeAjaxRequestLogin(url, data);
      }
    });
  }


  // Function to make the AJAX request
  makeAjaxRequestLogin(url, data) {
    // Make the request using the Fetch API
    fetch(url, {
      method: "POST", // HTTP POST method to send data
      headers: {
        "Content-Type": "application/json" // Indicate that you're sending JSON
      },
      body: JSON.stringify(data) // Convert the JSON object to a JSON string and send it
    })
      .then(response => {
        if (response.ok) {
          return response.text(); // or response.json() if you expect a JSON response
        }
        throw new Error("Network error.");
      })
      .then(data => {
        data = JSON.parse(data);

        if (data["message"]) {
          alert("Login successful");
        }
        else {
          alert("Login unsuccessful, please check your credentials.");
        }

      })
      .catch(error => {
        console.error("Error:", error);
      });
  }


  // Email validation function
  validateEmail() {
    // Get the value of the email input and remove leading/trailing whitespace
    const email = emailLogin.value.trim();
    // Regular expression pattern to check for a valid email format
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if (!emailPattern.test(email)) {
      // If email doesn't match the pattern, show an error message
      alert("Please enter a valid email");
      emailLogin.style.border = "3px solid #8B0000";

      return false; // Validation fails
    }
    // Clear any previous error messages
    emailLogin.style.border = "3px solid transparent";
    return true; // Validation passes
  }

  // Password validation function
  validatePassword() {
    // Get the value of the password input and remove leading/trailing whitespace
    const password = passwordLogin.value.trim();
    if (password.length < 6) {
      // If password is too short, show an error message
      alert("Password must be at least 6 characters");
      passwordLogin.style.border = "3px solid #8B0000";

      return false; // Validation fails
    }
    // Clear any previous error messages
    passwordLogin.style.border = "3px solid transparent";
    return true; // Validation passes
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



var emailLogin = document.getElementById("emailLogin");
var passwordLogin = document.getElementById("passwordLogin");
var loginButton = document.getElementById("loginButton");





var closeLoginSide = "left";

// Create an instance of the Login class
const loginClass = new Login();
