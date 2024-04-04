class Price {
  constructor() {
    amountLanyards.addEventListener('input', function(event) {
    this.value = this.value.replace(/\D/g, ''); // Reemplaza cualquier carácter que no sea un dígito con una cadena vacía
    amountLanyardsRange.value = this.value;

});
  amountLanyardsRange.addEventListener('input', function() {
      // Actualizar el valor del input text con el valor del input range
    //  amountLanyards.value = this.value;
    if (amountLanyards.value =! 0) {
      amountLanyards.value = this.value;
    }
  });

  }

  changePricePerLanyard(price){
    pricePerLanyard.innerHTML = "£"+price;
  }
  calculatePricePerMaterialWithAmount(materials, amountSelected){
    var index = 0;
    let minAmount = materials.allAmount[0]["min-amount"];
    let maxAmount = materials.allAmount[0]["max-amount"];

    for (let i = 1; i < materials.allAmount.length; i++) {
        minAmount = Math.min(minAmount, materials.allAmount[i]["min-amount"]);
        maxAmount = Math.max(maxAmount, materials.allAmount[i]["max-amount"]);
    }

    let price = 0;

    for (let i = 0; i < materials.allAmount.length; i++) {
        if (amountSelected >= materials.allAmount[i]["min-amount"] && amountSelected <= materials.allAmount[i]["max-amount"]) {
            price = materials.allAmount[i].price;
            index = i;
        }

  }
  return price;
  //material.updatePriceMaterial(price, index);
  //alert("min: " + minAmount + " max: " + maxAmount + " price: " + price);
}
}
const amountLanyardsRange = document.getElementById("amountLanyardsRange");
const pricePerLanyard = document.getElementById("pricePerLanyard");
const amountLanyards = document.getElementById("amountLanyards");
const priceClass = new Price();
