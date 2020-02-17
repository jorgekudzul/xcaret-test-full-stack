<div class="row">
<?php foreach ($dataProvider as $producto): ?>
        <div class="col m4">
            <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                  <img class="activator" src="images/office.jpg">
                </div>
                <div class="card-content">
                  <span class="card-title activator grey-text text-darken-4"><?= $producto->nombre_producto ?><i class="material-icons right">more_vert</i></span>
                  <p><a href="#"><?= $producto->nombre_producto ?></a></p>
                </div>
                <div class="card-reveal">
                  <span class="card-title grey-text text-darken-4"><?= $producto->nombre_producto ?><i class="material-icons right">close</i></span>
                  <p>Descripción del producto.</p>
                </div>
            </div>
        </div>
<?php endforeach; ?>
</div>
