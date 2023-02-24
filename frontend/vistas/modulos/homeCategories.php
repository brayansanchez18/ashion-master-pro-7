<?php

$servidor = Ruta::ctrRutaServidor();
$frontend = Ruta::ctrRuta();

$comercio = ControladorPlantilla::ctrMostrarDivisa();
$divisa = $comercio['divisa'];

// CATEGORIAS
$homeCategories = ControladorProductos::ctrMostrarCategoriasHome();

?>

<!-- Categories Section Begin -->
<section class="categories">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="row">

          <?php foreach ($homeCategories as $key => $value): ?>

            <?php

              $item = 'id';
              $valor = $value['idCategoria'];

              $categoria = ControladorProductos::ctrMostrarCategorias($item, $valor);

              // var_dump($categoria);

            ?>

            <!-- TODO: cuando la cantidad de categorias sea menor a 6 cambiar el diseño del banner de categorias -->

            <div class="col-lg-4 col-md-4 col-sm-4 p-0">
              <div
                class="categories__item set-bg"
                data-setbg="<?=$servidor.$value['img']?>"
              >
                <div class="categories__text">
                  <h4 style="font-size: 26px;"><?=$categoria['categoria']?></h4>
                  <br>
                  <a href="<?=$frontend.$categoria['ruta']?>">Comprar Ahora</a>
                </div>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Categories Section End -->