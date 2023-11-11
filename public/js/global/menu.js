// Define a Menu class to handle menu interactions
class Menu {
  constructor() {
    // Add click events to open the login section
    for (let i = 0; i < openLoginButtons.length; i++) {
      openLoginButtons[i].addEventListener("click", function() {
        // Call the openLogin method from login Class
        loginClass.openLogin();
        registerClass.openRegister();
      });
    }

    // Add click event to open the mobile menu
    openMenuMobileButton.addEventListener("click", this.openMenuMobile.bind(this));

    // Add click event to close the mobile menu
    closeMenuMobileButton.addEventListener("click", this.closeMenuMobile.bind(this));

    // Add a global click event listener to close the mobile menu when clicking outside
    document.addEventListener("click", this.handleClickOutside.bind(this));
  }

  // Method to open the mobile menu
  openMenuMobile() {
    closeMenuMobile.style.display = "block";
    menuMobile.style.left = "calc(100% - 300px)";
    openMenuMobile.style.display = "none";
  }

  // Method to close the mobile menu
  closeMenuMobile() {
    closeMenuMobile.style.display = "none";
    menuMobile.style.left = "calc(100%)";
    openMenuMobile.style.display = "block";
  } 

  // Method to handle clicks outside the menu
  handleClickOutside(event) {
    if (!openMenuMobile.contains(event.target)) {
      if (!menuMobile.contains(event.target)) {
        // Call your function or perform the desired action here
        this.closeMenuMobile();
      }
    }
  }

}
// Get elements and buttons related to the menu
const openLoginButtons = document.querySelectorAll('.openLogin'); // Buttons to open the login
const openMenuMobileButton = document.getElementById("openMenuMobile"); // Button to open mobile menu
const closeMenuMobileButton = document.getElementById("closeMenuMobile"); // Button to close mobile menu
const menuMobile = document.getElementById("menuMobile"); // Mobile menu container
// Create an instance of the Menu class
const menuClass = new Menu();
