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
        containersBoxesMaterial.innerHTML = "";

        for (var i = 0; i < data["materials"].length; i++) {
          material.createMaterials(data["materials"][i], i);
        }
      })
      .catch(error => {
        console.error("Error:", error);
      });
  }

  createMaterials(data, index){
    containersBoxesMaterial.innerHTML +=
    '<div class="container_boxes_material"  onclick="material.setMaterialSelected(\'' + data['material']  + '\');">'  +
      '<h4 class="dataMaterial">'+data['material']+'</h4>' +
      '<h3 class="dataMaterial">£'+data['material']+' per unit</h3>' +
    '</div>'
    ;
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
        alert(data);
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



  showSelectedMaterial(data){


    const containerBoxesMaterial = document.querySelectorAll(".container_boxes_material");
    const dataMaterial = document.querySelectorAll(".dataMaterial");

    var index;

   for (var i = 0; i < dataMaterial.length; i++) {
     if (dataMaterial[i].textContent == data["material"]) {
       index = i;
     }
   }

    for (var i = 0; i < containerBoxesMaterial.length; i++) {
      if (index == i) {
        containerBoxesMaterial[i].style.border = "2px solid white";
      }
      else {
        containerBoxesMaterial[i].style.border = "2px solid transparent";
      }
    }


  }
}

const containersBoxesMaterial = document.getElementById("containers_boxes_material");
const material = new Material();
