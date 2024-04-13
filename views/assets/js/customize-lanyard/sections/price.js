class Price {
  constructor() {
    this.amountSelected = 0;
    // Event listener for input changes on amountLanyards element
    amountLanyards.addEventListener('input', function(event) {
      // Remove non-digit characters from the value
      this.value = this.value.replace(/\D/g, '');
      // Update amountLanyardsRange value to match amountLanyards value
      amountLanyardsRange.value = this.value;
      priceClass.setAmountSelected(amountLanyardsRange.value);

      material.updatePriceMaterial();

    });

    // Event listener for input changes on amountLanyardsRange element
    amountLanyardsRange.addEventListener('input', function() {
      // Check if amountLanyards value is not equal to 0
      if (amountLanyards.value !== 0) {
        // Update amountLanyards value to match amountLanyardsRange value
        amountLanyards.value = this.value;

        priceClass.setAmountSelected(amountLanyards.value);
        material.updatePriceMaterial();

      }
    });
  }

  // Getter method for amount property
  getAmountSelected() {
    return this.amountSelected;
  }

  // Setter method for amount property
  setAmountSelected(value) {
    this.amountSelected = value;
  }

  // Method to change price per lanyard
  changePricePerLanyard(price) {
    // Update the inner HTML of pricePerLanyard element to display the price with currency symbol
    pricePerLanyard.innerHTML = "£" + price;
  }

  // Method to calculate price per material with given amount
  calculatePricePerMaterialWithAmount(materials) {
    //materials = material.getMaterialSelected();
    var amountSelected = priceClass.getAmountSelected();
    let index = 0;
    let minAmount = materials.allAmount[0]["min-amount"];
    let maxAmount = materials.allAmount[0]["max-amount"];

    // Loop to find min and max amount values
    for (let i = 1; i < materials.allAmount.length; i++) {
      minAmount = Math.min(minAmount, materials.allAmount[i]["min-amount"]);
      maxAmount = Math.max(maxAmount, materials.allAmount[i]["max-amount"]);
    }

    let price = 0;

    // Loop to find price based on amount selected
    for (let i = 0; i < materials.allAmount.length; i++) {
      if (amountSelected >= materials.allAmount[i]["min-amount"] && amountSelected <= materials.allAmount[i]["max-amount"]) {
        price = materials.allAmount[i].price;
        index = i;
      }
    }

    // Update values and inner HTML elements

    return price;
  }
}

// DOM element references
const amountLanyardsRange = document.getElementById("amountLanyardsRange");
const pricePerLanyard = document.getElementById("pricePerLanyard");
const amountLanyards = document.getElementById("amountLanyards");

// Create an instance of Price class
const priceClass = new Price();
