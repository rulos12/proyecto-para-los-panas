<h1>Detalle Productos</h1>

<div class="container-fluid"></div>
<div class="row">
    <div class="col-9">
        <h2><?= $producto[0]->nombre ?></h2>
        <div class="imgPrincipal"></div>
    </div>
    <div class="col-3">
        <div class="imgSecundaria"></div>
        <div class="imgSecundaria"></div>
    </div>
    <div class="row">
        <div class="col-4">
            <h3><?=$producto[0]->descripcion;?></h3>
            <h2 class="text-right"><?=$producto[0]->precio;?></h2>

            <form action="<?=base_url('pagina/insertCarrito');?>" method="POST">
                <div class="form">
                    <label for="">Cantidad</label>
                    <input type="number" Min="1" Max="<?=$producto[0]->stock;?>" name="cantidad" class="form-control">
                </div>
                <br>

                <input type="hidden" value="<?=$producto[0]->idProducto;?>" name="idProducto" >
                <input type="hidden" value="<?=$producto[0]->nombre;?>" name="nombre" >
                <input type="hidden" value="<?=$producto[0]->precio;?>" name="costo" >

                <input type="submit" class="btn btn-large btn-success" value="Agregar al carrito">
            </form>
        </div>
    </div>
</div>

</body>
</html>