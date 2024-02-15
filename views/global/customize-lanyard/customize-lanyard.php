<link rel="stylesheet" href="../assets/css/global/customize-lanyard/style.css">


<section id="customize-lanyard" class="customize-lanyard">
  <div class="customize-lanyard-container">

    <div class="preview-customize-lanyard">
      <h2>Customize lanyard</h2>
      <br>
      <?php include "../../views/global/customize-lanyard/sections2/preview-material.php"?>
      <?php include "../../views/global/customize-lanyard/sections2/preview-lanyard-type.php"?>

    </div>
    <div class="options-customize-lanyard">
      <div id="close-customize-lanyard" class="close-customize-lanyard">
        <img src="../../views/assets/img/global/customize-lanyard/close.png" alt="">
      </div>
      <?php include "../../views/global/customize-lanyard/sections/price.php"?>
      <?php include "../../views/global/customize-lanyard/sections/material.php"?>
      <?php include "../../views/global/customize-lanyard/sections/one-two-ends.php"?>
      <?php  include "../../views/global/customize-lanyard/sections/width.php"?>

      <div class="container_buttons_next_preview">
        <button id="preview" type="button" name="button">Preview</button>
        <button id="next" type="button" name="button">Next</button>
      </div>
    </div>
  </div>
</section>



<script src="../../views/assets/js/customize-lanyard/app.js"></script>
