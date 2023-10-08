
class Slider {
  constructor() {
    sliderLong.style.left = "0%";
    buttonSlider[0].style.background = "#7B3378";

    for (let i = 0; i < buttonSlider.length; i++) {
      buttonSlider[i].addEventListener("click", function(){
        alert("hahah");
        sliderClass.nextSlide(i);
      })
    }

  }
  nextSlide(currentSlide) {
    if (currentSlide == 1) {
      toSlide("-100%", "white", "#E66503", "white", "white");
    }
    else if (currentSlide == 2) {
      toSlide("-200%", "white", "white", "#BC9B5A", "white");
    }
    else if (currentSlide == 3) {
      toSlide("-300%", "white", "white", "white", "#4B6E33");
    }
    else if (currentSlide == 0) {
      toSlide("0%", "#7B3378", "white", "white", "white");
    }
   }
   toSlide(left, zero, one, two, three){
    sliderLong.style.left = left;
    buttonSlider[0].style.background = zero;
    buttonSlider[1].style.background = one;
    buttonSlider[2].style.background = two;
    buttonSlider[3].style.background = three;
  }

   getSlide(){
    const text = sliderLong.style.left;
    const numbers = text.match(/\d+/);
    const number = parseInt(numbers[0], 10)/100;

    const currentSlide = (number < 3) ? number + 1 : 0;
    nextSlide(currentSlide);
  }

}
var currentSlide = 0;
var sliderLong  = document.getElementById("sliderLong");
const buttonSlider = document.querySelectorAll('.buttonSlider');

const sliderClass = new Slider();

setInterval(sliderClass.getSlide, 4000);
