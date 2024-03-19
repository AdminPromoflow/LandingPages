class Price {
  constructor() {


  }

  changePricePerLanyard(price){
    pricePerLanyard.innerHTML = "£"+price;
  }
}
const pricePerLanyard = document.getElementById("pricePerLanyard");
const priceClass = new Price();
