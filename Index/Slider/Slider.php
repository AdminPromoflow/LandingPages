<style media="screen">
  .sliderContainer{
    position: relative;
    width: 100%;
    height: 70vh;
    overflow: hidden;
    background: rgb(7,12,21);
    background: linear-gradient(360deg, rgba(7,12,21,1) 1%, rgba(19,54,84,1) 100%);
    border-bottom: 20px solid #071E36;
  }
  .sliderLong{
    position: relative;
    width: 400%;
    height: 100%;
    left: 0%;

    display: flex;
    justify-content: flex-start;
    flex-wrap: nowrap;
    flex-direction: row;
    transition: left 1.5s;
    overflow-y: hidden;
  }
  .slider{
    position: relative;
    width: 25%;
    height: 100%;
    overflow-x: hidden;

    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    flex-direction: row;
    align-items:flex-start;
    overflow-y: hidden;

  }
  .imageSlider{
    position: relative;
    width: 65%;
    height: 90%;
    overflow-y: hidden;

  }
  .messageSlider{
    position: relative;
    width: 35%;
    height: 90%;

    display: flex;
    justify-content: center;
    flex-wrap: nowrap;
    flex-direction: column;
    align-items:center;
  }

  .buttonSliderContainer{
    position: absolute;
    bottom: 0px;
    left: 0px;
    width: 100%;
    height: 10%;

    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    flex-direction: row;
    align-items: center;

    z-index: 0;
  }
  .buttonSlider{
    position: relative;
    height: 10px;
    width: 10px;
    background-color: white;
    margin: 5px;
    border-radius: 50%;
    cursor: pointer;
  }
  .imageSlider img{
    position: relative;
    height: auto;
    width: 85%;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    filter: drop-shadow(5px 5px 8px black);
  }
  .messageSlider h2{
    position: relative;
    font-size: calc(2.2vw + 0.8em);
    font-weight: 300;
    width: 90%;
    color: rgba(255, 255, 255, .9);
    text-align: center;
  }
  .messageSlider button{
    padding: calc(0.1vw + 0.1em) calc(3.3vw + 0.3em);
    z-index: 10;
    max-height: 50px;
    font-size: calc(1vw + 1em);
    font-weight: 200;
    border-radius: 5px;
    cursor: pointer;
  }
  .buttonColor1{
    background-color: #7B3378;
    color: white;
  }
  .buttonColor2{
    background-color: #E66503;
    color: white;
  }
  .buttonColor3{
    background-color: #BC9B5A;
    color: black;
  }
  .buttonColor4{
    background-color: #4B6E33;
    color: white;
  }
  .width500{
    font-weight: 500;
    text-shadow: 1px 1px 0px rgba(255, 255, 255, .6);
  }
  .width300{
    font-weight: 300;
    text-shadow: 2px 2px 0px black;
  }
  @media only screen and (max-width: 800px)  and (orientation: portrait) {
    .slider{
      flex-direction: column;
    }
    .messageSlider{
      width: 100%;
      height: 45%;
    }
    .imageSlider{
      width: 100%;
      height: 45%;
    }
    .imageSlider img{
      width: auto;
      height: 100%;
    }
    .reverseSlider{
      order: 1;
    }
  }
</style>
<section class="sliderContainer">

  <div id="sliderLong" class="sliderLong">
    <div class="slider ">
      <div class="messageSlider  reverseSlider">
            <h2>This is the Launchpad for Your Lanyard Journey</h2>
            <button class="buttonColor1" type="button" name="button"><strong  class="width300">Start</strong></button>
      </div>
      <div class="imageSlider">
        <img src="../Index/Slider/img/imagen1.png" alt="">
      </div>

    </div>
    <div class="slider">
      <div class="imageSlider">
        <img src="../Index/Slider/img/imagen2.png" alt="">
      </div>
      <div class="messageSlider">
        <h2>Begin with Material Selection for Unique Lanyards</h2>
        <button class="buttonColor2" type="button" name="button"><strong  class="width300">Start</strong></button>
      </div>

    </div>
    <div class="slider">

      <div class="imageSlider">
        <img src="../Index/Slider/img/imagen3.png" alt="">
      </div>
      <div class="messageSlider">
        <h2>Start customizing with our most popular lanyard</h2>
        <button class="buttonColor3" type="button" name="button"><strong  class="width500">Start</strong></button>
      </div>
    </div>
    <div class="slider">
      <div class="imageSlider">
        <img src="../Index/Slider/img/imagen4.png" alt="">
      </div>
      <div class="messageSlider">
        <h2>Personalize: Start Your Lanyard Adventure Fresh</h2>
        <button class="buttonColor4" type="button" name="button"><strong  class="width300">Start</strong></button>
      </div>

    </div>
  </div>
  <div class="buttonSliderContainer">
    <div class="buttonSlider">
    </div>
    <div class="buttonSlider">
    </div>
    <div class="buttonSlider">
    </div>
    <div class="buttonSlider">
    </div>
  </div>
</section>
<script type="text/javascript">

var currentSlide = 0;
var sliderLong  = document.getElementById("sliderLong");
const buttonSlider = document.querySelectorAll('.buttonSlider');

sliderLong.style.left = "0%";
buttonSlider[0].style.background = "#7B3378";

function nextSlide(currentSlide) {
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

 function toSlide(left, zero, one, two, three){
   sliderLong.style.left = left;
   buttonSlider[0].style.background = zero;
   buttonSlider[1].style.background = one;
   buttonSlider[2].style.background = two;
   buttonSlider[3].style.background = three;
 }

 function getSlide(){
   const text = sliderLong.style.left;
   const numbers = text.match(/\d+/);
   const number = parseInt(numbers[0], 10)/100;

   const currentSlide = (number < 3) ? number + 1 : 0;
   nextSlide(currentSlide);
 }

 for (let i = 0; i < buttonSlider.length; i++) {
   buttonSlider[i].addEventListener("click", function(){
     nextSlide(i);
   })
 }

 setInterval(getSlide, 4000);

</script>
