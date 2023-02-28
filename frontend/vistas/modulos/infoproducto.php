<?php
  $comercio = ControladorPlantilla::ctrMostrarDivisa();
  $divisa = $comercio['divisa'];

  $item = 'ruta'; $valor = $rutas[0];
  $infoproducto = ControladorProductos::ctrMostrarInfoproducto($item, $valor);
  $multimedia = json_decode($infoproducto['multimedia'], true);
?>

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcrumb__links">
          <a href="<?=$frontend?>"><i class="fa fa-home"></i> INICIO</a>
          <span class="pagActiva text-uppercase"><?=$infoproducto['titulo']?></span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Breadcrumb End -->

<!-- CONTENEDOR PARA EL CONTADOR DE VISTAS -->
<?php if ($infoproducto['precio'] == 0): ?>
  <span class="vistas d-none" tipo="<?=$infoproducto['precio']?>"><?=$infoproducto['vistasGratis']?></span>
<?php else: ?>
  <span class="vistas d-none" tipo="<?=$infoproducto['precio']?>"><?=$infoproducto['vistas']?></span>
<?php endif ?>

<!-- Product Details Section Begin -->
<section class="product-details spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="product__details__pic">
          <div class="product__details__pic__left product__thumb nice-scroll">
            <?php if ($multimedia != null): ?>
              <?php for ($i=0; $i < count($multimedia); $i++): ?>
                <a class="pt" href="#product-<?=$i?>">
                  <img src="<?=$servidor.$multimedia[$i]['foto']?>" alt="<?=$infoproducto['titulo']?>">
                </a>
              <?php endfor ?>
            <?php endif ?>
          </div>

          <div class="product__details__slider__content">
            <div class="product__details__pic__slider owl-carousel">
              <?php for ($i=0; $i < count($multimedia); $i++): ?>
                <img data-hash="product-<?=$i?>" class="product__big__img" src="<?=$servidor.$multimedia[$i]['foto']?>" alt="<?=$infoproducto['titulo']?>">
              <?php endfor ?>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="product__details__text">
          <h3><?=$infoproducto['titulo']?></h3>

          <?php if ($infoproducto['precio'] == 0): ?>
            <div class="product__details__price">GRATIS</div>
          <?php else: ?>
            <?php if ($infoproducto['oferta'] != 0): ?>
              <div class="product__details__price">
                $<?=$infoproducto['precioOferta']?> <span>$<?=$infoproducto['precio']?> <?=$divisa?></span>
              </div>
            <?php else: ?>
              <div class="product__details__price">$<?=$infoproducto['precio']?> <?=$divisa?></div>
            <?php endif ?>
          <?php endif ?>

          <?php if (strlen($infoproducto['descripcion']) > 300): ?>
            <?php $descripcion = substr($infoproducto['descripcion'], 0, 300) . '...'; ?>
            <p><?=$descripcion?></p>
          <?php else: ?>
            <p><?=$infoproducto['descripcion']?></p>
          <?php endif ?>
          <hr>
          <?php if ($infoproducto['stock'] != 0): ?>
            <div class="col-12 h4 text-muted"><strong><?=$infoproducto['stock']?></strong> Unidades Disponibles</div>
          <?php else: ?>
            <div class="col-12 h4 text-muted">AGOTADO</div>
          <?php endif ?>

          <?php if ($infoproducto['stock'] != 0): ?>
            <div class="product__details__widget d-flex flex-wrap">
              <?php if ($infoproducto['detalles'] != null): ?>
                <?php $detalles = json_decode($infoproducto['detalles'], true); ?>

                <?php if ($detalles['Talla'] != null): ?>
                  <div class="col-6">
                    <select class="form-control seleccionarDetalle" id="seleccionarTalla">
                    <option value="">Talla</option>
                      <?php for ($i = 0; $i < count($detalles['Talla']); $i++): ?>
                        <option value="<?=$detalles['Talla'][$i]?>"><?=$detalles['Talla'][$i]?></option>
                      <?php endfor ?>
                    </select>
                  </div>
                <?php endif ?>

                <?php if ($detalles['Color'] != null): ?>
                  <div class="col-6">
                    <select class="form-control seleccionarDetalle" id="seleccionarColor">
                    <option value="">Color</option>
                      <?php for ($i = 0; $i < count($detalles['Color']); $i++): ?>
                        <option value="<?=$detalles['Color'][$i]?>"><?=$detalles['Color'][$i]?></option>
                      <?php endfor ?>
                    </select>
                  </div>
                <?php endif ?>
              <?php endif ?>
            </div>
          <?php endif ?>

          <hr>
          <?php if ($infoproducto['stock'] != 0): ?>
            <?php if ($infoproducto['tipo'] == 'fisico'): ?>
              <div class="product__details__button">
                <a href="#" class="cart-btn"><span class="icon_bag_alt"></span> Agregar al carrito</a>
                <ul>
                  <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                </ul>
              </div>
            <?php else: ?>
              <div class="product__details__button">
                <a href="#" class="cart-btn"><span class="icon_bag_alt"></span> Agregar al carrito</a>
                <a href="#" class="cart-btn"><span class="icon_wallet"></span> Comprar Ahora</a>
                <ul>
                  <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                </ul>
              </div>
            <?php endif ?>
          <?php else: ?>
            <div class="product__details__button">
              <a href="#" class="cart-btn"><span class="icon_heart_alt"></span> Agregar a lista de deseos</a>
            </div>
          <?php endif ?>
        </div>
      </div>

      <div class="col-lg-12">
        <div class="product__details__tab">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Descripción</a>
            </li>
          </ul>

          <div class="tab-content">
            <div class="tab-pane active" id="tabs-1" role="tabpanel">
              <p><?=$infoproducto['descripcion']?></p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
      $item = 'id'; $valor = $infoproducto['id_subcategoria'];
      $rutaDestacados = ControladorProductos::ctrMostrarSubCategorias($item, $valor);
    ?>

    <div class="row">
      <div class="col-lg-12 text-center">
        <div class="related__title">
          <h5><a class="titular" href="<?=$frontend.$rutaDestacados[0]['ruta']?>" target="_blank">PRODUCTOS RELACIONADOS</a></h5>
        </div>
      </div>

      <?php
        $ordenar = ''; $modo = 'Rand()';
        $item = 'id_subcategoria'; $valor = $infoproducto['id_subcategoria'];
        $base = 0; $tope = 4;
    
        $relacionados = ControladorProductos::ctrMostrarProductos($ordenar, $item, $valor, $base, $tope, $modo);
      ?>

      <?php if (!$relacionados): ?>
        <div class="col-12">
					<h1><small>¡Oops!</small></h1>
					<h2>No hay productos relacionados</h2>
				</div>
      <?php else: ?>
        <?php foreach ($relacionados as $key => $value): ?>
          <div class="col-lg-3 col-md-4 col-sm-6">
            <?php if ($value['oferta'] != 0): ?>
              <div class="product__item sale">
            <?php else: ?>
              <div class="product__item">
            <?php endif ?>
              <div class="product__item__pic set-bg" data-setbg="<?=$servidor.$value['portada']?>">
              <?php if ($value['oferta'] != 0): ?>
                <div class="label sale">OFERTA</div>
              <?php endif ?>

              <?php if ($value['stock'] == 0): ?>
                <div class="label stockout">AGOTADO</div>
              <?php endif ?>
                <ul class="product__hover">
                  <li><a href="<?=$servidor.$value['portada']?>" class="image-popup"><span class="arrow_expand"></span></a></li>
                  <li><a class="actionPointer"><span class="icon_heart_alt"></span></a></li>
                  <?php if ($value['tipo'] == 'virtual' && $value['precio'] != 0): ?>
                    <?php if ($value['stock'] != 0): ?>
                      <li><a class="actionPointer"><span class="icon_bag_alt"></span></a></li>
                    <?php endif ?>
                  <?php endif ?>
                </ul>
              </div>

              <div class="product__item__text">
                <h6><a href="<?=$frontend.$value['ruta']?>"><?=$value['titulo']?></a></h6>
                <br>
                <?php if ($value['precio'] == 0): ?>
                  <div class="product__price">GRATIS</div>
                <?php else: ?>
                  <?php if ($value['oferta'] != 0): ?>
                    <div class="product__price">$<?=$value['precioOferta']?> <span>$<?=$value['precio']?> <?=$divisa?></span></div>
                  <?php else: ?>
                    <div class="product__price">$<?=$value['precio']?> <?=$divisa?></div>
                  <?php endif ?>
                <?php endif ?>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      <?php endif ?>

    </div>
  </div>
</section>
<!-- Product Details Section End -->