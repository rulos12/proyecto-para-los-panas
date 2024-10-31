<div class="container-fluid">
    <div class="row">
        <?php foreach ($productos as $key) : ?>
            <div class="col-4 producto">

                <h3><?= $key->nombre ?></h3>
                <div class="imgSecundaria"></div>
                <p><?= $key->descripcion ?></p>
                <a href="<?= base_url('pagina/verDetalle/') . $key->idProducto ?>" class="btn btn-success"> Ver detalle</a>
            </div>

        <?php endforeach ?>
    </div>
</div>

</body>
</html>