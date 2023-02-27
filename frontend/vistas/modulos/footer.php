<?php
$frontend = Ruta::ctrRuta();
$social = ControladorPlantilla::ctrEstiloPlantilla();
$jsonRedesSociales = json_decode($social['redesSociales'], true);
?>
<!-- Footer Section Begin -->
<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-sm-12">
        <div class="footer__about">
          <div class="footer__logo">
            <a href="<?=$frontend?>"><img src="<?=$servidor.$social['logo']?>" alt="" /></a>
          </div>
          <div class="footer__payment">
            <a><img src="vistas/img/payment/payment-4.png" alt="" /></a>
            <a><img src="vistas/img/payment/payment-1.png" alt="" /></a>
            <a><img src="vistas/img/payment/payment-2.png" alt="" /></a>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-sm-12">
        <div class="footer__newslatter">
          <div class="footer__social">
            <?php foreach ($jsonRedesSociales as $key => $value): ?>
              <a href="<?=$value['url']?>"><i class="fa <?=$value['red']?>"></i></a>
            <?php endforeach ?>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        <div class="footer__copyright__text">
          <p>
            Copyright &copy;
            <script>
              document.write(new Date().getFullYear());
            </script>
            All rights reserved | This template is made with by
            <a href="https://colorlib.com" target="_blank">Colorlib</a> and programmed by <a href="#" target="_blank">Emanuel Sanchez</a>
          </p>
        </div>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
      </div>
    </div>
  </div>
</footer>
<!-- Footer Section End -->

<!-- Search Begin -->
<!-- <div class="search-model">
  <div class="h-100 d-flex align-items-center justify-content-center">
    <div class="search-close-switch">+</div>
    <form class="search-model-form">
      <input type="text" id="search-input" placeholder="Encuentra lo que buscas..." />
    </form>
  </div>
</div> -->

<div class="search-model">
  <div class="h-100 d-flex align-items-center justify-content-center">
    <div class="search-close-switch">+</div>
    <div class="search-model-form" id="buscador">
      <input id="search-input" placeholder="Que es lo que buscas?...">

      <span class="input-group-btn">
        <a href="<?=$frontend?>buscador/1"></a>
      </span>
    </div>
  </div>
</div>
<!-- Search End -->