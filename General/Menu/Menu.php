<style media="screen">
  .menu{
    position: sticky;
    top: 0px;
    left: 0px;
    height: 6vw;
    min-height: 60px;
    max-height: 100px;
    width: 100%;
    background-color: rgba(255,255,255,.4);
    z-index: 10;
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
    border-left: 2px solid black;
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
    <h3>Login</h3>

  </div>
</section>
<script type="text/javascript">

</script>
