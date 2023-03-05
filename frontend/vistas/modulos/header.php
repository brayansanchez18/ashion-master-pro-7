<?php
  $logo = ControladorPlantilla::ctrEstiloPlantilla();
?>

<!-- INICIO DE SESION USUARIO -->
<?php if (isset($_SESSION['validarSesion'])): ?>
  <?php if ($_SESSION['validarSesion'] == 'ok'): ?>
    <script>
      localStorage.setItem("usuario","<?=$_SESSION["id"]?>");
    </script>
  <?php endif ?>
<?php endif ?>

<!-- Offcanvas Menu Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
  <div class="offcanvas__close">+</div>
  <ul class="offcanvas__widget">
    <li><span class="icon_search search-switch"></span></li>
    <li>
      <a href="<?=$frontend?>carrito-de-compras">
        <span class="icon_bag_alt"></span>
        <div class="tip cantidadCesta"></div>
      </a>
    </li>

    <?php if (isset($_SESSION['validarSesion'])): ?>
      <?php if ($_SESSION['validarSesion'] == 'ok'): ?>
        <?php if ($_SESSION['modo'] == 'directo'): ?>
          <li>
            <a href="<?=$frontend?>lista-deseos">
              <span class="icon_heart_alt"></span>
            </a>
          </li>

          <?php if ($_SESSION['foto'] != ''): ?>
            <li>
              <a style="width:50px;height:50px;" href="<?=$frontend?>perfil">
                <img class="rounded-circle" src="<?=$frontend.$_SESSION['foto']?>" width="100%">
              </a>
            </li>
          <?php else: ?>
            <li>
              <a style="width:50px;height:50px;" href="<?=$frontend?>perfil">
                <img class="rounded-circle" src="<?=$backend?>vistas/img/usuarios/default/anonymous.png" width="100%">
              </a>
            </li>
          <?php endif ?>
        <?php endif ?>
      <?php endif ?>
    <?php endif ?>
  </ul>
  <div class="offcanvas__logo">
    <a href="<?=$frontend?>"><img src="<?=$servidor.$logo['logo']?>" alt="" /></a>
  </div>
  <div id="mobile-menu-wrap"></div>
  <div class="offcanvas__auth">
    <?php if(!isset($_SESSION['validarSesion'])): ?>
      <a class="btnIngreso" href="#loginModal" data-toggle="modal">INGRESAR</a>
      <a class="btnRegistro" href="#modalRegistro" data-toggle="modal">REGISTRARSE</a>
    <?php endif ?>
  </div>
</div>
<!-- Offcanvas Menu End -->

<!-- Header Section Begin -->
<header class="header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-3 col-lg-2">
        <div class="header__logo">
        <a href="<?=$frontend?>"><img src="<?=$servidor.$logo['logo']?>" alt="" /></a>
        </div>
      </div>
      <div class="col-xl-6 col-lg-7">
        <nav class="header__menu">
          <ul>
            <li><a href="<?=$frontend?>">Inicio</a></li>
            <li><a href="<?=$frontend?>tienda">Catalogo</a></li>
            <li><a href="#">Ofertas</a></li>
            <li><a href="./contact.html">Contacto</a></li>
          </ul>
        </nav>
      </div>
      <div class="col-lg-3">
        <div class="header__right">
          <div class="header__right__auth">
          <?php if(!isset($_SESSION['validarSesion'])): ?>
            <a class="btnIngreso" href="#loginModal" data-toggle="modal" data-target="#loginModal">INGRESAR</a>
            <a class="btnRegistro" href="#modalRegistro" data-toggle="modal">REGISTRARSE</a>
          <?php endif ?>
          </div>
          <ul class="header__right__widget">
            <li><span class="icon_search search-switch"></span></li>
            <li>
              <a href="#"
                ><span class="icon_heart_alt"></span>
                <div class="tip">2</div>
              </a>
            </li>

            <?php if (isset($_SESSION['validarSesion'])): ?>
              <?php if ($_SESSION['validarSesion'] == 'ok'): ?>
                <?php if ($_SESSION['modo'] == 'directo'): ?>
                  <li>
                    <a href="<?=$frontend?>lista-deseos">
                      <span class="icon_heart_alt"></span>
                    </a>
                  </li>

                  <?php if ($_SESSION['foto'] != ''): ?>
                    <li>
                      <a style="width:50px;height:50px;" href="<?=$frontend?>perfil">
                        <img class="rounded-circle" src="<?=$frontend.$_SESSION['foto']?>" width="100%">
                      </a>
                    </li>
                  <?php else: ?>
                    <li>
                      <a style="width:50px;height:50px;" href="<?=$frontend?>perfil">
                        <img class="rounded-circle" src="<?=$servidor?>vistas/img/usuarios/default/anonymous.png" width="100%">
                      </a>
                    </li>
                  <?php endif ?>

                <?php endif ?>
              <?php endif ?>
            <?php endif ?>
          </ul>
        </div>
      </div>
    </div>
    <div class="canvas__open">
      <i class="fa fa-bars"></i>
    </div>
  </div>
</header>
<!-- Header Section End -->