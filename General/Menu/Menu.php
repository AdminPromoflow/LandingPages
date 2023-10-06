<style media="screen">
  .menu{
    position: sticky;
    top: 0px;
    left: 0px;
    height: 80px;

    width: 100%;
    background-color: rgba(255,255,255,.4);
    z-index: 12;
    box-shadow: 12px 0px 15px rgba(0,0,0,.3);
    font-family: 'IBM Plex Sans Condensed', sans-serif;

  }
  .logo{
    position: absolute;
    height: 100%;
    width: 25%;
    left: 1vw;
  }
  .logo img{
    position: relative;
    left: 0px;
    width: 100%;
    height: auto;
    top: 50%;
    transform: translateY(-50%);
    filter: drop-shadow(1px 1px 1px rgba(0,0,0,.9));
  }
  .containerItems{
    position: absolute;
    height: 100%;
    width: 50%;
    left: calc(2vw + 25%);
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .containerItems h3, .containerItems2 h3{
    position: relative;
    display: inline-block;
    margin: 0px;
    margin: 0;
    font-weight: 400;
    cursor: pointer;
    border-bottom: 2px solid transparent;
    padding: 0 8px;
    border-left: 3px solid black;
    text-shadow: 1px 1px 2px rgba(34, 61, 67, .3);
    transition: .5s;
  }
  .transparentLeftLine{
    border-left: 2px solid transparent!important;
  }
  .containerItems h3:hover{
    text-shadow: 1px 1px 0px rgba(34, 61, 67, 1);
  }
  .containerItems2{
    position: absolute;
    height: 100%;
    width: calc(25% - 4vw);
    left: calc(3vw + 75%);
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .containerItems2 img{
    width: 40px;
    padding: 0 10px;
    filter: drop-shadow(1px 1px rgba(0, 0, 0, 1));
    cursor: pointer;
  }
  .containerItems3{
    position: absolute;
    height: 100%;
    width: calc(25% - 4vw);
    left: calc(3vw + 75%);
    display: flex;
    justify-content: center;
    align-items: center;
    display: none;
  }
  .containerItems3 img{
    width: 35px;
    padding: 0 10px;
    filter: drop-shadow(1px 1px 2px rgba(0, 0, 0, 1));
    cursor: pointer;
  }
  .containerItems3 img:hover{
    width: 35px;
    padding: 0 10px;
    filter: drop-shadow(2px 2px 3px rgba(0, 0, 0, 1));
    cursor: pointer;
  }
  .containerItems3 img:nth-child(2){
    width: 28px;
    padding: 0 10px;
    filter: drop-shadow(1px 1px 2px rgba(0, 0, 0, 1));
    cursor: pointer;
    display: none;
  }

  @media only screen and (max-width: 1136px) {
    .containerItems{
      display: none;
    }
    .containerItems2{
      display: none;
    }
    .containerItems3{
      display: flex;
    }
    .logo{
      width: 45%;
    }
    .logo img{
      height: 85%;
      width: auto;
    }
  }
  .menuMobile{
    position: absolute;
    top: 83px;
    left: 100%;
    height: auto;
    width: 300px;
    background-color: rgba(255,255,255,.6);
    z-index: 12;
    border-bottom-left-radius: 5px;
    transition: .5s ease-in-out;
  }
  .menuMobile h3{
    position: relative;
    margin: 0px;
    margin: 0;
    text-align: center;
    font-weight: 400;
    cursor: pointer;
    border-bottom: 1px solid transparent;
    padding: 6px 8px;
    border-bottom: 2px solid black;
    text-shadow: 1px 1px 2px rgba(34, 61, 67, .5);
    transition: .5s;
  }
  .menuMobile h3:nth-child(odd){
    background-color: #8DA8A5;
  }
  .transparentBottonLine{
    border-bottom: 1px solid transparent!important;
    border-bottom-left-radius: 5px;
  }
  .menuMobile h3:hover{
    text-shadow: 1px 1px 0px rgba(34, 61, 67, 1);
  }
</style>
<section class="menu">
  <div class="logo">
    <img src="../General/Menu/img/Logo.png" alt="">
  </div>
  <div class="containerItems">
    <h3 class="transparentLeftLine">Home </h3>
    <h3>Products </h3>
    <h3>My Lanyards </h3>
    <h3>About us </h3>
    <h3>Contact us</h3>
  </div>
  <div class="containerItems2">
    <img src="../General/Menu/img/Checkout.png" alt="">
    <h3 class="openLogin">Login</h3>

  </div>
  <div class="containerItems3">
    <img id="openMenuMobile" src="../General/Menu/img/menu.png" alt="">
    <img id="closeMenuMobile" src="../General/Menu/img/close.png" alt="">

  </div>

  <section id="menuMobile" class="menuMobile">
    <h3>Home </h3>
    <h3>Products </h3>
    <h3>My Lanyards </h3>
    <h3>About us </h3>
    <h3 >Contact us</h3>
    <h3 class="openLogin">Login</h3>
    <h3 class="transparentBottonLine">Checkout </h3>
  </section>

</section>

<script type="text/javascript">
  var openMenuMobile  = document.getElementById("openMenuMobile");
  var closeMenuMobile  = document.getElementById("closeMenuMobile");
  var menuMobile  = document.getElementById("menuMobile");


  openMenuMobile.addEventListener("click" , function(){
    closeMenuMobile.style.display = "block";
    menuMobile.style.left = "calc(100% - 300px)";
    openMenuMobile.style.display = "none";
  })
  closeMenuMobile.addEventListener("click" , function(){
    closeMenuMobile.style.display = "none";
    menuMobile.style.left = "calc(100%)";
    openMenuMobile.style.display = "block";
  })

  document.addEventListener("click", function (event){
    if (!openMenuMobile.contains(event.target)) {
      if (!menuMobile.contains(event.target)) {

        closeMenuMobile.style.display = "none";
        menuMobile.style.left = "calc(100%)";
        openMenuMobile.style.display = "block";
      }
    }


  })
</script>
