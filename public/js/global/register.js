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
 }
