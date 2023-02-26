<?php

$base = 0; $tope = 12;

$ordenar = 'Rand()'; $modo = 'DESC';
$item = 'estado'; $valor = 1;
$productos_tienda = ControladorProductos::ctrMostrarProductos($ordenar, $item, $valor, $base, $tope, $modo);

$comercio = ControladorPlantilla::ctrMostrarDivisa();
$divisa = $comercio['divisa'];

?>

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcrumb__links">
          <a href="<?=$frontend?>"><i class="fa fa-home"></i> INICIO</a>
          <span>TIENDA</span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Breadcrumb End -->

<!-- Shop Section Begin -->
<section class="shop spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3">
        <div class="shop__sidebar">
          <div class="sidebar__categories">
            <div class="section-title">
              <h4>CATEGORIAS</h4>
            </div>

            <?php
            $item = null;
            $valor = null;
            $categorias = ControladorProductos::ctrMostrarCategorias($item, $valor);
            ?>

            <div class="categories__accordion">
              <div class="accordion" id="accordionExample">

                <?php foreach ($categorias as $key => $value): ?>
                  <?php if($value['estado'] != 0): ?>
                    <div class="card">
                      <div class="card-heading">
                        <a data-toggle="collapse" data-target="#collapse<?=$key?>"><?=$value['categoria']?></a>
                      </div>

                      <?php
                      $item = "id_categoria";
                      $valor = $value['id'];
                      $subCategorias = ControladorProductos::ctrMostrarSubCategorias($item, $valor);
                      ?>

                      <div id="collapse<?=$key?>" class="collapse" data-parent="#accordionExample">
                        <div class="card-body">
                          <ul>
                            <?php foreach ($subCategorias as $key => $value): ?>
                              <?php if($value['estado'] != 0): ?>
                                <li><a href="<?=$frontend.$value['ruta']?>"><?=$value['subcategoria']?></a></li>
                              <?php endif ?>
                            <?php endforeach ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                  <?php endif ?>
                <?php endforeach ?>

              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-9 col-md-9">
        <div class="row">

        <?php foreach ($productos_tienda as $key => $value): ?>
          <?php if ($value['estado'] != 0): ?>
            <div class="col-lg-4 col-md-6">
            <?php if ($value['oferta'] != 0): ?>
              <?php if (['stock'] != 0): ?>
                <div class="product__item sale">
              <?php else: ?>
                <div class="product__item">
              <?php endif ?>
            <?php else: ?>
              <div class="product__item">
            <?php endif ?>

            <div class="product__item__pic set-bg" data-setbg="<?=$servidor.$value['portada']?>">

              <?php if ($value['oferta'] != 0): ?>
                <?php if ($value['stock'] != 0): ?>
                  <div class="label">OFERTA</div>
                <?php else: ?>
                  <div class="label stockout stockblue">AGOTADO</div>
                <?php endif ?>
              <?php else: ?>
                <?php if ($value['stock'] == 0): ?>
                  <div class="label stockout stockblue">AGOTADO</div>
                <?php endif ?>
              <?php endif ?>

              <ul class="product__hover">
                <li><a href="<?=$servidor.$value['portada']?>" class="image-popup"><span class="arrow_expand"></span></a></li>
                <li><a class="productoAccion"><span class="icon_heart_alt"></span></a></li>
                <?php if ($value['tipo'] == 'virtual' && $value['precio'] != 0): ?>
                  <?php if ($value['stock'] != 0): ?>
                    <li><a class="productoAccion"><span class="icon_bag_alt"></span></a></li>
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
                    <div class="product__price">$<?=$value['precioOferta']?> <span>$<?=$value['precio']?><?=$divisa?></span></div>
                  <?php else: ?>
                    <div class="product__price">$<?=$value['precio']?> <?=$divisa?></div>
                  <?php endif ?>
                <?php endif ?>
                <?php echo '<p> id='.$value['id'].'</p>' ?>
              </div>
            </div>
          </div>
          <?php endif ?>
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Shop Section End -->