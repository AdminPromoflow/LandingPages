class Register {
  constructor() {
    // Event listener to close the register form
    closeRegister.addEventListener("click", function() {
    //  closeLoginAndRegister();
    });

    // Event listener to open the register form from the login screen

    openRegisterFromLogin.addEventListener("click", function() {
    //  openRegisterFromLogin();
    });
  }
  closeRegister(){
    if (closeRegisterSide == "left") {
      register.style.left = "100%";
      closeRegisterSide = "right";
    } else if (closeRegisterSide == "right") {
      register.style.left = "-100%";
      closeRegisterSide = "left";
    }

    register.style.transform = "translateY(-50%)";

    // Delay the animation to allow time for the transition
    setTimeout(function() {
      // Perform rotation animations on login and register elements
      containerRegister.style.transform = "perspective(600px) rotateY(-180deg)";

      // Control the visibility of the front and back faces of the elements
      containerRegister.style.backfaceVisibility = "hidden";

      // Adjust the Z-index to display the login form on top
      register.style.zIndex = "13";
    }, 700); // 700 milliseconds delay
  }

}
// Select HTML elements by class and ID for register
const openRegister = document.querySelectorAll('.openRegister');
var register = document.getElementById("register");
var closeRegister = document.getElementById("closeRegister");
var openRegisterFromLogin = document.getElementById("openRegisterFromLogin");

// Set the initial position of the "register" element
register.style.left = "50%";
register.style.transform = "translate(-50%,  -50%)";
var closeRegisterSide = "left";

const registerClass = new Register();




/*



const nameRegister = document.getElementById("nameRegister");
const emailRegister = document.getElementById("emailRegister");
const passwordRegister = document.getElementById("passwordRegister");
const submitBtnRegister = document.getElementById("submitBtnRegister");

// Add an event listener to the registration button
submitBtnRegister.addEventListener("click", function() {
    // Call validation functions and display error or success messages
    if (validateName() && validateEmail() && validatePassword()) {
        // If all validations pass, show a success message
        alert("Registration successful.");

        // Define the URL and the JSON data you want to send
        const url = "../../Controller/Controller.php"; // Replace with your API endpoint URL
        const data = {
            action: "register",
            key1: "value1",
            key2: "value2"
        };

        // Make the AJAX request
        makeAjaxRequestRegister(url, data);
    }
});
// Name validation function
function validateName() {
    // Get the value of the name input and remove leading/trailing whitespace
    const name = nameRegister.value.trim();
    if (name === "") {
        // If the name is empty, show an error message
        alert("Name field is required");
        nameRegister.style.border = "3px solid #8B0000";
        return false; // Validation fails
    }
    // Clear any previous error messages
    nameRegister.style.border = "3px solid transparent";

    return true; // Validation passes
}

// Email validation function
function validateEmail() {
    // Get the value of the email input and remove leading/trailing whitespace
    const email = emailRegister.value.trim();
    // Regular expression pattern to check for a valid email format
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if (!emailPattern.test(email)) {
        // If email doesn't match the pattern, show an error message
        alert("Please enter a valid email");
        emailRegister.style.border = "3px solid #8B0000";

        return false; // Validation fails
    }
    // Clear any previous error messages
    emailRegister.style.border = "3px solid transparent";
    return true; // Validation passes
}

// Password validation function
function validatePassword() {
    // Get the value of the password input and remove leading/trailing whitespace
    const password = passwordRegister.value.trim();
    if (password.length < 6) {
        // If password is too short, show an error message
        alert("Password must be at least 6 characters");
        passwordRegister.style.border = "3px solid #8B0000";

        return false; // Validation fails
    }
    // Clear any previous error messages
    passwordRegister.style.border = "3px solid transparent";
    return true; // Validation passes
}
// Function to make the AJAX request
function makeAjaxRequestRegister(url, data) {
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
         // The code inside this function will run when the request is complete
         console.log(data); // Here you can handle the received response
     })
     .catch(error => {
         console.error("Error:", error);
     });
 }*/
