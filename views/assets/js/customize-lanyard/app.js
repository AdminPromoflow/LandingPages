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


  showCurrentSection(){

    for (let i = 0; i < sections.length; i++) {
      sections[i].style.display= "none";
    }
    sections[currentIndex].style.display= "block";

    this.changePreviewNextSection(nameSectionCustomizeLanyard[currentIndex].innerHTML);


    if (currentIndex == 0) {
      preview.style.display= "none";
    }else {
      preview.style.display= "block";
    }


    if (currentIndex == sections.length-1) {
      next.style.display= "none";
    }else {
      next.style.display= "block";
    }

  }
  openCustomizeLanyard(action){
    customizeLanyardPanel.style.display = action;


  }
  changePreviewNextSection(sectionActive){

    if (sectionActive == "Material") {
  //    alert("me dirijo a materiales");
      previewMaterial.showMaterialPreview("flex");
      previewLanyardType.showTypeLanyardPreview("none");
    }
    else if (sectionActive == "Lanyard type") {
      // Se hace una consulta con un ajax request,  el resultado va a ser one- two ends  y el width. Luego del resultado se envia  el width y el typeLanyard
      previewLanyardType.showSelectedPreviewtTemplate("one-end", "25mm");
      previewMaterial.showMaterialPreview("none");
      previewLanyardType.showTypeLanyardPreview("flex");
    }
    else if (sectionActive == "Width") {

    }


  }
}


var sections = document.querySelectorAll(".section");
var currentIndex = 0;
var preview = document.getElementById("preview");
var next = document.getElementById("next");


const customizeLanyardPanel = document.getElementById("customize-lanyard");

const closeCustomizeLanyard = document.getElementById("close-customize-lanyard");

const nameSectionCustomizeLanyard = document.getElementsByClassName("name-section-customize-lanyard");




const customizeLanyard = new CustomizeLanyard();
