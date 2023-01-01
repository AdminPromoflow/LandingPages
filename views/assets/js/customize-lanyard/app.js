class CustomizeLanyard {
  constructor() {
    closeCustomizeLanyard.addEventListener("click" , function(){
      customizeLanyard.openCustomizeLanyard(false);
    })

    preview.addEventListener("click" , function(){
      if (currentIndex > 0) {
        currentIndex--;
        customizeLanyard.showCurrentSection();
      }
    })

    next.addEventListener("click" , function(){
      if (currentIndex  < sections.length -1) {
        currentIndex++;
        customizeLanyard.showCurrentSection();

      }
    })

    this.showCurrentSection();
  }

  openCustomizeLanyard(action){
    if (action) {
      customizeLanyardPanel.style.display = "block";

    }
    else {
      customizeLanyardPanel.style.display = "none";
    }
  }
  showCurrentSection(){

    for (let i = 0; i < sections.length; i++) {
      sections[i].style.display= "none";
    }

    sections[currentIndex].style.display= "block";


    if (currentIndex == 1) {
      templates.showSelectedPreviewtTemplate("one-end");
    }


    if (currentIndex == 0) {
      preview.style.display= "none";
    }
    else {
      preview.style.display= "block";
    }
    if (currentIndex == sections.length-1) {
      next.style.display= "none";
    }
    else {
      next.style.display= "block";
    }

  }

}


var sections = document.querySelectorAll(".section");
var currentIndex = 0;
var preview = document.getElementById("preview");
var next = document.getElementById("next");




const customizeLanyardPanel = document.getElementById("customize-lanyard");

const closeCustomizeLanyard = document.getElementById("close-customize-lanyard");

const customizeLanyard = new CustomizeLanyard();
