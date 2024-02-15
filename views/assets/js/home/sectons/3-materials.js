// Class MaterialHome
class MaterialHome {
  constructor() {
    // Event listener to hide containerTextMaterials when closeMaterial is clicked
    for (let i = 0; i < closeMaterial.length; i++) {
      closeMaterial[i].addEventListener("click", function(){
        containerTextMaterials[i].style.display = "none";
      })
    }

    for (let i = 0; i < openCustomizeLanyardFromMaterials.length; i++) {
      openCustomizeLanyardFromMaterials[i].addEventListener("click", function(){

        const url = "../../controller/lanyard/material.php";
        const data = {
          action: "setMaterialSelected",
          optionSelected: materialForSelect[i].textContent

        };
        material.makeAjaxRequestSetMaterialSelected(url, data);

        customizeLanyard.openCustomizeLanyard("block");

      })



    }


    // Event listener to display containerTextMaterials when itemMaterial is clicked
    for (let i = 0; i < itemMaterial.length; i++) {
      containerTextMaterials[i].style.display = "none";
      itemMaterial[i].addEventListener("click", function(){
        containerTextMaterials[i].style.display = "flex";
        containerTextMaterialsOn = i;
        materialHome.hideOtherContainerTextMaterials(i);
      })
    }

    // Event listener to display containerTextMaterials when itemMaterial is hovered
    for (let i = 0; i < itemMaterial.length; i++) {
      containerTextMaterials[i].style.display = "none";
      itemMaterial[i].addEventListener("mouseenter", function(){
        containerTextMaterials[i].style.display = "flex";
        containerTextMaterialsOn = i;
        materialHome.hideOtherContainerTextMaterials(i);
      })
    }

    // Event listener to hide containerTextMaterials when clicking outside
    documento.addEventListener('click', this.outContainerTextMaterials);
  }

  // Method to hide other containerTextMaterials
  hideOtherContainerTextMaterials(){
    for (let i = 0; i < containerTextMaterials.length; i++) {
      if (i != containerTextMaterialsOn) {
        containerTextMaterials[i].style.display = "none";
      }
    }
  }

  // Method to hide containerTextMaterials when clicking outside
  outContainerTextMaterials(event) {
    if (event.target === containerTextMaterials[containerTextMaterialsOn]) {
    } else {
      containerTextMaterials[containerTextMaterialsOn].style.display = "none";
    }
  }

}

// Selecting elements from the DOM
const itemMaterial = document.querySelectorAll(".itemMaterial");
const containerTextMaterials = document.querySelectorAll(".containerTextMaterials");
const closeMaterial = document.querySelectorAll(".closeMaterial");
const buttonMaterialsBox = document.querySelectorAll(".buttonMaterialsBox");

const openCustomizeLanyardFromMaterials = document.querySelectorAll(".openCustomizeLanyardFromMaterials");

const materialForSelect = document.querySelectorAll(".material-for-select");



const documento = document.documentElement;
var containerTextMaterialsOn = 0;

// Creating an instance of the MaterialHome class
const materialHome = new MaterialHome();
