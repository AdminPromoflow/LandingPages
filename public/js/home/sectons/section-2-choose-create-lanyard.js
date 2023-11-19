class ChooseCreateLanyard {
  constructor() {
    this.selectItems(0, 1, 2);

    chooseCreateLanyardDescriptionContent[0].style.display = "block";

    for (let i = 0; i < chooseCreateLanyardItems.length; i++) {
      chooseCreateLanyardItems[i].addEventListener("click", function(){
        if (i == 0) {
          chooseCreateLanyard.selectItems(0, 1, 2);
        } else if (i == 1) {
          chooseCreateLanyard.selectItems(1, 2, 0);
        } else if (i == 2) {
          chooseCreateLanyard.selectItems(2, 0, 1);
        }
      })
    }

    for (let i = 0; i < chooseCreateLanyardItems.length; i++) {
      arrowUpChooseCreateLanyardStart[i].style.opacity = "0";
      chooseCreateLanyardDescriptionContent[i].addEventListener("scroll", function () {
        chooseCreateLanyard.hideShowArrows(i);
      })
    }




    let scrollCountStart = 1; // Inicialmente se ha hecho un clic

    for (let i = 0; i < arrowUpChooseCreateLanyardStart.length; i++) {
      arrowUpChooseCreateLanyardStart[i].addEventListener("click", function(){
        alert("Start");
      })
    }

    let scrollCountEnd = 1; // Inicialmente se ha hecho un clic
    for (let i = 0; i < arrowUpChooseCreateLanyardEnd.length; i++) {
      arrowUpChooseCreateLanyardEnd[i].addEventListener("click", function(){
        const divHeight = chooseCreateLanyardDescriptionContent[i].scrollHeight;

         const scrollAmount = divHeight * 0.7; // Desplazar un 20% de la altura del div

         chooseCreateLanyardDescriptionContent[i].scrollTop = 150*scrollCountEnd; // Desplazar el porcentaje por el número de clics
         scrollCountEnd++; // Incrementar el contador de clics para el próximo desplazamiento


      })
    }




  }

  hideShowArrows(i){
    const scrollableHeight = chooseCreateLanyardDescriptionContent[i].scrollHeight - chooseCreateLanyardDescriptionContent[i].clientHeight;

    if (chooseCreateLanyardDescriptionContent[i].scrollTop <= 30) {
      arrowUpChooseCreateLanyardStart[i].style.opacity = "0";
    }
    else if (scrollableHeight - chooseCreateLanyardDescriptionContent[i].scrollTop <= 30) {
      arrowUpChooseCreateLanyardEnd[i].style.opacity = "0";
    }
    else {
      arrowUpChooseCreateLanyardStart[i].style.opacity = "1";
      arrowUpChooseCreateLanyardEnd[i].style.opacity = "1";
    }
  }

  selectItems(one, two, three){
    chooseCreateLanyardItems[one].style.border = "1px solid white ";
    chooseCreateLanyardItems[two].style.border = "1px solid transparent ";
    chooseCreateLanyardItems[three].style.border = "1px solid transparent ";

    colourBoxchooseCreateLanyard[one].style.display = "block";
    colourBoxchooseCreateLanyard[two].style.display = "none";
    colourBoxchooseCreateLanyard[three].style.display = "none";

    chooseCreateLanyardDescriptionContent[one].style.display = "block";
    chooseCreateLanyardDescriptionContent[two].style.display = "none";
    chooseCreateLanyardDescriptionContent[three].style.display = "none";

  }

}


const chooseCreateLanyardItems = document.querySelectorAll(".chooseCreateLanyardItems");

const chooseCreateLanyardDescriptionContent = document.querySelectorAll(".chooseCreateLanyardDescriptionContent");

const colourBoxchooseCreateLanyard = document.querySelectorAll(".colourBoxchooseCreateLanyard");

const arrowUpChooseCreateLanyardStart = document.querySelectorAll(".arrowUpChooseCreateLanyardStart");

const arrowUpChooseCreateLanyardEnd = document.querySelectorAll(".arrowUpChooseCreateLanyardEnd");




const chooseCreateLanyard = new ChooseCreateLanyard();
