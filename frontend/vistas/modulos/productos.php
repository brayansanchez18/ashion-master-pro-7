<?php
  $comercio = ControladorPlantilla::ctrMostrarDivisa();
  $divisa = $comercio['divisa'];
  $ruta = $rutas[0];
?>

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcrumb__links">
          <a href="<?=$frontend?>"><i class="fa fa-home"></i> INICIO</a>
          <span class="pagActiva text-uppercase"><?=$rutas[0]?></span>
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
              $item = null; $valor = null;
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
                        $item = 'id_categoria'; $valor = $value['id'];
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

          <!-- LLAMADO DE PAGINACION -->
          <?php
            if (isset($rutas[1])) {

              if (isset($rutas[2])) {
                if ($rutas[2] == 'antiguos') { $modo = 'ASC'; $_SESSION['ordenar'] = $modo; } 
                else { $modo = 'DESC'; $_SESSION['ordenar'] = $modo; }
              } else {
                if (isset($_SESSION["ordenar"])) { $modo = $_SESSION["ordenar"]; }
                else { $modo = "DESC"; }
              }
              
              $base = ($rutas[1] - 1) * 12; $tope = 12;
      
            } else {
              $rutas[1] = 1; $modo = 'DESC';
              $base = 0; $tope = 12;
            }

            // LLAMADO DE PRODUCTOS DE CATEGORIAS, SUBCATEGORIAS Y DESTACADOS
            if ($rutas[0] == 'articulos-recientes') {
              $item2 = 'estado';$valor2 = 1;
              $ordenar = 'id';
            } else if ($rutas[0] == 'lo-mas-vendido') {
              $item2 = 'estado'; $valor2 = 1;
              $ordenar = 'ventas';
            } else if ($rutas[0] == 'lo-mas-visto') {
              $item2 = 'estado'; $valor2 = 1;
              $ordenar = 'vistas';
            } else {
      
              $ordenar = 'id'; $item1 = 'ruta';
              $valor1 = $rutas[0];
              $categoria = ControladorProductos::ctrMostrarCategorias($item1, $valor1);
      
              if (!$categoria) {
                $subCategoria = ControladorProductos::ctrMostrarSubCategorias($item1, $valor1);
                $item2 = 'id_subcategoria'; $valor2 = $subCategoria[0]['id'];
              } else {
                $item2 = 'id_categoria';
                $valor2 = $categoria['id'];
              }
      
            }

            $productos = ControladorProductos::ctrMostrarProductos($ordenar, $item2, $valor2, $base, $tope, $modo);
            $listaProductos = ControladorProductos::ctrListarProductos($ordenar, $item2, $valor2);
          ?>

          <?php if (!$productos): ?>
            <div class="col-12 error404 text-center">
              <h1><small>¡Oops!</small></h1>
              <h2>Aùn no hay productos en esta secciòn</h2>
            </div>
          <?php else: ?>
            <?php foreach ($productos as $key => $value): ?>
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
                          <div class="product__price">$<?=$value['precioOferta']?> <span>$<?=$value['precio']?><?=$divisa?></span></div>
                        <?php else: ?>
                          <div class="product__price">$<?=$value['precio']?> <?=$divisa?></div>
                        <?php endif ?>
                      <?php endif ?>
                      <!-- TODO: RETIRAR EL ID QUE SE IMPRIME EN LA PAGINA PRODUCTOS -->
                      <?php echo '<p> id='.$value['id'].'</p>' ?>
                    </div>
                  </div>
                </div>
              <?php endif ?>
            <?php endforeach ?>
          <?php endif ?>

          <!-- PAGINACION -->
          <div class="col-lg-12 text-center">
            <div class="pagination__option">
              <?php if (count($listaProductos) != 0): ?>
                <?php $pagProductos = ceil(count($listaProductos)/12); ?>

                <?php if ($pagProductos > 4): ?>

                  <!-- LOS BOTONES DE LAS PRIMERAS 4 PÁGINAS Y LA ÚLTIMA PÁG -->
                  <?php if ($rutas[1] == 1): ?>
                    <?php for($i = 1; $i <= 4; $i++): ?>
                      <a id="item<?=$i?>" href="<?=$frontend.$rutas[0].'/'.$i?>"><?=$i?></a>
                    <?php endfor ?>

                    <a class="disable">...</a>
                    <a id="item<?=$pagProductos?>" href="<?=$frontend.$rutas[0].'/'.$pagProductos?>"><?=$pagProductos?></a>
                    <a href="<?=$frontend.$rutas[0]?>/2"><i class="fa fa-angle-right"></i></a>
                    
                  <!-- LOS BOTONES DE LA MITAD DE PÁGINAS HACIA ABAJO -->
                  <?php elseif ($rutas[1] != $pagProductos && 
                                $rutas[1] != 1 &&
                                $rutas[1] <  ($pagProductos/2) &&
                                $rutas[1] < ($pagProductos-3)): ?>

                    <?php $numPagActual = $rutas[1]; ?>
                    <a href="<?=$frontend.$rutas[0].'/'.($numPagActual-1)?>">
                      <i class="fa fa-angle-left"></i>
                    </a>

                    <?php for ($i = $numPagActual; $i <= ($numPagActual+3); $i ++): ?>
                      <a id="item<?=$i?>" href="<?=$frontend.$rutas[0].'/'.$i?>"><?=$i?></a>
                    <?php endfor ?>

                    <a class="disable">...</a>
                    <a id="item<?=$i?>" href="<?=$frontend.$rutas[0].'/'.$pagProductos?>">
                      <?=$pagProductos?>
                    </a>
                    <a href="<?=$frontend.$rutas[0].'/'.($numPagActual=1)?>">
                      <i class="fa fa-angle-right"></i>
                    </a>

                  <!-- LOS BOTONES DE LA MITAD DE PÁGINAS HACIA ARRIBA -->
                  <?php elseif ($rutas[1] != $pagProductos && 
                                $rutas[1] != 1 &&
                                $rutas[1] >=  ($pagProductos/2) &&
                                $rutas[1] < ($pagProductos-3)): ?>

                    <?php $numPagActual = $rutas[1]; ?>

                    <a href="<?=$frontend.$rutas[0].'/'.($numPagActual-1)?>">
                      <i class="fa fa-angle-left"></i>
                    </a>
                    <a id="item1" href="<?=$frontend.$rutas[0]?>/1">1</a>
                    <a class="disable">...</a>

                    <?php for ($i = $numPagActual; $i <= ($numPagActual+3); $i ++): ?>
                      <a id="item<?=$i?>" href="<?=$frontend.$rutas[0].'/'.$i?>"><?=$i?></a>
                    <?php endfor ?>
                    <a href="<?=$frontend.$rutas[0].'/'.($numPagActual=1)?>">
                      <i class="fa fa-angle-right"></i>
                    </a>

                  <?php else: ?>
                    <!-- LOS BOTONES DE LAS ÚLTIMAS 4 PÁGINAS Y LA PRIMERA PÁG -->
                    <?php $numPagActual = $rutas[1]; ?>

                    <a href="<?=$frontend.$rutas[0].'/'.($numPagActual-1)?>">
                      <i class="fa fa-angle-left"></i>
                    </a>
                    <a id="item1" href="<?=$frontend.$rutas[0]?>/1">1</a>
                    <a class="disable">...</a>

                    <?php for ($i = ($pagProductos-3); $i <= $pagProductos; $i ++): ?>
                      <a id="item<?=$i?>" href="<?=$frontend.$rutas[0].'/'.$i?>"><?=$i?></a>
                    <?php endfor ?>
                  <?php endif ?>
                <?php else: ?>
                  <?php for($i = 1; $i <= $pagProductos; $i ++): ?>
                    <a id="item<?=$i?>" href="<?=$frontend.$rutas[0].'/'.$i?>"><?=$i?></a>
                  <?php endfor ?>
                <?php endif ?>
              <?php endif ?>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
<!-- Shop Section End -->