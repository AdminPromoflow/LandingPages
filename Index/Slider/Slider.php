<style media="screen">
.slider-container {
    width: 300%;
    overflow: hidden;
}

.slider {
    display: flex;
    transition: transform 1s ease-in-out;
}

.slider img {
    width: 33.333%;
}

.slider-buttons {
    display: flex;
    justify-content: center;
    margin-top: 10px;
}

.slider-buttons button {
    margin: 0 10px;
    padding: 5px 10px;
    background-color: #333;
    color: #fff;
    border: none;
    cursor: pointer;
}
</style>
<div class="slider-container">
       <div class="slider">
         <img src="../Index/Slider/img/imagen1.png" alt="Imagen 1">
           <img src="../Index/Slider/img/imagen2.png" alt="Imagen 2">
           <img src="../Index/Slider/img/imagen3.png" alt="Imagen 3">
       </div>
       <div class="slider-buttons">
           <button onclick="previousSlide()">Anterior</button>
           <button onclick="nextSlide()">Siguiente</button>
       </div>
   </div>
<script type="text/javascript">
const slider = document.querySelector('.slider');
const images = document.querySelectorAll('.slider img');
const imageWidth = images[0].clientWidth;
let currentSlide = 0;

function slideTo(index) {
    slider.style.transform = `translateX(-${index * imageWidth}px)`;
    currentSlide = index;
}

function previousSlide() {
    currentSlide = (currentSlide - 1 + images.length) % images.length;
    slideTo(currentSlide);
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % images.length;
    slideTo(currentSlide);
}

setInterval(nextSlide, 3000); // Cambia de imagen cada 3 segundos



</script>
