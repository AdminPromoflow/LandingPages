var openMenuMobile  = document.getElementById("openMenuMobile");
var closeMenuMobile  = document.getElementById("closeMenuMobile");
var menuMobile  = document.getElementById("menuMobile");


openMenuMobile.addEventListener("click" , function(){
  closeMenuMobile.style.display = "block";
  menuMobile.style.left = "calc(100% - 300px)";
  openMenuMobile.style.display = "none";
})
closeMenuMobile.addEventListener("click" , function(){
  closeMenuMobile.style.display = "none";
  menuMobile.style.left = "calc(100%)";
  openMenuMobile.style.display = "block";
})

document.addEventListener("click", function (event){
  if (!openMenuMobile.contains(event.target)) {
    if (!menuMobile.contains(event.target)) {

      closeMenuMobile.style.display = "none";
      menuMobile.style.left = "calc(100%)";
      openMenuMobile.style.display = "block";
    }
  }


})
