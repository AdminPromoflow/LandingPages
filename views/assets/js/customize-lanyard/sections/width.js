class Width {
  constructor(){
    for (let i = 0; i < containerBoxesWidth.length; i++) {
      containerBoxesWidth[i].addEventListener("click", function(){
        widthClass.showSelectedWidth(dataWidth[i].textContent);

        previewLanyardType.showSelectedPreviewtTemplate("one-end", dataWidth[i].textContent);

      })
    }
  }

  createWidth(data, index){
    containersBoxesWidth.innerHTML +=
  '  <div class="container_boxes_width">'+
          '<img src="../../'+data["imgLink"]+'" alt="">'+
          '<h4 class="dataWidth">'+data["width"]+'</h4>'+
          '<h3 class="priceWidth">+£'+data["price"]+' per unit</h3>'+
        '</div>'
    ;
  }
  cleanWidth(){
    containersBoxesWidth.innerHTML = "";
  }

  showSelectedWidth(data){

  //  const containerBoxesWidth = document.querySelectorAll(".container_boxes_width");

  //  const dataWidth = document.querySelectorAll(".dataWidth");

    var index;

   for (var i = 0; i < dataWidth.length; i++) {
     if (dataWidth[i].textContent == data) {
       index = i;
     }
   }

    for (var i = 0; i < containerBoxesWidth.length; i++) {
      if (index == i) {
        containerBoxesWidth[i].style.border = "2px solid white";
      }
      else {
        containerBoxesWidth[i].style.border = "2px solid transparent";
      }
    }


  }
}

// la siguiente linea se va a eliminar porque se van a crear box-width automaticos
const containerBoxesWidth = document.querySelectorAll(".container_boxes_width");
const containersBoxesWidth = document.getElementById("containers_boxes_width");

const dataWidth = document.querySelectorAll(".dataWidth");
const widthClass = new Width();
