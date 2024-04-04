class Material {
  constructor() {
    const url = "../../controller/lanyard/material.php";
    const data = {
      action: "getMaterials"
    };
    this.makeAjaxRequestGetAllMaterials(url, data);

  }
  // Function to make the AJAX request
  makeAjaxRequestGetAllMaterials(url, data) {
    // Make the request using the Fetch API
    fetch(url,{
      method: "POST", // HTTP POST method to send data
      headers: {
        "Content-Type": "application/json" // Indicate that you're sending JSON
      },
      body: JSON.stringify(data) // Convert the JSON object to a JSON string and send it.
    })
      .then(response => {
        if (response.ok) {
          return response.text(); // or response.json() if you expect a JSON response
        }
        throw new Error("Network error.");
      })
      .then(data => {
        //alert(data);
        data = JSON.parse(data);
        materials = data;
        containersBoxesMaterial.innerHTML = "";

        for (var i = 0; i < data["materials"].length; i++) {
          material.createMaterials(data["materials"][i], priceClass.calculatePricePerMaterialWithAmount(data["materials"][i], 1000));
          ;
        }
      })
      .catch(error => {
        console.error("Error:", error);
      });
  }

  createMaterials(data, price){
    containersBoxesMaterial.innerHTML +=
    '<div class="container_boxes_material"  onclick="material.setMaterialSelected(\'' + data['material']  + '\');">'  +
      '<h4 class="dataMaterial">'+data['material']+'</h4>' +
      '<h3 class="pricesDataMaterial">£ '+ price +' per unit</h3>' +
    '</div>'
    ;
    //var test = JSON.stringify(materials);
    //alert(test);
  }
  updatePriceMaterial(price, index){
    const pricesDataMaterial = document.querySelectorAll(".pricesDataMaterial");
    //alert(index);
    //pricesDataMaterial[index].innerHTML = price;
  }
  setMaterialSelected(material){

    const url = "../../controller/lanyard/material.php";
    const data = {
      action: "setMaterialSelected",
      optionSelected: material

    };
    this.makeAjaxRequestSetMaterialSelected(url, data);
  }
  // Function to make the AJAX request
  makeAjaxRequestSetMaterialSelected(url, data) {
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
        console.log(data);
       data = JSON.parse(data);

        material.showSelectedMaterial(data["material"]);
        previewMaterial.showSelectedPreviewtMaterial(data["material"]);

        priceClass.changePricePerLanyard(data["amountPriceSelected"]);

        oneTwoEndsClass.cleanOneTwoEnds();
        widthClass.cleanWidth();

        for (var i = 0; i < data["allLanyardTypes"].length; i++) {
          oneTwoEndsClass.createOneTwoEnds(data["allLanyardTypes"][i], i);
        }

        for (var i = 0; i < data["allWidth"].length; i++) {
          widthClass.createWidth(data["allWidth"][i], i);
        }

        oneTwoEndsClass.showSelectedOneTwoEnds(data["lanyardTypesSelected"]);

      })
      .catch(error => {
        console.error("Error:", error);
      });
  }


  showSelectedMaterial(data) {
      const containerBoxesMaterial = document.querySelectorAll(".container_boxes_material");
      const material = data["material"];

      // Reiniciar el estilo de todos los contenedores
      containerBoxesMaterial.forEach(container => {
          container.style.border = "2px solid transparent";
      });

      // Buscar y resaltar el contenedor del material deseado
      containerBoxesMaterial.forEach(container => {
          const dataMaterial = container.querySelector(".dataMaterial");
          if (dataMaterial.textContent === material) {
              container.style.border = "2px solid white";
          }
      });
  }

}

var materials = {};

const containersBoxesMaterial = document.getElementById("containers_boxes_material");
const material = new Material();
