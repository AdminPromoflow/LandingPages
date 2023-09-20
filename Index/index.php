<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,200&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <title></title>
  </head>
  <body>
    <style media="screen">
      body{
        margin: 0px;
        padding: 0px;
        background: #051527;
      }
      .background{
        position: relative;
        background-image: url('../Index/img/background.png');
        position: relative;
        height: 120vh;
        width: auto;
        background-size: cover;
        filter: brightness(1.7);

        background-color: #cccccc; /* Used if the image is unavailable */
        background-position: center; /* Center the image */
        background-repeat: no-repeat; /* Do not repeat the image */
        padding: 3vw;

        display: flex;
        justify-content: center;
        flex-wrap: wrap;
      }
      .container{
        position: relative;
        height: 90%;
        width: 80vw;
        background: rgb(8,12,20);
        background: linear-gradient(90deg, rgba(8,12,20,1) 0%, rgba(78,121,116,1) 49%, rgba(44,71,76,1) 100%);
        overflow-y: scroll;
        box-shadow: 30px 30px  40px black;
        border-radius: 10px;
        box-shadow: 30px 30px  40px rgba(20,20,20,.5), -30px -30px  40px rgba(30,30,30,.5);
        filter: brightness(0.6);
        min-width: 300px;
          }
      .content{
        position: relative;
        height: 2000px;
      }
      .content img{
        position: relative;
        width: 100%;
      }
    </style>
    <section>
      <div class="background">
        <div class="container">
          <div class="content">
            <?php include "../General/Menu/Menu.php" ?>
            <img src="../Index/img/Example.png" alt="">
          </div>
        </div>
      </div>
    </section>
    <script type="text/javascript">

    </script>
  </body>
</html>
