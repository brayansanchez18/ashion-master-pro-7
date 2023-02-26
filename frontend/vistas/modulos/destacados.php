<?php 

$servidor = Ruta::ctrRutaServidor();
$frontend = Ruta::ctrRuta();
$comercio = ControladorPlantilla::ctrMostrarDivisa();
$divisa = $comercio['divisa'];
$ruta = 'sin-categoria';

$titulosModulos = array('ARTÍCULOS RECIENTES', 'LO MÁS VENDIDO', 'LO MÁS VISTO');
$rutaModulos = array('articulos-recientes','lo-mas-vendido','lo-mas-visto');

$base = 0; $tope = 8;

if ($titulosModulos[0] == 'ARTÍCULOS RECIENTES') {
	$ordenar = 'id'; $item = 'estado';
	$valor = 1; $modo = 'DESC';
	$recientes = ControladorProductos::ctrMostrarProductos($ordenar, $item, $valor, $base, $tope, $modo);
}

if ($titulosModulos[1] == 'LO MÁS VENDIDO') {
	$ordenar = 'ventas'; $item = 'estado';
	$valor = 1; $modo = 'DESC';
	$ventas = ControladorProductos::ctrMostrarProductos($ordenar, $item, $valor, $base, $tope, $modo);
}

if ($titulosModulos[2] == 'LO MÁS VISTO') {
	$ordenar = 'vistas'; $item = 'estado';
	$valor = 1; $modo = 'DESC';
	$vistas = ControladorProductos::ctrMostrarProductos($ordenar, $item, $valor, $base, $tope, $modo);
}

$modulos = array($recientes, $ventas, $vistas);

?>

<!-- Product Section Begin -->
<?php for ($i=0; $i < count($titulosModulos); $i++): ?>
  <section class="product spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4">
          <div class="section-title">
            <h4><a class="titular" href="<?=$frontend.$rutaModulos[$i]?>"><?=$titulosModulos[$i]?></a></h4>
          </div>
        </div>
      </div>
      <div class="row property__gallery">
        <!-- TODO: MOSTAR MENSAJE CUANDO NO HAYA PRODUCTOS -->
        <?php if (!$modulos[$i]): ?>
        <?php else: ?>
          <?php foreach ($modulos[$i] as $key => $value): ?>
            <?php if ($value['estado'] != 0): ?>
              <div class="col-lg-3 col-md-4 col-sm-6 mix">
                <?php if ($value['oferta'] != 0): ?>
                  <div class="product__item sale">
                <?php else: ?>
                  <div class="product__item">
                <?php endif ?>
                  <div
                    class="product__item__pic set-bg"
                    data-setbg="<?=$servidor.$value['portada']?>"
                  >

                    <?php if ($value['oferta'] != 0): ?>
                      <div class="label sale">OFERTA</div>
                    <?php endif ?>

                    <?php if ($value['stock'] == 0): ?>
                      <div class="label stockout">AGOTADO</div>
                    <?php endif ?>

                    <ul class="product__hover">
                      <li>
                        <a href="<?=$servidor.$value['portada']?>" class="image-popup"
                          ><span class="arrow_expand"></span
                        ></a>
                      </li>
                      <li>
                        <a class="actionPointer"><span class="icon_heart_alt"></span></a>
                      </li>

                    <?php if ($value['tipo'] == 'virtual' && $value['precio'] != 0): ?>
                      <?php if ($value['stock'] != 0): ?>
                        <li><a class="actionPointer"><span class="icon_bag_alt"></span></a></li>
                      <?php endif ?>
                    <?php endif ?>
                    </ul>
                  </div>
                  <div class="product__item__text">
                    <h6><a href="<?=$value['ruta']?>"><?=$value['titulo']?></a></h6>
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
            <?php endif ?>
          <?php endforeach ?>
        <?php endif ?>
      </div>
    </div>
  </section>
<?php endfor ?>
<!-- Product Section End -->