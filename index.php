<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <style media="screen">
    body{
      margin: 0px;
      padding: 0px;
    }
    .background{
      position: relative;
      background-image: url('img/background.png');
      position: relative;
      height: 100vh;
      width: auto;
      background-size: cover;

      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      align-items: center;
    }
    .containerImage{
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      align-items: center;
      background: yellow;
    }
    .image{
      position: relative;
      width: 300px;
      background: green;
      margin: 10px;
      height: 600px;
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      align-items: center;

    }
    .image img{
      position: relative;
      height: 100%;

    }

    @media (max-width: 660px) {
      .hide{
      display: none;
      }
    }

    </style>
    <section>
      <div class="background">
        <div class="containerImage">
          <div class="image">
            <img src="img/LanyardLeft.png" alt="">
          </div>
          <div class="image hide">
            <img src="img/LanyardRigth.png" alt="">
          </div>
        </div>
      </div>
    </section>
    <script type="text/javascript">

    </script>
  </body>
</html>
