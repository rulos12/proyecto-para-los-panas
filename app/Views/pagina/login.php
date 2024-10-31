<div class="container">
<form action="<?=base_url('pagina/validaUsuario');?>" method="POST">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" id = "exampleInputEmail1" aria-describedby="emailHelp" name="usuario">
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="pass" class="form-control" id = "exampleInputPassword1" aria-describedby="emailHelp" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Ingresar</button>

</form>
</div>