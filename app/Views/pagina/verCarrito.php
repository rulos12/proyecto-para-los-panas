<div class="container">
    <div class="row">
        <div class="col">
            <h1>Carrito</h1>

            <table class="table table-striped">

                <?php $total = 0; ?>

                <?php foreach ($session->get('carrito') as $item): ?>
                    <?php $total += $item['costo'] * $item['cantidad']; ?>
                    <thead>

                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Costo</th>

                    </thead>
                    <tbody>

                    </tbody>
                    <tr>
                        <td><?= $item['idProducto']; ?></td>
                        <td><?= $item['nombre']; ?></td>
                        <td><?= $item['cantidad']; ?></td>
                        <td><?= $item['costo']; ?></td>
                        <td><?= $item['subtotal']; ?></td>
                    </tr>
                <?php endforeach ?>
            </table>

            <h2>Total : <?= $total; ?></h2>
        </div>
    </div>
</div>