<div class="container">
    <div class="row">
        <div class="col">
            <h1>Carrito</h1>

            <table class="table table-striped">
                </thead>
                <?php $total = 0; ?>
                <?php if ($session->get('carrito') != null): ?>

                    <?php foreach ($session->get('carrito') as $item): ?>
                        <?php $total += $item['costo'] * $item['cantidad']; ?>
                        <tr>
                            <td><?= $item['idProducto']; ?></td>
                            <td><?= $item['nombre']; ?></td>
                            <td><?= $item['cantidad']; ?></td>
                            <td><?= $item['costo']; ?></td>
                            <td><?= $item['subtotal']; ?></td>
                        </tr>
                    <?php endforeach ?>
                <?php else: ?>
                    <tr>
                        <td>El carrito esta vacío</td>
                    </tr>
                <?php endif ?>
            </table>
            <form action="<?= base_url('pagina/pagar'); ?>" method="POST">
                <input type="hidden" name="total" value="<?=$total ?>">
                <input type="submit" class="btn btn-success" value="Pagar">
            </form>
            <h2>Total : <?= $total; ?></h2>
        </div>
    </div>
</div>