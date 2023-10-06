<style media="screen">
    .register{
      position: fixed;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      transition: .7s cubic-bezier(0.68, -0.55, 0.27, 1.55);
      z-index: 13;
    }
    .containerRegister{
      width: 300px;
      height: 400px;
      max-height: 90vh;
      overflow-y: scroll;

      background: rgba(30,54,81,.7);
      background: linear-gradient(180deg, rgba(30,54,81,.98) 57%, rgba(47,67,90,.98) 100%);
      box-shadow: 0px 0px  29px #1B2737,  -0px -0px  29px #1B2737;
      border-bottom-left-radius: 5px;
      border-bottom-right-radius: 5px;

      transform: perspective(600px) rotateY(-180deg);
      backface-visibility: hidden; /* cant see the backside elements as theyre turning around */
      transition: transform 1s linear .1s;
    }
    .headRegister{
      position: absolute;
      top: 0px;
      width: 100%;
      height: 80px;
      background: rgba(106,108,110, .1);
      background: linear-gradient(90deg, rgba(106,108,110,.8) 0%, rgba(141,169,167,.8) 50%, rgba(106,108,110,.8) 100%);
      border-top-left-radius: 5px;
      border-top-right-radius: 5px;
      box-shadow: 0px 0px  5px black;
    }
    .headRegister h1{
      position: relative;
      margin: 0px;
      text-align: center;
      top: 50%;
      transform: translateY(-50%);
      font-size: 2em;
      font-weight: 600;
      color: rgba(255 , 255 , 255 , .8);
      text-shadow: 0px 0px  5px black;
    }
    .headRegister img{
      position: absolute;
      right: 20px;
      top: 50%;
      transform: translateY(-50%);
      height: 30%;
      cursor: pointer;
      filter: drop-shadow(1px 1px 1px black)  brightness(.8);
      transition: .4;
    }
    .headRegister img:hover{
      filter: drop-shadow(1px 1px 3px black)  brightness(.9);
    }
    .headRegister img:active{
      filter: drop-shadow(1px 1px 1px black)  brightness(.8);
    }

    .bodyRegister{
      position: absolute;
      top: 80px;
      width: 100%;
      height: 210px;
      padding-top: 10px;

      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }
    .bodyRegister label{
      color: white;
      margin-bottom: 3px;
      font-size: 1em;

    }
    .bodyRegister input{
      margin-bottom: 6px;
      border-radius: 5px;
      padding: 3px 10px;;
      font-size: 1em;
      background: rgba(255 , 255 , 255 , .8);
    }

    .footerRegister{
      position: absolute;
      top: 300px;
      width: 100%;
      height: 100px;

      display: flex;
      justify-content:flex-start;
      align-items: center;
      flex-direction: column;
    }
    .footerRegister button{
      padding: 8px 20px;
      z-index: 10;
      font-size: 1.3em;
      font-weight: 200;
      border-radius: 5px;
      color: black;
      background-color: #B3C7BF;
      cursor: pointer;
    }
    .fontWeightButtonRegister{
      font-weight: 500;
    }
    .footerRegister h4{
      margin: 5px;
      color: rgba(255 , 255 , 255 , .9);
      border-bottom: 1px solid transparent;

      font-weight: 300;
      cursor: pointer;
      transition: .4s;
    }
    .footerRegister h4:hover{
      color: rgba(255 , 255 , 255 , 1);
      border-bottom: 1px solid white;
    }


  </style>
<section id="register" class="register">
  <div id="containerRegister" class="containerRegister">
    <div class="headRegister">
      <h1>Register</h1>
      <img id="closeRegister" src="../General/Register/img/close.png" alt="">
    </div>
    <div class="bodyRegister">
      <label for="">Please provide your name:</label>
      <input type="text"  id="nameRegister" name="" value="">
      <label for="">your email:</label>
      <input type="text" id="emailRegister" name="" value="">
      <label for="">and your password:</label>
      <input type="password" id="passwordRegister" name="" value="">
    </div>
    <div class="footerRegister">
      <button type="button" id="submitBtnRegister" name="button"><strong class="fontWeightButtonRegister">Start</strong></button>
      <h4 id="openLoginFromRegister">No account yet? Register here.</h4>
    </div>
  </div>
</section>
<script type="text/javascript">
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
          const url = "../App/Controller/Controller.php"; // Replace with your API endpoint URL
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


</script>
