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

<!-- MODAL PARA EL REGISTRO -->
<div class="modal fade" id="modalRegistro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="form-title text-center">
          <h4>REGISTRARSE</h4>
        </div>

        <div class="d-flex flex-column text-center">
          <form method="post">
            <div class="form-group">
              <input type="text" class="form-control" id="regUsuario" name="regUsuario" placeholder="Nombre de usuario" required>
            </div>
            <div class="form-group">
              <input type="email" class="form-control" id="regEmail" name="regEmail" placeholder="Correo Electronico" required>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="regPassword" name="regPassword" placeholder="Contraseña" required>
            </div>

            <input type="submit" class="btn btn-danger btn-block btn-round" value="REGISTRARSE">
          </form>
          
          <div class="text-center text-muted delimiter">Ingresar con redes sociales</div>
          <div class="d-flex justify-content-center social-buttons">
            <button type="button" class="btn btn-danger btn-round" data-toggle="tooltip" data-placement="top" title="Facebook">
              <i class="social_facebook"></i>
            </button>
            <button type="button" class="btn ml-3 btn-danger btn-round" data-toggle="tooltip" data-placement="top" title="Google">
              <i class="fa fa-google"></i>
            </button>
          </div>
        </div>
      </div>
      
      <div class="modal-footer d-flex justify-content-center">
        <div class="signup-section">Ya tienes cuenta? <a href="#loginModal" data-toggle="modal" data-dismiss="modal" data-target="#loginModal" class="text-danger"> Ingresa</a>.</div>
      </div>
    </div>
  </div>
</div>

<!-- MODAL LOGIN -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="form-title text-center">
          <h4>INGRESAR</h4>
        </div>

        <div class="d-flex flex-column text-center">
          <form method="post">
            <div class="form-group">
              <input type="email" class="form-control" id="email1" id="ingEmail" name="ingEmail" placeholder="Correo Electronico" required>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="ingPassword" name="ingPassword" placeholder="Contraseña" required>
            </div>
            <input type="submit" class="btn btn-danger btn-block btn-round" value="INGRESAR">
          </form>
          
          <div class="text-center text-muted delimiter">Ingresar con redes sociales</div>
          <div class="d-flex justify-content-center social-buttons">
            <button type="button" class="btn btn-danger btn-round" data-toggle="tooltip" data-placement="top" title="Facebook">
              <i class="social_facebook"></i>
            </button>
            <button type="button" class="btn ml-3 btn-danger btn-round" data-toggle="tooltip" data-placement="top" title="Google">
              <i class="fa fa-google"></i>
            </button>
          </div>
        </div>
      </div>
      
      <div class="modal-footer d-flex justify-content-center">
        <div class="signup-section">No tienes cuenta? <a href="#modalRegistro" data-dismiss="modal" data-toggle="modal" class="text-danger"> Registrate</a>.</div>
        <div class="signup-section"><a href="#modalPassword" data-dismiss="modal" data-toggle="modal" class="text-danger"> Olvidaste tu Contraseña?</a>.</div>
      </div>
    </div>
  </div>
</div>

<!-- MODAL PARA OLVIDO DE CONTRASEÑA -->
<div class="modal fade" id="modalPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="form-title text-center">
          <h4>SOLICITUD DE NUEVA CONTRASEÑA</h4>
        </div>

        <div class="d-flex flex-column text-center">
          <form method="post">
            <div class="form-group">
              <label class="text-muted">Escribe el correo electrónico con el que estás registrado y te enviaremos una nueva contraseña:</label>
            </div>
            <div class="form-group">
              <input type="email" class="form-control" id="passEmail" name="passEmail" placeholder="Correo Electronico" required>
            </div>
            <input type="submit" class="btn btn-danger btn-block btn-round" value="ENVIAR">
          </form>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <div class="signup-section">No tienes cuenta? <a href="#modalRegistro" data-dismiss="modal" data-toggle="modal" class="text-danger"> Registrate</a>.</div>
      </div>
    </div>
  </div>
</div>