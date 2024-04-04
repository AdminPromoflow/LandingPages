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
}
const amountLanyardsRange = document.getElementById("amountLanyardsRange");
const pricePerLanyard = document.getElementById("pricePerLanyard");
const amountLanyards = document.getElementById("amountLanyards");
const min = 1;
const max = 25000;
const priceClass = new Price();
